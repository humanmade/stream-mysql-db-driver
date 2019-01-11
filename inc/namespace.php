<?php

namespace HM\Stream\MySQL_DB_Driver;

function bootstrap() {
	add_filter( 'wp_stream_db_driver', __NAMESPACE__ . '\\set_stream_db_driver' );
}

function set_stream_db_driver( string $db_driver ) : string {
	if ( ! defined( 'STREAM_MYSQL_DRIVER_DB_HOST' ) ) {
		return $db_driver;
	}
	require_once __DIR__ . '/class-db-driver.php';
	require_once __DIR__ . '/class-install.php';
	require_once __DIR__ . '/class-uninstall.php';
	return __NAMESPACE__ . '\\DB_Driver';
}
