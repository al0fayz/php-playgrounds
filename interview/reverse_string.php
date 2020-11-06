<?php
    //cara pertama
    function reverse($name) {
        $str = array();
        for($a = 0; $a < strlen($name); $a++){
            $index = strlen($name) - ($a + 1);
            array_push($str, $name[$index]);
        }
        return implode("",$str);
    }
    $str = "alfa code";
    echo reverse($str);


    //cara kedua
    function reverse_2($input) {
        //covert to array
        $input_arr = str_split($input);
        //temporary data
        $temp = array();
        //loops
        for($a = 0; $a < count($input_arr); $a++) {
            //index
            $index_array = count($input_arr) - ($a + 1);
            //insert to temporary data 
            $temp[$index_array] = $input_arr[$a];
        }
        //reverse array
        array_reverse($temp);
        return implode($temp);
    }

    echo reverse_2($str);
?>