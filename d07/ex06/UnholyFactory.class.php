<?php
Class UnholyFactory {

	private $InFactory = array();

	public function absorb($Inst) {
		if ($Inst instanceof Fighter) {
			if (!in_array($Inst->type, $this->InFactory)) {
				print ("(Factory absorbed a fighter of type $Inst->type)" . PHP_EOL);
				$this->InFactory[$Inst->type] = $Inst;
			}
			else
				print ("(Factory already absorbed a fighter of type $Inst->type)" . PHP_EOL);
		}
		else
			print ("(Factory can't absorb this, it's not a fighter)" . PHP_EOL);
	}

	public function fabricate($warrior_type) {
		if (array_key_exists($warrior_type, $this->InFactory)) {
			print("(Factory fabricates a fighter of type $warrior_type)" . PHP_EOL);
			return (new $this->InFactory[$warrior_type]);
		}
		else
			print("(Factory hasn't absorbed any fighter of type $warrior_type)" . PHP_EOL);
	}
}
?>
