<?php
class Tema extends Model
{
    public function __toString(): string
    {
        $text = "<b>$this->tema</b>: $this->descripcion";
        return $text;
    }
}
