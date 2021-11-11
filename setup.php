#!/usr/bin/env php

<?php
$salts = file_get_contents('https://api.wordpress.org/secret-key/1.1/salt/');

file_put_contents('public/wp-config.php', str_replace('# INSERT WP SALT HERE', $salts, file_get_contents('public/wp-config.php')));

echo 'Wordpress Encryption Salts Generated' . PHP_EOL;

unlink('setup.php');
