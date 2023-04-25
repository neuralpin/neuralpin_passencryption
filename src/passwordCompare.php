<?php

namespace Neuralpin\passencryption;

class passwordCompare{

    private bool $result;

    public function __construct( 
        string $password, 
        string $salt, 
        string $hashed_password,
        string $hash_method = 'sha512'
    ){
        $this->result = hash( $hash_method, $password.$salt ) === $hashed_password;
    }

    public function isEqual(): bool{
        return $this->result;
    }
}