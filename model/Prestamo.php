<?php
class Prestamo extends Model
{
    public function __toString(): string
    {
        $fecha_inicio = date('d-m-Y', strtotime($this->prestamo));
        $fecha_limite = date('d-m-Y', strtotime($this->limite));
        $texto = "ID del ejemplar: $this->idejemplar Fecha inicio: $fecha_inicio Fecha límite: $fecha_limite";
        return $texto;
    }
}
