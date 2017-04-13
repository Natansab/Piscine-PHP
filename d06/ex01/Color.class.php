<?php
Class Color {

	public $red = 0;
	public $green = 0;
	public $blue = 0;
	static $verbose = False;

	public function __construct(array $kwargs) {
		if (array_key_exists('red', $kwargs)
				&& array_key_exists('green', $kwargs)
					&& array_key_exists('blue', $kwargs)) {
			$this->red = intval($kwargs['red']);
			$this->green = intval($kwargs['green']);
			$this->blueu = intval($kwargs['blue']);
		}
		else if (array_key_exists('rgb', $kwargs)) {
			$this->red = intval(($kwargs['rgb'] & 0xFF0000) >> 16);
			$this->green = intval(($kwargs['rgb'] & 0x00FF00) >> 8);
			$this->blue = intval($kwargs['rgb'] & 0x0000FF);
		}
		else
			;
		if (Self::$verbose)
			print("Color( red: $this->red, green: $this->green, blue: $this->blue) constructed." . PHP_EOL);
		return;
	}

	public function __destruct() {
		if (Self::$verbose)
			print("Color( red: $this->red, green: $this->green, blue: $this->blue) destructed." . PHP_EOL);
		return;
	}

	public function __call($f, $args) {
		print('Attempt to call function \'' . $f . '\' with params');
		print_r($args);
		return;
	}

	public static function __callstatic($f, $args) {
		print( 'Attempt to call static function\'' . $f . '\' with params');
		print_r($args);
		return;
	}

	public static function doc() {
		if (file_exists("./Color.doc.txt"))
			return (file_get_contents("./Color.doc.txt"));
		return ;
	}

	public function add(Color $instance) {
		return (new Color(array('red' =>	$this->red + $instance->red,
								'green' =>	$this->green + $instance->green,
								'blue' =>	$this->blue + $instance->blue)));
	}

	public function sub(Color $instance) {
		return (new Color(array('red' =>	$this->red - $instance->red,
								'green' =>	$this->green - $instance->green,
								'blue' =>	$this->blue - $instance->blue)));
	}

	public function mult($f) {
		return (new Color(array('red' =>	$this->red * $f,
								'green' =>	$this->green * $f,
								'blue' =>	$this->blue * $f)));
	}

	public function __toString() {
		return ('Color( red: ' . $this->red . ', green: ' . $this->green . ', blue: ' . $this->blue . ')');
	}
}
?>
