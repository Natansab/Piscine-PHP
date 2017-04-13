<?php

require_once './Color.class.php';

Class Vertex {

	static $verbose = True;

	private $_x;
	private $_y;
	private $_z;
	private $_w;
	private $_color;

	public function __construct(array $kwargs) {
		if (isset($kwargs['x']) && isset($kwargs['y']) && isset($kwargs['z'])) {

			$_x = $kwargs['x'];
			echo "et ici $this->_x";
			$_y = $kwargs['y'];
			$_z = $kwargs['z'];

			if (isset($kwargs['w']))
				$_w = $kwargs['w'];
			else
				$_w = "1.0";

			if (isset($kwargs['color']))
				$_color = $kwargs['color'];
			else
				$_color = new Color(array('rgb' => 0xFFFFFF));
			}

		if (Self::$verbose)
			print("Vertex( x: $this->getAttX(), y: $_y, z: $_z, w:$_w, Color( red: $this->red, green: $this->green, blue: $this->blue) constructed" . PHP_EOL);
	}

	public function __destruct() {
		if (Self::$verbose)
			print("Vertex( x: $_x, y: $_y, z: $_z, w:$_w, Color( red: $this->red, green: $this->green, blue: $this->blue) destructed" . PHP_EOL);
	}

	public function __toString() {
		if (Self::$verbose)
			return ("Vertex( x: $_x, y: $_y, z: $_z, w:$_w, Color( red: $this->red, green: $this->green, blue: $this->blue)");
		return ("Vertex( x: $_x, y: $_y, z: $_z, w:$_w )");
	}

	public static function doc() {
		if (file_exists("./Vertex.doc.txt"))
			return (file_get_contents("./Vertex.doc.txt"));
		return ;
	}

	public function getAttX() {
		echo "Voila" . number_format($this->_x, 2) . PHP_EOL;
		return (number_format($this->_x));
	}
}

$instance = new Vertex(array('x' => 1, 'y' => 2, 'z' => 3));
echo "YO: " . $instance->getAttX();

?>
