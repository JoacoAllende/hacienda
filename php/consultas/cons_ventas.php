<?php
class cons_ventas
{
    function get_ventas($id_cliente, $fecha_desde, $fecha_hasta)
    {
        $sql = "SELECT v.*, (c.apellido || ' ' || c.nombre) AS ncompleto
                FROM venta AS v
                INNER JOIN cliente AS c ON (c.id = v.id_cliente)
                WHERE fecha >= '$fecha_desde' AND fecha <= '$fecha_hasta'";
        if ($id_cliente != null)
            $sql .= "AND id_cliente = $id_cliente";
        $sql .= "ORDER BY id_venta";
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

    function actualizar_ventas($id_venta, $diferencia)
    {
        $sql = "UPDATE venta 
                SET saldoactualcliente = saldoactualcliente - ($diferencia)
                WHERE id_venta > $id_venta";
        toba::db()->ejecutar($sql); 
    }

    function actualizar_saldo_cliente($id_cliente)
    {
        $sql = "UPDATE cliente
                SET saldo = (SELECT saldoactualcliente 
                            FROM venta 
                            WHERE id_venta = (SELECT MAX(id_venta) 
                                                FROM venta 
                                                WHERE id_cliente = $id_cliente))  WHERE id = $id_cliente";
        toba::db()->ejecutar($sql);
    }

    function get_venta($id_venta) {
        $sql = "SELECT *
                FROM venta
                WHERE id_venta = $id_venta";
        return toba::db()->consultar($sql);
    }

    function eliminar_venta($id_venta)
    {
        $sql = "DELETE FROM venta 
                WHERE id_venta = $id_venta";
        toba::db()->ejecutar($sql); 
    }

    function actualizar_venta($id_venta, $precioTotal, $saldoCliente)
    {
        $sql = "UPDATE venta 
                SET preciototal = $precioTotal, saldoactualcliente = $saldoCliente
                WHERE id_venta = $id_venta";
        toba::db()->ejecutar($sql); 
    }

    function actualizar_pago($id_cliente, $entrega)
    {
        $sql = "UPDATE venta 
                SET entrega = $entrega
                WHERE id_venta = $id_venta";
        toba::db()->ejecutar($sql); 
    }

    function get_ventas_por_tropa($tropa)
    {
        $sql = "SELECT v.tipo, v.fecha, v.categoria, v.cantanimales, v.kgtotales, v.preciokilo, v.preciototal, (c.apellido || ' ' || c.nombre) AS ncompleto
                FROM venta AS v
                INNER JOIN cliente AS c ON (c.id = v.id_cliente)
                WHERE v.tropa = $tropa
                ORDER BY v.fecha";
        return toba::db()->consultar($sql);
    }
    
}
?>