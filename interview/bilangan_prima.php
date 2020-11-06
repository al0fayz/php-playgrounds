<?php

function prima($n) {
    //loops
    $return = array();
    $jumlah_loops = 100;
    for($a = 1; $a <= $jumlah_loops; $a++){
        $bil = 0;
        /**
         * loop dari 1 sampai nilai $a
         * ini adalah konsep fraktorial jadi nilai dari $a akan di bagi dengan angka di bawahnya
         * */
        for($b = 1; $b <= $a; $b++){
            //bilangan $a di modulo dengan bilangan $b dan tidak memiliki sisa atau == 0
            if($a % $b == 0){
                $bil = $bil + 1;
            }
        }
        if($bil == 2){
            $return[] = $a;
        }
    }
    //kembalikan bilanagn dengan jumlah $n
    foreach($return as $key => $val){
        echo $val .',';
        if($key == $n){
        break;
        }
    }
}
prima(2);
echo "\n";
prima(5);