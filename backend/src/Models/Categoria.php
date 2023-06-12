<?php
declare(strict_types=1);
namespace Raiz\Models;
use Raiz\Models\ModelBase;

class Categoria extends ModelBase{
    private $descripcion;

    public function __construct(?int $id, string $descripcion){
        parent::__construct($id);
        $this->descripcion = $descripcion;
    }

    public function setDescripcion($descripcion){
        $this->descripcion= $descripcion;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }

        /** @return mixed[] */
        public function serializar(): array{
            return[
                "id" => $this->getId(),
                "descripcion" => $this->getDescripcion(),
            ];
        }
    
        
        /** @param mixed[] */
        public static function deserializar(array $datos): Self{
            return new Categoria(
                id: $datos["id"],
                descripcion: $datos ["descripcion"]
            );
        }
}