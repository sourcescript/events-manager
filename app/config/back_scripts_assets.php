<?php
	return array(
			'jquery' => array(
				'path' 		=> 'http://code.jquery.com/	jquery-1.11.0.js',
				'version'	=> '1',
				'deps' 		=> array()
				),
			'bootstrap-js'	=> array(
				'path' 		=> assets_url()."js/bootstrap.js",
				'version' 	=> '1',
				'deps' 		=> array('jquery')
			),
			'momentjs' 		=> array(
				'path' 		=> assets_url()."bower_components/	momentjs/moment.js",
				'version' 	=> date('U'),
				'deps' 		=> array('jquery')
			),
			'daterangepicker-js' => array(
				'path' 		=> assets_url()."bower_components/	bootstrap-daterangepicker/daterangepicker.js",
				'version'	=> date('U'),
				'deps' 		=> array('jquery')
			),
			'bootstrap-select' 	=> array(
				'path' 		=> assets_url()."bower_components/bootstrap-select/bootstrap-select.min.js",
				'version' 	=> date('U'),
				'deps' 		=> array('jquery','bootstrap-js')
			),
			'underscore' 	=> array(
				'path' 		=> assets_url()."bower_components/underscore/underscore-min.js",
				'deps' 		=> array('jquery')
			),
			'bootstrap-calendar' 	=> array(
				'path' 		=> assets_url().'bower_components/bootstrap-calendar/js/calendar.js',
				'version' 	=> date('U'),
				'deps' 		=> array('jquery', 'underscore','bootstrap-js')
			),
			'calendar-app' 	=> array(
				'path' 		=> assets_url()."js/calendar.js",
				'version' 	=> date('U'),
				'deps' 		=> array('jquery', 'daterangepicker-js', 'bootstrap-js')
			),


		);