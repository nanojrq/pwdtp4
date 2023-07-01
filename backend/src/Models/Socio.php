<?php
declare(strict_types=1);
namespace Raiz\Models;
use Raiz\Models\Persona;
use Raiz\Models\ModelBase;
use datetime;

class Socio extends Modelbase{
    private $nombre_apellido;
    private $fecha_alta;
    private $activo;
    private $telefono;
    private $direccion;

    public function __construct(?int $id, string $nombre_apellido, ?string $fecha_alta, ?int $activo, int $telefono, string $direccion){
        parent::__construct($id);
        $this->nombre_apellido = $nombre_apellido;
        $this->fecha_alta = ($fecha_alta);
        $this->activo = $activo;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
    }


    public function setNombre($nombre_apellido){
        $this->nombre_apellido = $nombre_apellido;
    }
    public function getNombre(){
        return $this->nombre_apellido;
    }

    public function setFechaAlta($fecha_alta){
        $this->fecha_alta= $fecha_alta;
    }
    public function getFechaAlta(){
        return $this->fecha_alta;
    }

    public function setActivo($activo){
        $this->activo = $activo;
    }
    public function getActivo(){
        return $this->activo;
    }
    
    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }
    public function getTelefono(){
        return $this->telefono;
    }

    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }
    public function getDireccion(){
        return $this->direccion;
    }
    

    /** @return mixed[] */
    public function serializar(): array{
        return[
            "nombre_apellido" => $this->getNombre(),
            "id" =>$this->getId(),
            "fecha_alta"=>$this->getFechaAlta(),
            "activo"=>$this->getActivo(),
            "telefono"=>$this->getTelefono(),
            "direccion"=>$this->getDireccion()
        ];
    }

    
    /** @param mixed[] */
    public static function deserializar(array $datos): Self{
        return new Socio(
            nombre_apellido: $datos ["nombre_apellido"],
            id: $datos["id"] === null ? 0 : intVal($datos["id"]),
            fecha_alta: $datos ["fecha_alta"],
            activo:  $datos["activo"],
            telefono:  $datos["telefono"],
            direccion:  $datos["direccion"]
        );
    }
}

  