<?php
class PrestamoController
{
    public function create(int $idsocio): void
    {
        if (!(Login::isAdmin() || Login::hasPrivilege(500)))
            throw new Exception('No tienes permisos de acceso para realizar esta acción.');

        $socio = Socio::getById($idsocio);

        // This method is called from biblioteca/show and biblioteca/show/{id}
        // We should return to the referer page
        $referer = $_SERVER['HTTP_REFERER'];
        if (strpos($referer, 'show'))
            $back_to_show = true;

        include '../views/prestamo/nuevo.php';
    }

    public function store()
    {
        if (!(Login::isAdmin() || Login::hasPrivilege(500)))
            throw new Exception('No tienes permisos de acceso para realizar esta acción.');

        if (!$_POST['guardar'])
            throw new Exception('No hay datos a guardar');

        $prestamo = new Prestamo();

        $prestamo->idsocio = intval($_POST['idsocio']);
        $prestamo->idejemplar = intval($_POST['idejemplar']);
        $prestamo->limite = date('Y-m-d', strtotime(date('Y-m-d') . ' + 15 days'));

        try {
            $prestamo->guardar();
            $GLOBALS['success'] = 'Se ha realizado un nuevo préstamo';
        } catch (Throwable $e) {
            $GLOBALS['error'] = 'No se ha podido realizar el préstamo';
        } finally {
            (new SocioController)->show($prestamo->idsocio);
        }
    }

    public function edit(int $idprestamo)
    {
        if (!(Login::isAdmin() || Login::hasPrivilege(500)))
            throw new Exception('No tienes permisos de acceso para realizar esta acción.');

        $prestamo = Prestamo::getById($idprestamo);
        $socio = Socio::getById($prestamo->idsocio);
        include '../views/prestamo/actualizar.php';
    }

    public function update()
    {
        if (!(Login::isAdmin() || Login::hasPrivilege(500)))
            throw new Exception('No tienes permisos de acceso para realizar esta acción.');

        if (!$_POST['actualizar'])
            throw new Exception('No hay datos a guardar');

        $id = intval($_POST['id']);
        $fecha = $_POST['limite'];

        $prestamo = Prestamo::getById($id);
        $prestamo->limite = date('Y-m-d H:i:s', strtotime($fecha));

        try {
            $prestamo->actualizar();
            $GLOBALS['success'] = 'Se ha actualizado la fecha límite del préstamo';
        } catch (Throwable $e) {
            $GLOBALS['error'] = 'No se ha podido actualizar la fecha límite del préstamo';
        } finally {
            (new SocioController)->show($prestamo->idsocio);
        }
    }

    public function return(int $idprestamo)
    {
        if (!(Login::isAdmin() || Login::hasPrivilege(500)))
            throw new Exception('No tienes permisos de acceso para realizar esta acción.');

        $prestamo = Prestamo::getById($idprestamo);
        include '../views/prestamo/devolver.php';
    }

    public function mark()
    {
        if (!(Login::isAdmin() || Login::hasPrivilege(500)))
            throw new Exception('No tienes permisos de acceso para realizar esta acción.');

        if (!$_POST['devolver'])
            throw new Exception('No se puede realizar la devolución');

        $idprestamo = intval($_POST['idprestamo']);

        $prestamo = Prestamo::getByID($idprestamo);
        $prestamo->devolucion = date('Y-m-d');

        try {
            $prestamo->actualizar();
            $GLOBALS['success'] = "Se ha marcado el préstamo del ejemplar $prestamo->idejemplar como devuelto.";
        } catch (Exception $e) {
            $GLOBALS['error'] = "No se ha podido actualizar el préstamo del ejemplar $prestamo->idejemplar";
        } finally {
            (new SocioController)->show($prestamo->idsocio);
        }
    }
}
