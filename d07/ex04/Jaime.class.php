<?php
class Jaime extends Lannister {
	public function sleepWith($Class) {
		if (get_class($Class) == "Tyrion")
			print("Not even if I'm drunk !" . PHP_EOL);
		else if (get_class($Class) == "Sansa")
			print("Let's do this." . PHP_EOL);
		else if (get_class($Class) == "Cersei")
			print("With pleasure, but only in a tower in Winterfell, then." . PHP_EOL);
		}
	}
?>
