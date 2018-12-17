<?php

    function printValue($number) {
        $number = intval($number);
        $data   = $number;
        $stage  = 0;

        if ($number % 3 == 0) {
            $data = "Fizz";
            $stage++;
        }
        if ($number % 5 == 0) {
            $data = "Buzz";
            $stage++;
        }

        if ($stage == 2) $data = "FizzBuzz";

        return $data;
    }

    $i=1; $_data = array();
    while($i<=100){
        $_data[] = printValue($i);
        $i++;
    }

    echo "<pre>";
    echo implode("<br/>", $_data);
    echo "</pre>";
?>