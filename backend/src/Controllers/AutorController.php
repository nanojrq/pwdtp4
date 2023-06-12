<?php
namespace Raiz\Controllers;

use Raiz\Models\Autor;
use Raiz\Bd\AutorDAO;
use Raiz\Controllers\InterfaceController;




class AutorController implements InterfaceController{

    //Clase que controla de acuerdo a lo que pida la vista: 
    // --- CRUD --- 
    // Crear
    // Listar
    // Actualizar
    // Borrar
    // Buscar


    public static function crear(array $parametros): array{
        
        $Autor= new Autor(
            id: null,
            nombre_apellido: $parametros['nombre_apellido']
        );

        AutorDAO::crear($Autor);
        return $Autor->serializar();
    }

    public static function listar(): array{
        $autores= [];
        $listadoAutores = AutorDAO::listar();
     
        foreach($listadoAutores as $autor){
        
            $autores[] = $autor->serializar();
        }
        
        return $autores;
    }

    public static function actualizar(array $parametros): array{
        $Autor = Autor::deserializar($parametros);
        AutorDAO::actualizar($Autor);
        return $Autor->serializar();
    }
    
    public static function borrar(string $id):void{
        AutorDAO::borrar($id);   
    }

    public static function encontrarUno(string $id): ?array{
        $Autor = AutorDAO::encontrarUno($id);
        if($Autor===null){
            return $Autor;
        }else{
            return $Autor->serializar();
        }
    }
}

