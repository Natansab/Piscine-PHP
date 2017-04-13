#!/usr/bin/php

<?php
 Class Exemple {
	public function __construct() {
		print( 'Constructor called' . PHP_EOL);
		return;
	}

	public function __destruct() {
		print ( 'Destructor called' . PHP_EOL);
		return;
	}

	public function foo($array) {
		print_r($array);
		return ($array);
	}

	public function __call($f, $args) {
		print( 'Attempt to call function\'' . $f . '\' with params');
		print_r($args);
		return;
	}
}

$instance = new Exemple();
$instance->foo(array(0,1,2,4));
?>
