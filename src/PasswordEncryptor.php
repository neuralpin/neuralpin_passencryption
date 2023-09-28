<?php

namespace Neuralpin\Passencryption;

class PasswordEncryptor{

    private string $salt;
    private string $password;

    public function __construct( string $password, string $hash_method = 'sha512' ){
        $this->salt = $this->randomHash( $hash_method );
        $this->password = hash( $hash_method, $password.$this->salt );
    }

    private function randomHash( string $hash_method = 'sha512' ): string{
        if( is_callable( 'openssl_random_pseudo_bytes ') )
            return hash( $hash_method, openssl_random_pseudo_bytes(16) );

        return hash( $hash_method, mt_rand( 1, mt_getrandmax() ) );
    }

    public function getPassword(){
        return $this->password;
    }

    public function getSalt(){
        return $this->salt;
    }
}