<?php
namespace Raiz\Controllers;

use Raiz\Models\Genero;
use Raiz\Bd\GeneroDAO;
use Raiz\Controllers\InterfaceController;




class LibroController implements InterfaceController{

    //Clase que controla de acuerdo a lo que pida la vista: 
    // --- CRUD --- 
    // Crear
    // Listar
    // Actualizar
    // Borrar
    // Buscar


    public static function crear(array $parametros): array{
        
        $Genero = new Genero(
            id: null,
            descripcion: $parametros['descripcion'],
            activo:$parametros['activo']
        );

        GeneroDAO::crear($Genero);
        return $Genero->serializar();
    }

    public static function listar(): array{
        $generos = [];
        $listadoGeneros = GeneroDAO::listar();
     
        foreach($listadoGeneros as $genero){
        
            $generos[] = $genero->serializar();
        }
        
        return $generos;
    }

    public static function actualizar(array $parametros): array{
        $Genero = Genero::deserializar($parametros);
        GeneroDAO::actualizar($Genero);
        return $Genero->serializar();
    }
    
    public static function borrar(string $id):void{
        GeneroDAO::borrar($id);   
    }

    public static function encontrarUno(string $id): ?array{
        $Genero = GeneroDAO::encontrarUno($id);
        if($Genero===null){
            return $Genero;
        }else{
            return $Genero->serializar();
        }
    }
}

