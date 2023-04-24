<?php
require_once "conexion.php";

class Ventas{
    
    private $conexion;
    
    public function __construct() {
        $this->conexion = Conexion::conectar();
    }
    
    public function agregarVenta($tipo_combustible, $galones_despachados, $total_dinero, $fecha_hora, $id_tanque) {
        $query = "INSERT INTO ventas (tipo_combustible, galones_despachados, total_dinero, fecha_hora, id_tanque) 
                  VALUES ('$tipo_combustible', '$galones_despachados', '$total_dinero', '$fecha_hora', '$id_tanque')";
        
        $result = $this->conexion->query($query);
        
        if($result) {
            return true;
        } else {
            return false;
        }
    }
    
    public function obtenerVentas() {
        $query = "SELECT * FROM ventas";
        $result = $this->conexion->query($query);
        
        $ventas = array();
        while($fila = $result->fetch_assoc()) {
            $ventas[] = $fila;
        }
        
        return $ventas;
    }
    
    public function actualizarVenta($id_venta, $tipo_combustible, $galones_despachados, $total_dinero, $fecha_hora, $id_tanque) {
        $query = "UPDATE ventas SET tipo_combustible='$tipo_combustible', galones_despachados='$galones_despachados', 
                  total_dinero='$total_dinero', fecha_hora='$fecha_hora', id_tanque='$id_tanque' WHERE id_venta='$id_venta'";
        
        $result = $this->conexion->query($query);
        
        if($result) {
            return true;
        } else {
            return false;
        }
    }
    
    public function eliminarVenta($id_venta) {
        $query = "DELETE FROM ventas WHERE id_venta='$id_venta'";
        
        $result = $this->conexion->query($query);
        
        if($result) {
            return true;
        } else {
            return false;
        }
    }
    
    public function obtenerVentasPorTanque($id_tanque, $fecha_inicio = null, $fecha_fin = null, $hora_inicio = null, $hora_fin = null) {
        $query = "SELECT * FROM ventas WHERE id_tanque='$id_tanque'";
        
        if($fecha_inicio && $fecha_fin) {
            $query .= " AND fecha_hora BETWEEN '$fecha_inicio' AND '$fecha_fin'";
        }
        
        if($hora_inicio && $hora_fin) {
            $query .= " AND TIME(fecha_hora) BETWEEN '$hora_inicio' AND '$hora_fin'";
        }
        
        $result = $this->conexion->query($query);
        
        $ventas = array();
        while($fila = $result->fetch_assoc()) {
            $ventas[] = $fila;
        }
        
        return $ventas;
    }
}
?>
