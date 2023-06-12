<?php
declare(strict_types=1);
namespace Raiz\Models;

class Editorial extends ModelBase{
    private $nombre;

    public function __construct(?int $id, string $nombre){
        parent::__construct($id);
        $this->nombre = $nombre;
    }

    public function setNombre($nombre){
        $this->nombre= $nombre;
    }
    public function getNombre(){
        return $this->nombre;
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
        return new Editorial(
            id: $datos["id"],
            nombre: $datos ["nombre"]
        );
    }
}