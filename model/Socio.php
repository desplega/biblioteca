<?php
class Socio extends Model
{
    public function getPrestamosPendientes(): array
    {
        $consulta = "SELECT * FROM prestamos WHERE idsocio = $this->id AND devolucion IS NULL";
        return (DB_CLASS)::SelectAll($consulta, 'Prestamo');
    }
}
