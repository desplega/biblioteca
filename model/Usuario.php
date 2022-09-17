<?php
class Usuario extends Model
{
    public static function identificar(string $u='', string $p=''): ?self
    {
        $consulta = "
            SELECT * FROM usuarios
            WHERE (usuario = '$u' OR email='$u') AND clave = '$p'
        ";
        return (DB_CLASS)::select($consulta, self::class);
    }
}
