<?php
// The password you want to hash
$password = 'Quest35#';

// Generate the SHA-256 hash of the password
$hashed_password = hash('sha256', $password);

echo password_hash($password, PASSWORD_DEFAULT);
