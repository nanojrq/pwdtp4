<?php
namespace Raiz\Controllers;

use Raiz\Models\Categoria;
use Raiz\Bd\CategoriaDAO;
use Raiz\Controllers\InterfaceController;




class CategoriaController implements InterfaceController{

    //Clase que controla de acuerdo a lo que pida la vista: 
    // --- CRUD --- 
    // Crear
    // Listar
    // Actualizar
    // Borrar
    // Buscar


    public static function crear(array $parametros): array{
        
        $Categoria = new Categoria(
            id: null,
            descripcion: $parametros['descripcion'],
        );

        CategoriaDAO::crear($Categoria);
        return $Categoria->serializar();
    }

    public static function listar(): array{
        $categorias= [];
        $listadoCategorias = CategoriaDAO::listar();
     
        foreach($listadoCategorias as $categoria){
        
            $categorias[] = $categoria->serializar();
        }
        
        return $categorias;
    }

    public static function actualizar(array $parametros): array{
        $Categoria = Categoria::deserializar($parametros);
        CategoriaDAO::actualizar($Categoria);
        return $Categoria->serializar();
    }
    
    public static function borrar(string $id):void{
        CategoriaDAO::borrar($id);   
    }

    public static function encontrarUno(string $id): ?array{
        $Categoria = CategoriaDAO::encontrarUno($id);
        if($Categoria===null){
            return $Categoria;
        }else{
            return $Categoria->serializar();
        }
    }
}

