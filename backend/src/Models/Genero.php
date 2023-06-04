<?php
declare(strict_types=1);
namespace Raiz\Models;
use Raiz\Models\ModelBase;

class Genero extends ModelBase{    
    private $id;
    private $descripcion;
    private $activo;

    public function __construct(int $id, string $descripcion, string $activo){
        parent::__construct($id);
        $this->descripcion = $descripcion;
        $this->activo = $activo;
    }

    public function setDescripcion($descripcion){
        $this->descripcion= $descripcion;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }

    public function setActivo($activo){
        $this->activo= $activo;
    }
    public function getActivo(){
        return $this->activo;
    }

    /** @return mixed[] */
    public function serializar(): array{
        return[
            "id" => $this->getId(),
            "descripcion" => $this->getDescripcion(),
            "activo" =>$this->getActivo()
        ];
    }

    
    /** @param mixed[] */
    public static function deserializar(array $datos): Self{
        return new Genero(
            id: $datos["id"],
            descripcion: $datos ["descripcion"],
            activo: $datos["activo"]
        );
    }
}