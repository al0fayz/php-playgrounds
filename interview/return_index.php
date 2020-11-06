<?php

function index(array $data, $input) {
    $start = 0;
    $last = 0;
    foreach($data as $key => $val) {
        if($val == $input) {
            if($key > $start){
                $last = $key;
            }else{
                $start = $key;
                $last = $key;
            }
        }
    }
    return $start.' '.$last;
}
$dt = [2, 3, 56, 8, 9, 9, 10, 5, 2, 7, 2, 6, 6, 61, 1, 7, 7, 4, 4];
echo index($dt, 2);
