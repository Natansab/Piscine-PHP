9<?php
abstract class Fighter {

	public $type;

	abstract public function fight();

	public function __construct($warrior_type) {
		$this->type = $warrior_type;

	}
}
?>
