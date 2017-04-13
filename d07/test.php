<?php

class ExempleA {
	public function foo() {
		print('Function foo from class A' . PHP_EOL);
	}

	public function test() {
		self::foo();
		return;
	}

	public function test1() {
		$this->foo();
		return;
	}

	public function test2() {
		static::foo();
		return;
	}
}


class ExempleB extends ExempleA {
	public function foo() {
		print('Function foo from class B' . PHP_EOL);
	}
}

$instanceA = new ExempleA;
$instanceB = new ExempleB;

$instanceA->foo();
$instanceB->foo();
print("\n");
$instanceA->test();
$instanceB->test();
print("\n");
$instanceA->test1();
$instanceB->test1();
print("\n");
$instanceA->test2();
$instanceB->test2();
?>
