<?php
	use \Core\Core as Core;
	use \View\View as View;

	class CalendarCron
	{
		private static $instance = null;

		public static function make()
		{
			self::$instance = new CalendarCron;
			return self::$instance;
		}

		public function load()
		{
		
			add_action('six_hours_email_cad_send', array($this, 'sendEmail'));

			if(!wp_next_scheduled('six_hours_email_cad_send')) {
				wp_schedule_event(time(), 'hourly', 'six_hours_email_cad_send');
			}
			return $this;
		}

		public function sendEmail()
		{
			
		}
		
	}