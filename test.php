<?php

$apr = 12;
$term = 2;
$loan = 100000;

function calPMT()
{
  global $apr;
  global $term;
  global $loan;

  // echo $apr;
  $term1 = $term * 12;
  $apr1 = $apr / 1200;
  $amount = $apr1 * -$loan * pow((1 + $apr1), $term1) / (1 - pow((1 + $apr1), $term1));
  return $amount;
}

// function loanEMI()
// {
//    echo calPMT();
// }

function getInterest(){
  global $apr;
  global $term;

  $emt = calPMT();

  // echo $emt;

  $interest = 0;
  $principle = 0;
  $ip = 0;
  
  for($i=($apr*$term);$i>0;$i--){
    
    global $loan;
    global $interest;
    global $principle;
    global $ip;
    //echo "test:".$i; 
    $interest = $loan * (($apr/12)/100);
    $principle = $emt - $interest;
    $loan = $loan - $principle;

    $ip += $interest;
  }

  return round($ip);
}

echo getInterest();
// echo "emt       ".round($emt)."<br/>";
// echo "interest  ".round($interest)."<br/>";
// echo "balance   ".round($loan)."<br/>";
// echo "principle ".round($principle)."<br/>";
// echo "principle ".round($ip)."<br/>";

?>