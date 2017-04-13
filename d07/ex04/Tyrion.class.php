<?php
class Tyrion extends Lannister {
	public function sleepWith($Class) {
		if (get_parent_class($Class) == "Lannister")
			print("Not even if I'm drunk !" . PHP_EOL);
		else if (get_class($Class) == "Sansa")
			print("Let's do this." . PHP_EOL);
		}
	}
?>
