<?php

//this fucntion is not available in php v 7.2
class Coba{
    public function __construct()
    {
        $this->key = "abcdefghijklmnopqrstuvwx";  //24bit
        $this->iv = "alfacode"; //8bit IV
        $this->bit_check = strlen($this->iv);
    }
    public function Encrypt($input) {
        //convert input to array
        $text_arr = str_split($input, $this->bit_check); 
        //bit_check - jumlah string dari text_arr index terakhir di kurangi 1
        $text_num = $this->bit_check - strlen($text_arr[count($text_arr) - 1]);
        //loops
        for($a = 1; $a < $text_num; $a++){
            //update input dengan menambahkan character specifik dengan integer text_num
            $input = $input .chr($text_num);
        }
        //encrypt dengan Mcrypt
        $chiper = mcrypt_module_open('rijndael-128', '', 'cbc', '');
        mcrypt_generic_init($chiper, $this->key, $this->iv);
        $encrypted_data = mcrypt_generic($chiper, $input);
        mcrypt_generic_deinit($chiper);
        mcrypt_module_close($chiper);
        //return encrypt data with base64
        return base64_encode($encrypted_data);
    }
    public function Decrypt($input) {
        $cipher = mcrypt_module_open('rijndael-128','','cbc','');
        mcrypt_generic_init($cipher, $this->key, $this->iv);
        $decrypted = mdecrypt_generic($cipher,base64_decode($input));
        mcrypt_generic_deinit($cipher);
        $last_char=substr($decrypted,-1);
        for($i=0;$i<$this->bit_check-1; $i++){
            if(chr($i)==$last_char){
                $decrypted=substr($decrypted,0,strlen($decrypted)-$i);
                break;
            }
        }
        return $decrypted;
    }
}


$input = "This is a screat message!";
//make object from blueprint
$coba = new Coba();
$coba->Encrypt($input);