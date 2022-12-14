<?php
class SocioController
{

    public function index()
    {
        $this->list();
    }

    public function list()
    {
        if (!(Login::isAdmin() || Login::hasPrivilege(500)))
            throw new Exception('No tienes permisos de acceso para realizar esta acción.');

        $socios = Socio::get();
        include '../views/socio/lista.php';
    }

    public function show(int $id = 0)
    {
        if (!(Login::isAdmin() || Login::hasPrivilege(500)))
            throw new Exception('No tienes permisos de acceso para realizar esta acción.');

        if (!$id)
            throw new Exception("No se indicó el socio");

        $socio = Socio::getById($id);

        if (!$socio)
            throw new Exception("No se ha encontrado el socio $id.");

        $prestamos = $socio->getPrestamosPendientes();

        include '../views/socio/detalles.php';
    }

    public function create()
    {
        if (!(Login::isAdmin() || Login::hasPrivilege(500)))
            throw new Exception('No tienes permisos de acceso para realizar esta acción.');

        include '../views/socio/nuevo.php';
    }

    public function store()
    {
        if (!(Login::isAdmin() || Login::hasPrivilege(500)))
            throw new Exception('No tienes permisos de acceso para realizar esta acción.');

        if (empty($_POST['guardar']))
            throw new Exception('No se recibieron datos');

        $socio = new Socio();

        $socio->dni = $_POST['dni'];
        $socio->nombre = $_POST['nombre'];
        $socio->apellidos = $_POST['apellidos'];
        $socio->nacimiento = $_POST['nacimiento'];
        $socio->direccion = $_POST['direccion'];
        $socio->poblacion = $_POST['poblacion'];
        $socio->cp = $_POST['cp'];
        $socio->provincia = $_POST['provincia'];
        $socio->telefono = $_POST['telefono'];
        $socio->email = $_POST['email'];
        $socio->alta = date("Y/m/d h:m:s");

        $socio->guardar();

        $mensaje = "Guardado del socio \"$socio->nombre $socio->apellidos\" correcto";
        include '../views/exito.php';
    }

    public function edit(int $id = 0)
    {
        if (!(Login::isAdmin() || Login::hasPrivilege(500)))
            throw new Exception('No tienes permisos de acceso para realizar esta acción.');

        if (!$id)
            throw new Exception('No se indicó el socio');

        $socio = Socio::getById($id);

        if (!$socio)
            throw new Exception("No existe el socio $id");

        include '../views/socio/actualizar.php';
    }

    public function update()
    {
        if (!(Login::isAdmin() || Login::hasPrivilege(500)))
            throw new Exception('No tienes permisos de acceso para realizar esta acción.');

        if (empty($_POST['actualizar']))
            throw new Exception('No se recibieron datos');

        $id = intval($_POST['id']);
        $socio = Socio::getById($id);

        if (!$socio)
            throw new Exception("No se ha encontrado el socio $id");

        $socio->dni = $_POST['dni'];
        $socio->nombre = $_POST['nombre'];
        $socio->apellidos = $_POST['apellidos'];
        $socio->nacimiento = $_POST['nacimiento'];
        $socio->direccion = $_POST['direccion'];
        $socio->poblacion = $_POST['poblacion'];
        $socio->cp = $_POST['cp'];
        $socio->provincia = $_POST['provincia'];
        $socio->telefono = $_POST['telefono'];
        $socio->email = $_POST['email'];

        try {
            $socio->actualizar();
            $GLOBALS['success'] = "Actualización del socio \"$socio->nombre $socio->apellidos\" correcta.";
        } catch (Exception $e) {
            $GLOBALS['error'] = "No se pudo actualizar el socio \"$socio->nombre $socio->apellido\".";
        } finally {
            $this->edit($socio->id);
        }
    }

    public function delete(int $id = 0)
    {
        if (!(Login::isAdmin() || Login::hasPrivilege(500)))
            throw new Exception('No tienes permisos de acceso para realizar esta acción.');

        if (!$id)
            throw new Exception('No se indicó el socio a borrar');

        $socio = Socio::getById($id);

        if (!$socio)
            throw new Exception("No existe el socio con identificador $id");

        include '../views/socio/borrar.php';
    }

    public function destroy()
    {
        if (!(Login::isAdmin() || Login::hasPrivilege(500)))
            throw new Exception('No tienes permisos de acceso para realizar esta acción.');

        if (empty($_POST['borrar']))
            throw new Exception('No se recibió confirmación');

        $id = intval($_POST['id']);

        if (Socio::borrar($id) === false)
            throw new Exception('No se pudo borrar');

        $mensaje = "Borrado del socio $id correcto.";
        include '../views/exito.php';
    }

    public function search()
    {
        if (!(Login::isAdmin() || Login::hasPrivilege(500)))
            throw new Exception('No tienes permisos de acceso para realizar esta acción.');

        if (empty($_POST['buscar'])) {
            $this->list();
            return;
        }

        $campo = $_POST['campo'];
        $valor = $_POST['valor'];
        $orden = $_POST['orden'];
        $sentido = $_POST['sentido'] ?? 'ASC';

        $socios = Socio::getFiltered($campo, $valor, $orden, $sentido);

        require_once '../views/socio/lista.php';
    }
}
