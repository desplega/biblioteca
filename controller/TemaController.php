<?php
class TemaController
{
    public function index()
    {
        $this->list();
    }

    public function list()
    {
        $temas = Tema::get();
        include '../views/tema/lista.php';
    }

    public function show(int $id = 0)
    {
        if (!$id)
            throw new Exception("No se indicó el tema");

        $tema = Tema::getById($id);

        if (!$tema)
            throw new Exception("No se ha encontrado el tema $id.");

        include '../views/tema/detalles.php';
    }

    public function create()
    {
        include '../views/tema/nuevo.php';
    }

    public function store()
    {
        if (empty($_POST['guardar']))
            throw new Exception('No se recibieron datos');

        $tema = new Tema();

        $tema->tema = $_POST['tema'];
        $tema->descripcion = $_POST['descripcion'];

        $tema->guardar();

        $mensaje = "Guardado del tema \"$tema->tema\" correcto";
        include '../views/exito.php';
    }

    public function edit(int $id = 0)
    {
        if (!$id)
            throw new Exception('No se indicó el tema');

        $tema = Tema::getById($id);

        if (!$tema)
            throw new Exception("No existe el tema $id");

        include '../views/tema/actualizar.php';
    }

    public function update()
    {
        if (empty($_POST['actualizar']))
            throw new Exception('No se recibieron datos');

        $id = intval($_POST['id']);
        $tema = Tema::getById($id);

        if (!$tema)
            throw new Exception("No se ha encontrado el tema $id");

        $tema->tema = $_POST['tema'];
        $tema->descripcion = $_POST['descripcion'];

        try {
            $tema->actualizar();
            $GLOBALS['success'] = "Actualización del tema \"$tema->tema\" correcta.";
        } catch (Exception $e) {
            $GLOBALS['error'] = "No se pudo actualizar el tema \"$tema->tema\".";
        } finally {
            $this->edit($tema->id);
        }
    }

    public function delete(int $id = 0)
    {
        if (!$id)
            throw new Exception('No se indicó el tema a borrar');

        $tema = Tema::getById($id);

        if (!$tema)
            throw new Exception("No existe el tema con identificador $id");

        include '../views/tema/borrar.php';
    }

    public function destroy()
    {
        if (empty($_POST['borrar']))
            throw new Exception('No se recibió confirmación');

        $id = intval($_POST['id']);

        if (Tema::borrar($id) === false)
            throw new Exception('No se pudo borrar');

        $mensaje = "Borrado del tema $id correcto.";
        include '../views/exito.php';
    }
}
