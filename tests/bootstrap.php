<?php

$_tests_dir = getenv('WP_TESTS_DIR');
if ( !$_tests_dir ) $_tests_dir = '/tmp/wordpress-tests-lib';

require_once $_tests_dir . '/includes/functions.php';

function _manually_load_plugin() {
	require dirname( __FILE__ ) . '/../revisr.php';
}
tests_add_filter( 'muplugins_loaded', '_manually_load_plugin' );

require $_tests_dir . '/includes/bootstrap.php';

// Activate & install the plugin
activate_plugin( 'revisr/revisr.php' );
Revisr::revisr_install();

// Initialize a fresh repo.
$revisr = Revisr::get_instance();
$revisr->git->init_repo();