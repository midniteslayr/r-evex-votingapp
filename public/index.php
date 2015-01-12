<?php
	/****
	 * /r/EVEX Voting Application
	 * Written By Duane Jeffers (midniteslayr) <duane@duanejeffers.com>
	 *
	 * See LICENSE for license information.
	 ****/

	require_once('../vendor/autoload.php');

	ORM::configure('driver_options', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

	$app = new \Slim\Slim(array(
		'view' => new \TJC\View\Layout(),
		'templates.path' => '../app/templates',
		'mode' => APPLICATION_MODE
	));

	$app->view->setLayout('layout/layout.php');

	$app->view->appendJavascriptFile('/components/jquery/dist/jquery.min.js')
			  ->appendJavascriptFile('/components/bootstrap/dist/js/bootstrap.min.js')
			  ->appendJavascriptFile('/js/application.js');

	$app->view->appendStylesheet('/components/bootstrap/dist/css/bootstrap.min.css')
			  ->appendStylesheet('/components/fontawesome/css/font-awesome.min.css')
			  ->appendStylesheet('/css/application.css');
	
	$app->get('/', function() use($app) {
		$app->render('main/index.php', array());
	});

	$app->get('/about', function() use($app) {
		$app->render('main/about.php', array());
	});

	$app->group('/reddit', function() use($app) {
		
	});

	$app->run();