<?php
class Libro extends Model
{
    public function getEjemplares(): array
    {
        $consulta = "SELECT * FROM ejemplares WHERE idlibro=$this->id";
        return (DB_CLASS)::selectAll($consulta, 'Ejemplare');
    }

    public function getTemas(): array
    {
        $consulta = "
            SELECT t.*
            FROM temas t
                INNER JOIN temas_libros tl ON t.id=tl.idtema
            WHERE tl.idlibro=$this->id
        ";
        return (DB_CLASS)::selectAll($consulta, 'Tema');
    }

    public function addTema(int $idtema): int
    {
        $consulta = "
            INSERT INTO temas_libros (idlibro, idtema)
            VALUES ($this->id, $idtema)
        ";
        return (DB_CLASS)::insert($consulta);
    }

    public function removeTema(int $idtema): int
    {
        $consulta = "
            DELETE FROM temas_libros
            WHERE idlibro=$this->id AND idtema=$idtema
        ";
        return (DB_CLASS)::delete($consulta);
    }
}
