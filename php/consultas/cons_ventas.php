<?php
class cons_ventas
{
    function get_ventas($id_cliente, $fecha_desde, $fecha_hasta)
    {
        $sql = "SELECT v.*, (c.apellido || ' ' || c.nombre) AS ncompleto
                FROM venta AS v
                INNER JOIN cliente AS c ON (c.id = v.id_cliente)
                WHERE id_cliente = $id_cliente AND fecha >= '$fecha_desde' AND fecha <= '$fecha_hasta'
                ORDER BY id_venta";
        return toba::db()->consultar($sql);
    }
    
    function add_venta($id_cliente, $fecha, $categoria, $tropa, $cantAnimales, $kgTotales, $precioKilo, 
    $precioTotal, $entrega, $saldoCliente, $tipo)
    {
        $sql = "INSERT INTO venta (id_cliente, fecha, categoria, tropa, cantanimales, kgtotales, preciokilo,
                preciototal, entrega, saldoactualcliente, tipo)
                VALUES ($id_cliente, '$fecha', '$categoria', $tropa, $cantAnimales, $kgTotales, $precioKilo, 
                $precioTotal, $entrega, $saldoCliente, '$tipo')";
        toba::db()->ejecutar($sql);
    }
    
    function get_saldo_cliente($id_cliente)
    {
        $sql = "SELECT saldo
                FROM cliente
                WHERE id = $id_cliente";
        return toba::db()->consultar($sql);
    }
    
    function add_pago($id_cliente, $fecha, $entrega, $saldoCliente, $tipo)
    {
        $sql = "INSERT INTO venta (id_cliente, fecha, entrega, saldoactualcliente, tipo)
                VALUES ($id_cliente, '$fecha', $entrega, $saldoCliente, '$tipo')";
        toba::db()->ejecutar($sql);
    }
    
    function update_saldo_cliente($id_cliente, $saldo)
    {
        $sql = "UPDATE cliente
                SET saldo = $saldo
                WHERE id = $id_cliente";
        toba::db()->ejecutar($sql);
    }
    
}
?>