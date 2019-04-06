<?php
//в рамках этой задачи я считааю что на вход функции приходят строки содержащие только цифры, и их проверка не входит в задачу
//также если число начинается с 0 - это имеет какой-то смысл, и специально вырезать их не надо
//php 7.2

function longsum(string $a, string $b) : string {
    //$a больше или равна $b
    if (strlen($a) < strlen($b)) {
       [$a, $b] = [$b, $a];
   }

   $overflow = 0;
   $result = "";
   //складываем по цифре
   for($i =1; $i <= strlen($a); $i++){
       $firstDigit = (int) $a[strlen($a)-$i];
       $secondDigit = 0;
       //не начинаем обходить меньшую строку с конца при отрицательном индексе
       if ((strlen($b)-$i) >= 0) {
           $secondDigit = (int) $b[strlen($b)-$i];
       }
       //"0" - страховка от ситуации, когда нечего переносить в старший разряд
       //альтернатива - работать с целочисленным делением на 10 и остатком от этого деления.
       $step_sum = "0".( $firstDigit + $secondDigit + $overflow);
       $overflow = (int) substr($step_sum, -2, 1);
       $result = substr($step_sum, -1).$result;
   }

   if($overflow !== 0) {
       $result = $overflow.$result;
   }
   return $result;

}

$string1 = "40";
$string2 = "8798870459873405987230459827340598732450928345703485704398570342857034578340975";

echo longsum($string1, $string2);