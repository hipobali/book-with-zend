<?php

	ini_set("memory_limit","256M");

	date_default_timezone_set('Asia/Rangoon');
	$isServer = false;

	if($isServer){
		defined('ZF_PATH')
		|| define('ZF_PATH', realpath(dirname(__FILE__) . '/../../data'));
	} else {
		defined('ZF_PATH')
		|| define('ZF_PATH', realpath(dirname(__FILE__) . '/../'));
	}

	/*
		For Source Codes ( ZF )
	*/

	// Define path to application directory
	defined('APPLICATION_PATH')
		|| define('APPLICATION_PATH', realpath(ZF_PATH . '/application'));

	defined('VIEW_PATH')
		|| define('VIEW_PATH', realpath(ZF_PATH . '/application/views/scripts'));

	defined('SPWM_LIBRARY')
		|| define('SPWM_LIBRARY', realpath(ZF_PATH . '/library/SPWM'));

	defined('LIBRARY')
		|| define('LIBRARY', realpath(ZF_PATH . '/library'));

	defined('TEMP_PATH')
		|| define('TEMP_PATH', realpath(ZF_PATH. '/data/uploads/temporary') . '/');

	defined('UPLOAD_PATH')
		|| define('UPLOAD_PATH', realpath(ZF_PATH. '/data/uploads/applicantphoto'). '/');

	defined('G_UPLOAD_PATH')
		|| define('G_UPLOAD_PATH', realpath(ZF_PATH. '/data/uploads'). '/');

	defined('CAPTCHA')
		|| define('CAPTCHA', realpath(ZF_PATH . '/data/captcha'));

	

	/*

		Global Path for Public Folder
	*/
	defined('IMG_PATH')
		|| define('IMG_PATH', realpath(dirname(__FILE__) . '/img'));

	


	// Global Path for Public Folder
	defined('HEADER_IMG_PUBLIC_PATH')
		|| define('HEADER_IMG_PUBLIC_PATH', realpath(IMG_PATH . '/pg_header_photos'));

	// Define application environment
	defined('APPLICATION_ENV')
		|| define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

	defined('DIR_FILTERS')
		|| define('DIR_FILTERS', realpath(APPLICATION_PATH . '/filters'));

	defined('PDF_PATH')
		|| define('PDF_PATH', realpath(IMG_PATH . '/job_pdf'));

	defined('LAYOUT_PATH')
		|| define('LAYOUT_PATH', realpath(APPLICATION_PATH . '/layouts/scripts'));

	// Ensure library/ is on include_path
	set_include_path(implode(PATH_SEPARATOR, array(
		realpath(LIBRARY . '/pear/php'),
		realpath(LIBRARY),
		get_include_path(),
	)));

	/** Zend_Application */
	require_once LIBRARY . '/Zend/Application.php';

	// Create application, bootstrap, and run
	$application = new Zend_Application(
		APPLICATION_ENV,
		APPLICATION_PATH . '/configs/application.ini'
	);

	$application->bootstrap()
				->run();

?>