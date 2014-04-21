<?php
	return array(
			/*
			 * autoloaded functions should be added to the libs
			 */
			'libs'	=> array(
					'Core' 		=> base_path().'/../vendor/sourcescript/wf-core-framework/src',
					'View' 		=> base_path().'/../vendor/sourcescript/wf-core-framework/src',
					'Assets' 	=> base_path().'/../vendor/sourcescript/wf-core-framework/src',
					'Twig'		=> base_path().'/../vendor/twig/twig/lib'
				),
			/*
			 * Since every plugin requires an options page, the title shall be added here
			 */
			'options' 	=> array(
					'page_title' 	=> 'Task Management',
					'menu_title' 	=> 'Task Management Calendar',
					'capability' 	=> 'manage_options',
					'menu_slug' 	=> 'task-calendar'
				),

			/*
			 * Twig Templating Engine Configs
			 */
			'twig' 		=> array(
					'cache' 	=> false,
					'debug' 	=> true
				)
		);