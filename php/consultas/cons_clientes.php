<?php
class cons_clientes
{
    function get_clientes_deudores()
    {
        $sql = "SELECT (apellido || ' ' || nombre) AS ncompleto, cuit, saldo
                FROM cliente
                WHERE saldo > 0 AND tipo = 'Cliente'
                ORDER BY ncompleto";
        return toba::db()->consultar($sql);
    }
    
}
?>