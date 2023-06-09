<?php
//DATABASE CONNECTION DETAILS
$dsn = 'mysql:host=localhost;dbname=namibra_employers';
$username = 'charles';
$password = 'charlesbih';

//CREATE A NEW PDO INSTANCE FOR DATABASE CONNECTION
$db = new PDO($dsn, $username, $password);
