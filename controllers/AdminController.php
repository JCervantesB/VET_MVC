<?php

namespace Controllers;

use Model\AdminCita;
use MVC\Router;

class AdminController
{
    public static function index(Router $router)
    {
        isAuth();
        isAdmin();
        $fecha='';
        if(empty($_GET['fecha'])){
            $fecha = date('Y-m-d');
        }else{
            $fecha = $_GET['fecha'];
            $fechas = explode('-', $fecha);
            
            if (!checkdate($fechas[1], $fechas[2], $fechas[0])) {
                header('Location: /404');
            }
        }



        //Consultar base de datos
        $consulta = "SELECT citas.id, citas.hora, CONCAT( usuarios.nombre, '
         ', usuarios.apellido) as cliente, ";
        $consulta .= " usuarios.email, usuarios.telefono, servicios.nombre as servicio,
          servicios.precio ";
        $consulta .= " FROM citas ";
        $consulta .= " LEFT OUTER JOIN usuarios ";
        $consulta .= " ON usuarios.id=citas.usuarioId ";
        $consulta .= " LEFT OUTER JOIN citasServicios ";
        $consulta .= " ON citasServicios.citaId=citas.id ";
        $consulta .= " LEFT OUTER JOIN servicios ";
        $consulta .= " ON servicios.id=citasServicios.servicioId ";
        $consulta .= " WHERE fecha =  '${fecha}' ";

        $citas = AdminCita::SQL($consulta);
            $router->render('admin/index', [
                'nombre' => $_SESSION['nombre'],
                'citas' => $citas,
                'fecha' => $fecha
            ]);
    }
}
