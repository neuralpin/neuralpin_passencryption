# neuralpin/passencryption

## Description:
Helper for secure password encrypting and validating
[Github Repo](https://github.com/neuralpin/neuralpin_passencryption)

## How to use

Example for encrypting a user password using random salt
```php
use Neuralpin\passencryption\passwordEncryptor;

$user_plain_password = 'original_password';

$user_encrypted_password = new passwordEncryptor( $user_plain_password );

// The random salt used ready to store in the database
$user_encrypted_password->getSalt();
// The encrypted password ready to store in the database
$user_encrypted_password->getPassword();
```

Example for comparing user password with database password
```php
use Neuralpin\passencryption\passwordCompare;

$user_plain_password = 'original_password';

$stored_salt = '425d3ab03af14574b52269f91a798168d9858286230da78b26ed82f20e2ab807bcee97650d8a575a883e06156956c5a3ba8752632138c4c0c6a05a108ed10e09';

$stored_password = 'a07eb5af110432cd11191afed23be2720f8c4c35f3d715c9cf763937f4a93ef8508fa80e83df049294aeed00cd4a42d853639683e4aa125e4f0332f0a30274b3';

$password_comparing = new passwordCompare(
    $user_plain_password,
    $stored_salt,
    $stored_password
);

if( $password_comparing->isEqual() ){
    // Code for logged user ...
    echo "Logged in successfully";
}else{
    // Code for invalid password ...
    echo "Invalid password, try again";
}

```