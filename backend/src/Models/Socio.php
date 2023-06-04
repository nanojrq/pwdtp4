<?php
declare(strict_types=1);
namespace Raiz\Models;
use Raiz\Models\Persona;
use datetime;

class Socio extends Persona{
    private $id;
    private $fecha_alta;
    private $activo;
    private $telefono;
    private $direccion;

    public function __construct(string $nombre_apellido, int $dni, int $id, datetime $fecha_alta, int $activo, int $telefono, string $direccion){
        parent::__construct($nombre_apellido, $dni);
        $this->id = $id;
        $this->fecha_alta = $fecha_alta;
        $this->activo = $activo;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
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
            "dni" => $this->getDni(),
            "nombre" => $this->getNombre(),
            "id_socio" =>$this->getId(),
            "fecha_alta"=>$this->getFechaAlta(),
            "es_activo"=>$this->getActivo(),
            "telefono"=>$this->getTelefono(),
            "direccion"=>$this->getDireccion()
        ];
    }

    
    /** @param mixed[] */
    public static function deserializar(array $datos): Self{
        return new Socio(
            dni: $datos["dni"],
            nombre_apellido: $datos ["nombre"],
            id: $datos["id_socio"],
            fecha_alta: $datos ["fecha_alta"],
            activo:  $datos["es_activo"],
            telefono:  $datos["telefono"],
            direccion:  $datos["direccion"]
        );
    }
}

  