<?php
	return array(
			'bootstrap-css'	=> array(
							'path' 		=> assets_url()."css/bootstrap.min.css",
							'version' 	=> '1',
							'deps' 		=> array() 
							),
			'bootstrap-theme-css' 	=> array(
					'path' 		=>	assets_url()."css/bootstrap-theme.min.css",
					'version' 	=> '1',
					'deps' 		=> array('bootstrap-css')
				),
			'fontawesome' 			=> array(
					'path' 		=> assets_url()."bower_components/fontawesome/css/font-awesome.css",
					'version' 	=> date('U'),
					'deps' 		=> array('bootstrap-css')
				),
			'daterange-css' 		=> array(
					'path' 		=> assets_url()."bower_components/bootstrap-daterangepicker/daterangepicker-bs3.css",
					'version' 	=> date('U'),
					'deps' 		=> array('bootstrap-css')
				),
			'bootstrap-select' 		=> array(
					'path' 		=> assets_url()."bower_components/bootstrap-select/bootstrap-select.css",
					'version' 	=> date('U'),
					'deps' 		=> array('bootstrap-css')
				),
			'calendar' 				=> array(
					'path' 		=> assets_url()."css/calendar.css",
					'version'	=> date('U'),
					'deps' 		=> array('bootstrap-css')
				),
			'bootstrap-calendar' 	=> array(
					'path' 		=> assets_url()."/bower_components/bootstrap-calendar/css/calendar.min.css",
					'versinower_coon' 	=> date("U"),
					"deps" 		=> array('bootstrap-css')
				)
		);