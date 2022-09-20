<?php
class UsuarioController
{
    public function index()
    {
        $this->list();
    }

    public function list()
    {
        if (!Login::isAdmin())
            throw new Exception('No tienes permisos de acceso para realizar esta acción.');

        $usuarios = Usuario::get();
        include '../views/usuario/lista.php';
    }

    public function show(int $id = 0)
    {
        if (!Login::isAdmin() && (Login::get()->id != $id))
            throw new Exception('No tienes permisos de acceso para realizar esta acción.');

        if (!$id)
            throw new Exception("No se indicó el usuario");

        $usuario = Usuario::getById($id);

        if (!$usuario)
            throw new Exception("No se ha encontrado el usuario $id.");

        include '../views/usuario/detalles.php';
    }

    public function create()
    {
        if (!Login::isAdmin())
            throw new Exception('No tienes permisos de acceso para realizar esta acción.');

        include '../views/usuario/nuevo.php';
    }

    public function store()
    {
        if (!Login::isAdmin())
            throw new Exception('No tienes permisos de acceso para realizar esta acción.');

        if (empty($_POST['guardar']))
            throw new Exception('No se recibieron datos');

        $usuario = new Usuario();

        $usuario->usuario = $_POST['usuario'];
        $usuario->clave = md5($_POST['clave']);
        $usuario->nombre = $_POST['nombre'];
        $usuario->apellido1 = $_POST['apellido1'];
        $usuario->apellido2 = $_POST['apellido2'];
        $usuario->privilegio = intval($_POST['privilegio']);
        $usuario->administrador = $_POST['administrador'] ? 1 : 0;
        $usuario->email = $_POST['email'];

        $usuario->guardar();

        $mensaje = "Guardado del usuario \"$usuario->nombre $usuario->apellido1\" correcto";
        include '../views/exito.php';
    }

    public function edit(int $id = 0)
    {
        if (!Login::isAdmin())
            throw new Exception('No tienes permisos de acceso para realizar esta acción.');

        if (!$id)
            throw new Exception('No se indicó el usuario');

        $usuario = Usuario::getById($id);

        if (!$usuario)
            throw new Exception("No existe el usuario $id");

        include '../views/usuario/actualizar.php';
    }

    public function update()
    {
        if (!Login::isAdmin())
            throw new Exception('No tienes permisos de acceso para realizar esta acción.');

        if (empty($_POST['actualizar']))
            throw new Exception('No se recibieron datos');

        $id = intval($_POST['id']);
        $usuario = Usuario::getById($id);

        if (!$usuario)
            throw new Exception("No se ha encontrado el usuario $id");

        $usuario->usuario = $_POST['usuario'];
        //$usuario->clave = md5($_POST['clave']); // Do not allow to change password here for now...
        $usuario->nombre = $_POST['nombre'];
        $usuario->apellido1 = $_POST['apellido1'];
        $usuario->apellido2 = $_POST['apellido2'];
        $usuario->privilegio = intval($_POST['privilegio']);
        $usuario->administrador = $_POST['administrador'] ? 1 : 0;
        $usuario->email = $_POST['email'];
        $usuario->updated_at = date('Y-m-d H:i:s');

        try {
            $usuario->actualizar();
            $GLOBALS['success'] = "Actualización del usuario \"$usuario->nombre $usuario->apellido1\" correcta.";
        } catch (Exception $e) {
            $GLOBALS['error'] = "No se pudo actualizar el usuario \"$usuario->nombre $usuario->apellido1\".";
        } finally {
            $this->edit($usuario->id);
        }
    }

    public function delete(int $id = 0)
    {
        if (!Login::isAdmin())
            throw new Exception('No tienes permisos de acceso para realizar esta acción.');

        if (!$id)
            throw new Exception('No se indicó el usuario a borrar');

        $usuario = Usuario::getById($id);

        if (!$usuario)
            throw new Exception("No existe el usuario con identificador $id");

        include '../views/usuario/borrar.php';
    }

    public function destroy()
    {
        if (!Login::isAdmin())
            throw new Exception('No tienes permisos de acceso para realizar esta acción.');

        if (empty($_POST['borrar']))
            throw new Exception('No se recibió confirmación');

        $id = intval($_POST['id']);

        if (Usuario::borrar($id) === false)
            throw new Exception('No se pudo borrar');

        $mensaje = "Borrado del usuario $id correcto.";
        include '../views/exito.php';
    }
}
