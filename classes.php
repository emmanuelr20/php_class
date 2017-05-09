<?php 
//	class InterestCalc{
//		private $rate;
//		private $principal;
//		private $time;
//		private $num_compound;
//
//		public function simpleInterest(){
//			$interest = ($this->principal * $this->rate * $this->time)/100;
//			return $interest;
//		}
//		public function compoundInterest(){
//			$interest = $this->principal * pow((1 + ($this->rate/100)), ($this->num_compound * $this->time));
//			return $interest;
//		}
//		public function setRate($r){
//			$this->rate = $r;
//		}
//		public function getRate(){
//			return $this->rate;
//		}
//		public function setPrincipal($p){
//			$this->principal = $p;
//		}
//		public function getPrincipal(){
//			return $this->principal;
//		}
//		public function setTime($t){
//			$this->time = $t;
//		}
//		public function getTime(){
//			return $this->time;
//		}
//		public function setCompoundNo($c){
//			$this->num_compound = $c;
//		}
//		public function getCompoundNo(){
//			return $this->num_compound;
//		}
//	}
//
//	$mathematics = new InterestCalc();
//	#$mathematics->rate = 5
//	#echo $mathematics->rate
//	#echo $mathematics->getRate()
//	$mathematics->setRate(5);
//	$mathematics->setPrincipal(5000);
//	$mathematics->setTime(5);
//	$mathematics->setCompoundNo(12);
//	echo $mathematics->getRate() . '<br>';
//	echo $mathematics->getPrincipal() . '<br>';
//	echo $mathematics->getTime() . '<br>';
//	echo $mathematics->getCompoundNo()  . '<br>';
//	echo $mathematics->simpleInterest() . '<br>';
//	echo $mathematics->compoundInterest();
$a = [];
for ($x = 0; $x <8; $x++){
$a[]='-';
}
echo var_dump($a);
$b =implode($a);
echo $b.gettype($b);
	?>