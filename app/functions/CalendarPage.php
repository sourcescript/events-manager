<?php
	use \Core\Core as Core;
	use \View\View as View;

	class CalendarPage
	{
		private static $instance = null;

		public static function make()
		{
			self::$instance = new CalendarPage;
			return self::$instance;
		}

		public function load()
		{
			if(is_admin()) {
				add_action('admin_menu', array($this, 'displayPluginsPage'));
				add_action('wp_ajax_get_calendars', array($this, 'displayCalendarApi'));
				add_action('wp_ajax_mark_as_complete', array($this, 'markAsComplete'));
			}

			return $this;
		}



		public function markAsComplete()
		{
			header('Content-Type: application/json');

		
			$result = array();

			$reminder = Reminder::find($_GET['reminderID']);

			if($reminder) {
				$reminder->is_done = 1;
				$reminder->save();
				$result = array(
						'type' 		=> 'success',
						'message'	=> 'you have successfully saved a new reminder'
					);
			}else {
				$result = array(
						'type' 		=> 'danger',
						'message' 	=> 'an error has occured. '
					);
			}

			echo json_encode($result);
			die();
		}

		public function displayCalendarApi()
		{
			$all = Reminder::make()->get();
			header('Content-Type: application/json');
			$result = array();
			$proper = array();
			$result["success"]  = 0;
			
			foreach($all as $r) {
				$proper[] = array(
						'id'	=> $r->id,
						'title' => $r->title,
						'url' 	=> "?reminder_id={$r->id}&page=cad-calendar",
						"class" => $r->getClass(),
						"start"	=> $r->from()*1000,
						"end" 	=> $r->to()*1000
					);
				$result["success"]  = 1;

			}

			$result["result"] = $proper;


			echo json_encode($result);
			die();
		}

		public function displayPluginsPage()
		{
			add_menu_page(
					'Task Calendar',
					'Task Calendar',
					'manage_options',
					'cad-calendar',
					array($this, 'createPluginsPage'),
					'dashicons-calendar'
				);
		}

		public function createPluginsPage()
		{
		
			if(isset($_GET['reminder_id'])) {
				$report_id = $_GET['reminder_id'];
			}else {
				$report_id = 0;
			}

			$settings = array(
					'current_url' 	=> current_url(),
					'plugin_url' 	=> plugins_url()."/wordpress-factory",
					'users' 		=> get_users(),
					'fromDate' 		=> date("F j, Y", strtotime('-30 day')),
					'toDate' 		=> date("F j, Y"),
					'reminders' 	=> Reminder::getLatest(5),
					'report_id' 	=> $report_id,
					'sanitized_current_url' => sanitized_current_url(),
					'reminder' 		=> Reminder::find($report_id)
				);


			echo View::factorize('calendar/calendar.html.twig')->load($settings);
		}

		public function post()
		{
			$range = $_POST['daterange'];
			$range = explode(" - ", $range);
			$range = array_map("trim", $range);

		
			Reminder::createInstance(array(
					'user_id' 	=> $_POST['user_involved'],
					'title' 	=> $_POST['title'],
					'desc' 		=> $_POST['description'],
					'fromDate' 	=> $range[0]." 00:00:00",
					'toDate'	=> $range[1]." 00:00:00"
				));
		}
	}