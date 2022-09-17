<?php
class LibroController
{

    public function index()
    {
        $this->list();
    }

    public function list()
    {
        $libros = Libro::get();
        include '../views/libro/lista.php';
    }

    public function show(int $id = 0)
    {
        if (!$id)
            throw new Exception("No se indicó el libro");

        $libro = Libro::getById($id);

        if (!$libro)
            throw new Exception("No se ha encontrado el libro $id.");

        $ejemplares = $libro->getEjemplares();
        $temas = $libro->getTemas();

        include '../views/libro/detalles.php';
    }

    public function create()
    {
        if (!(Login::isAdmin() || Login::hasPrivilege(500)))
            throw new Exception('No tienes permisos de acceso para realizar esta acción.');

        include '../views/libro/nuevo.php';
    }

    public function store()
    {
        if (!(Login::isAdmin() || Login::hasPrivilege(500)))
            throw new Exception('No tienes permisos de acceso para realizar esta acción.');

        if (empty($_POST['guardar']))
            throw new Exception('No se recibieron datos');

        $libro = new Libro();

        $libro->isbn = $_POST['isbn'];
        $libro->titulo = $_POST['titulo'];
        $libro->editorial = $_POST['editorial'];
        $libro->autor = $_POST['autor'];
        $libro->idioma = $_POST['idioma'];
        $libro->ediciones = $_POST['ediciones'];
        $libro->edadrecomendada = $_POST['edadrecomendada'];

        $libro->guardar();

        $mensaje = "Guardado del libro \"$libro->titulo\" correcto";
        include '../views/exito.php';
    }

    public function edit(int $id = 0)
    {
        if (!(Login::isAdmin() || Login::hasPrivilege(500)))
            throw new Exception('No tienes permisos de acceso para realizar esta acción.');

        if (!$id)
            throw new Exception('No se indicó el libro');

        $libro = Libro::getById($id);

        if (!$libro)
            throw new Exception("No existe el libro $id");

        $ejemplares = $libro->hasMany('Ejemplare');
        $temas = $libro->getTemas();
        $lista_temas = Tema::get();

        include '../views/libro/actualizar.php';
    }

    public function update()
    {
        if (!(Login::isAdmin() || Login::hasPrivilege(500)))
            throw new Exception('No tienes permisos de acceso para realizar esta acción.');

        if (empty($_POST['actualizar']))
            throw new Exception('No se recibieron datos');

        $id = intval($_POST['id']);
        $libro = Libro::getById($id);

        if (!$libro)
            throw new Exception("No se ha encontrado el libro $id");

        $libro->isbn = $_POST['isbn'];
        $libro->titulo = $_POST['titulo'];
        $libro->editorial = $_POST['editorial'];
        $libro->autor = $_POST['autor'];
        $libro->idioma = $_POST['idioma'];
        $libro->ediciones = $_POST['ediciones'];
        $libro->edadrecomendada = $_POST['edadrecomendada'];

        try {
            $libro->actualizar();
            $GLOBALS['success'] = "Actualización del libro \"$libro->titulo\" correcta.";
        } catch (Exception $e) {
            $GLOBALS['error'] = "No se pudo actualizar el libro $libro->titulo.";
        } finally {
            $this->edit($libro->id);
        }
    }

    public function delete(int $id = 0)
    {
        if (!(Login::isAdmin() || Login::hasPrivilege(500)))
            throw new Exception('No tienes permisos de acceso para realizar esta acción.');

        if (!$id)
            throw new Exception('No se indicó el libro a borrar');

        $libro = Libro::getById($id);

        if (!$libro)
            throw new Exception("No existe el libro con identificador $id");

        include '../views/libro/borrar.php';
    }

    public function destroy()
    {
        if (!(Login::isAdmin() || Login::hasPrivilege(500)))
            throw new Exception('No tienes permisos de acceso para realizar esta acción.');

        if (empty($_POST['borrar']))
            throw new Exception('No se recibió confirmación');

        $id = intval($_POST['id']);

        if (Libro::borrar($id) === false)
            throw new Exception('No se pudo borrar');

        $mensaje = "Borrado del libro $id correcto.";
        include '../views/exito.php';
    }

    public function addTema()
    {
        if (!(Login::isAdmin() || Login::hasPrivilege(500)))
            throw new Exception('No tienes permisos de acceso para realizar esta acción.');

        if (empty($_POST['add']))
            throw new Exception('No hay datos en el formulario');

        $idlibro = intval($_POST['idlibro']);
        $idtema = intval($_POST['idtema']);

        try {
            $libro = Libro::getById($idlibro);
            $libro->addTema($idtema);
            $GLOBALS['success'] = 'Se ha asociado un tema al libro.';
        } catch (Throwable $e) {
            $GLOBALS['error'] = 'No se ha podido añadir el tema al libro.';
        } finally {
            $this->edit($idlibro);
        }
    }

    public function removeTema()
    {
        if (!(Login::isAdmin() || Login::hasPrivilege(500)))
            throw new Exception('No tienes permisos de acceso para realizar esta acción.');

        if (empty($_POST['remove']))
            throw new Exception('No hay datos en el formulario');

        $idlibro = intval($_POST['idlibro']);
        $idtema = intval($_POST['idtema']);

        try {
            $libro = Libro::getById($idlibro);
            $libro->removeTema($idtema);
            $GLOBALS['success'] = 'Se ha borrado un tema del libro.';
        } catch (Throwable $e) {
            $GLOBALS['error'] = 'No se ha podido borrar el tema del libro.';
        } finally {
            $this->edit($idlibro);
        }
    }

    public function search()
    {
        if (empty($_POST['buscar'])) {
            $this->list();
            return;
        }

        $campo = $_POST['campo'];
        $valor = $_POST['valor'];
        $orden = $_POST['orden'];
        $sentido = $_POST['sentido'] ?? 'ASC';

        $libros = Libro::getFiltered($campo, $valor, $orden, $sentido);

        require_once '../views/libro/lista.php';
    }
}
