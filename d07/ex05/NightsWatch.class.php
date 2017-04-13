<?php
class NightsWatch {

	private $fighters_inst;

	public function fight () {
		foreach ($this->fighters_inst as $fighter)
			$fighter->fight();
	}

	public function recruit ($fighter) {
		if ($fighter instanceof IFighter) {
			$this->fighters_inst[] = $fighter;
		}
	}
}
?>
