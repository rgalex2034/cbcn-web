<?php

namespace PauSabe\CBCN\model\classes;

class Admin{

    private $id;
    private $name;
    private $password;

    private static $VALID_HASH_CHARS = "./0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

    public function __construct($name, $password){
        $this->id = null;
        $this->name = $name;
        $this->setPassword($password);
    }

    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function setPassword($password){

        //Get random bytes
        $rand = openssl_random_pseudo_bytes(22); 

        //Convert random bytes to valid chars for hashing
        $salt = "";
        for($i = 0; $i < strlen($rand); $i++){
            $index = hexdec(bin2hex($rand[$i]))%strlen(self::$VALID_HASH_CHARS);
            $salt .= self::$VALID_HASH_CHARS[$index];
        }

        //Hash the password with blowfish with cost of 7
        $this->password = crypt($password, '$2y$07$'.$salt);
    }

    public function checkPassword($password){
        //TODO: Change string comparison to a safe version for timing attacks.
        return $this->password === crypt($password, $this->password);
    }

}
