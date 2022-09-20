<?php
class LoginController
{
    public function index()
    {
        include '../views/login.php';
    }

    public function login()
    {
        if (empty($_POST['identificar']))
            throw new Exception('No se recibieron datos');

        $u = $_POST['usuario'];
        $p = md5($_POST['clave']);

        $identificado = Usuario::identificar($u, $p);

        if (!$identificado)
            throw new Exception('Los datos de identificación no son correctos');

        Login::set($identificado);

        (new UsuarioController())->show($identificado->id);
    }

    public function logout()
    {
        Login::clear();

        $controlador = DEFAULT_CONTROLLER;
        $metodo = DEFAULT_METHOD;

        (new $controlador())->$metodo();
    }
}
