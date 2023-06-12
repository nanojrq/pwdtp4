<?php
declare(strict_types=1);
namespace Raiz\Models;

class Autor extends ModelBase{
    private $nombre_apellido;

    public function __construct(?int $id, string $nombre_apellido){
        parent::__construct($id);
        $this->nombre_apellido = $nombre_apellido;
    }

    public function setNombre($nombre_apellido){
        $this->nombre_apellido = $nombre_apellido;
    }
    
    public function getNombre(){
        return $this->nombre_apellido;
    }
    
    /** @return mixed[] */
    public function serializar(): array{
        return[
            "id" => $this->getId(),
            "nombre" => $this->getNombre(),
        ];
    }

    
    /** @param mixed[] */
    public static function deserializar(array $datos): Self{
        return new Autor(
            id: $datos["id"],
            nombre_apellido: $datos ["nombre"]
        );
    }
}