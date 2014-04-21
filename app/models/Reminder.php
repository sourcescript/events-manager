<?php
	class Reminder extends \Core\Model
	{
		/**
		 * Create a new instance them save  the reminder
		 * @param  array  $args [description]
		 * @return Reminder       [description]
		 */
		public static function createInstance(array $args)
		{
			$instance = new Reminder($args);
			$instance->save();

			return $instance;
		}

		
		public static function dateToUnix($string)
		{
			list($date, $time) = explode(' ', $string);
			list($year, $month, $day) = explode('-', $date);
			list($hour, $minute, $second) = explode(':', $time);

			$timestamp = mktime($hour, $minute, $second, $month, $day, $year); 

			return $timestamp;
		}

		public function from()
		{
			return self::dateToUnix($this->fromDate);
		}

		public function to()
		{
			return self::dateToUnix($this->toDate);
		}

		public function getClass()
		{
			$date = $this->toDate;
			$date = DateTime::createFromFormat('Y-m-d H:i:s', $date);

			$todate = DateTime::createFromFormat('U', date('U'));

			if($date->format('U') < $todate->format('U') && !$this->is_done) {
				return "event-important";
			}elseif($this->is_done) {
				return "event-success";
			}else {
				return "event-info";
			}
		}

		public static function getLatest($num = 5, $offset = 0)
		{
			$from = date('Y-m-d')." 00:00:00";
			$to   = date("Y-m-d", strtotime('+20 day'))." 23:59:59";

			$from 	= "'{$from}'";
			$to 	= "'{$to}'";

			$reminders = Reminder::make()->whereBetween('toDate', $from, $to)->get();

			foreach($reminders as $rem) {
				$result[] = $rem->toArray();
			}

			return $result;
		}

		public function getUser()
		{
			return User::find($this->user_id);
		}

		public function toArray()
		{
			return $this->attributes;
		}

		public function getStatus($offset = 0)
		{	
			$date = $this->toDate;
			$date = DateTime::createFromFormat('Y-m-d H:i:s', $date);

			$todate = DateTime::createFromFormat('U', date('U'));

			if($date->format('U') < $todate->format('U')) {
				return $offset == 0 ? "danger" : "Missed";
			}elseif($this->is_done) {
				return $offset == 0 ? "success" : "Done";
			}else {
				return $offset == 0 ? "info" : "Inbound";
			}
		}

	}