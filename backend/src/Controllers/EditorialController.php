<?php
namespace Raiz\Controllers;


use Raiz\Bd\LibroDAO;
use Raiz\Models\Editorial;
use Raiz\Bd\EditorialDAO;


class EditorialController implements InterfaceController{

    //Clase que controla de acuerdo a lo que pida la vista: 
    // --- CRUD --- 
    // Crear
    // Listar
    // Actualizar
    // Borrar
    // Buscar


    public static function crear(array $parametros): array{
        $Editorial= new Editorial(
            id: null,
            nombre: $parametros['nombre']
        );

        EditorialDAO::crear($Editorial);
        return $Editorial->serializar();
    }        

    public static function listar(): array{
        $editoriales = [];
        $listadoEditoriales = EditorialDAO::listar();
     
        foreach($listadoEditoriales as $editorial){
        
            $editoriales[] = $editorial->serializar();
        }
        
        return $editoriales;
    }

    public static function actualizar(array $parametros): array{
        $Editorial= Editorial::deserializar($parametros);
        LibroDAO::actualizar($Editorial);
        return $Editorial->serializar();
    }
    
    public static function borrar(string $id):void{
        EditorialDAO::borrar($id);   
    }

    public static function encontrarUno(string $id): ?array{
        $Editorial= EditorialDAO::encontrarUno($id);
        if($Editorial===null){
            return $Editorial;
        }else{
            return $Editorial->serializar();
        }
    }
}

