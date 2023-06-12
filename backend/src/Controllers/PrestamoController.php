<?php
namespace Raiz\Controllers;

use Raiz\Models\Prestamo;
use Raiz\Bd\PrestamoDAO;
use Raiz\BD\SocioDAO;
use Raiz\Bd\LibroDAO;
use Raiz\Controllers\InterfaceController;




class PrestamoController implements InterfaceController{

    // --- CRUD --- 
    // Crear
    // Listar
    // Actualizar
    // Borrar
    // Buscar


    public static function crear(array $parametros): array{

        $parametros['socio'] = SocioDAO::encontrarUno($parametros['id']);
        $parametros['libro'] = LibroDAO::encontrarUno($parametros['id']);
        
        $Prestamo = new Prestamo(
            id: null,
            socio: $parametros ['socio'],
            libro: $parametros ['libro'],
            fecha_desde: $parametros ['fecha_desde'],
            fecha_hasta: $parametros['fecha_hasta'],
            fecha_dev:$parametros['fecha_dev']
        );

        PrestamoDAO::crear($Prestamo);
        return $Prestamo->serializar();
    }

    public static function listar(): array{
        $prestamos = [];
        $listadoPrestamos = PrestamoDAO::listar();
        foreach($listadoPrestamos as $prestamo){
        
            $prestamos[] = $prestamo->serializar();
        }
        
        return $prestamos;
    }

    public static function actualizar(array $parametros): array{
        $Prestamo = Prestamo::deserializar($parametros);
        PrestamoDAO::actualizar($Prestamo);
        return $Prestamo->serializar();
    }
    
    public static function borrar(string $id):void{
        PrestamoDAO::borrar($id);   
    }

    public static function encontrarUno(string $id): ?array{
        $Prestamo = PrestamoDAO::encontrarUno($id);
        if($Prestamo===null){
            return $Prestamo;
        }else{
            return $Prestamo->serializar();
        }
    }
}

