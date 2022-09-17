<?php
class Ejemplare extends Model
{
    public function __toString(): string
    {
        $texto = "ID: $this->id Año: $this->anyo Edición: $this->edicion Precio: {$this->precio}€";
        return $texto;
    }
}
