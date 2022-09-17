<?php
include '../config/config.php';
include '../libraries/DB.php';
include '../libraries/Login.php';
include '../model/Model.php';
include '../model/Usuario.php';

echo 'Test Login<br>';

$u = Usuario::identificar('pepito',md5('1234'));
Login::set($u);

echo '<pre>';
var_dump(unserialize($_SESSION['usuario']));
echo '</pre>';

echo Login::get()->nombre . '<br>';

echo Login::hasPrivilege(200) ? 'Sí' : 'No';

Login::clear();

echo '<br>' . (Login::get() ? 'Logged' : 'Not logged');