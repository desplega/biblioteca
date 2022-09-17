<?php
class EjemplarController
{
    public function create(int $idlibro): void
    {
        if (!(Login::isAdmin() || Login::hasPrivilege(500)))
            throw new Exception('No tienes permisos de acceso para realizar esta acción.');

        $libro = Libro::getById($idlibro);

        if (!$libro)
            throw new Exception('No existe el libro solicitado');

        include '../views/ejemplar/nuevo.php';
    }

    public function store(): void
    {
        if (!(Login::isAdmin() || Login::hasPrivilege(500)))
            throw new Exception('No tienes permisos de acceso para realizar esta acción.');

        if (empty($_POST['guardar']))
            throw new Exception('No se recibieron datos');

        $ejemplar = new Ejemplare();

        $ejemplar->idlibro = intval($_POST['idlibro']);
        $ejemplar->anyo = intval($_POST['anyo']);
        $ejemplar->edicion = intval($_POST['edicion']);
        $ejemplar->precio = floatval($_POST['precio']);

        try {
            $ejemplar->guardar();
            $GLOBALS['success'] = "Se añadió un ejemplar";
        } catch (Throwable $e) {
            $GLOBALS['error'] = "No se pudo añadir el ejemplar";
        } finally {
            (new LibroController())->edit($ejemplar->idlibro);
        }
    }

    public function delete(int $id = 0): void
    {
        if (!(Login::isAdmin() || Login::hasPrivilege(500)))
            throw new Exception('No tienes permisos de acceso para realizar esta acción.');

        if (!$id)
            throw new Exception('No se indicó el ejemplar a borrar');

        $ejemplar = Ejemplare::getById($id);
        if (!$ejemplar)
            throw new Exception("No existe el ejemplar con identificador $id");

        if ($ejemplar->hasMany('Prestamo', 'idejemplar')) {
            $GLOBALS['error'] = 'Este ejemplar no se puede borrar, tiene préstamos asociados';
            (new LibroController())->edit($ejemplar->idlibro);
        } else {
            $libro = $ejemplar->belongsTo('Libro');
            if (!$libro)
                throw new Exception("No existe el libro con identificador $ejemplar->idlibro");

            include '../views/ejemplar/borrar.php';
        }
    }

    public function destroy(): void
    {
        if (!(Login::isAdmin() || Login::hasPrivilege(500)))
            throw new Exception('No tienes permisos de acceso para realizar esta acción.');

        if (empty($_POST['borrar']))
            throw new Exception('No se recibió confirmación');

        $id = intval($_POST['id']);
        $idlibro = intval($_POST['idlibro']);

        try {
            Ejemplare::borrar($id);
            $GLOBALS['success'] = 'Se eliminó un ejemplar';
        } catch (Exception $e) {
            $GLOBALS['error'] = 'No se pudo eliminar el ejemplar';
        } finally {
            (new LibroController())->edit($idlibro);
        }
    }
}
