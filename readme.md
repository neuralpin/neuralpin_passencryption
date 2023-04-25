# Description:
Helper for secure password encrypting and validating
[Github Repo](https://github.com/neuralpin/neuralpin_passencryption)

## How to use

Example for encrypting a user password using random salt
```php
use Neuralpin\passencryption\passwordEncryptor;

$user_plain_password = 'original_password';

$user_encrypted_password = new passwordEncryptor( $user_plain_password );

// The encrypted password ready to store in the database
$user_encrypted_password->getPassword();
// The random salt used ready to store in the database
$user_encrypted_password->getSalt();
```

Example for comparing user password with database password
```php
use Neuralpin\passencryption\passwordCompare;

$user_plain_password = 'original_password';

$password_comparing = new passwordCompare(
    $user_plain_password,
    $stored_salt,
    $stored_password
);

if( $password_comparing->isEqual() ){
    // Code for logged user ...
}

```