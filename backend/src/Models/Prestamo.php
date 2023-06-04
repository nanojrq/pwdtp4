<?php
declare(strict_types=1);
namespace Raiz\Models;
use Raiz\Models\ModelBase;
use Raiz\Models\Socio;

class Prestamo extends ModelBase{
    private $id;
    private $socio;
    private $libro;
    private $fecha_desde;
    private $fecha_hasta;
    private $fecha_dev;


public function __construct(int $id, Socio $socio, Libro $libro, string $fecha_desde, string $fecha_hasta, ?string $fecha_dev=null){
    parent::__construct($id);
    $this->socio = $socio;
    $this->libro = $libro;
    $this->fecha_desde = date($fecha_desde);
    $this->fecha_hasta = date($fecha_hasta);
    $this->fecha_dev = date($fecha_dev);
}

public function setFechaDesde($fecha_desde){
    $this->fecha_desde = $fecha_desde;
}

public function getFechaDesde(){
    return $this->fecha_desde;
}

public function setFechaHasta($fecha_hasta){
    $this->fecha_hasta = $fecha_hasta;
}

public function getFechaHasta(){
    return $this->fecha_hasta;
}
  
public function setFechaDev($fecha_dev){
    $this->fecha_dev= $fecha_dev;
}

public function getFechaDev(){
    return $this->fecha_dev;
    
}

public function diasRetraso(){
    $devolver = $this->getFechaHasta();
    $hoy = date_create('now');
    $retraso = date_diff($hoy, $devolver);
    $mensaje = "Usted tiene una demora de ".$retraso."días. Será multado.";
    if ($devolver < $hoy) {
        return $mensaje;
    }
}


    /** @return mixed[] */
    public function serializar(): array{
        return[
            "id" => $this->getId(),
            "id_libro" => 
            "id_socio" =>
            "fecha_desde"=>$this->getFechaDesde(),
            "fecha_hasta"=>$this->getFechaHasta(),
            "fecha_dev"=>$this->getFechaDev()
        ];
    }

    
    /** @param mixed[] */
    public static function deserializar(array $datos): Self{
        return new Socio(
            id: $datos["id"],
            id_libro: 
            id_socio: 
            fecha_desde: $datos ["fecha_desde"],
            fecha_hasta:  $datos["fecha_hasta"],
            fecha_dev:  $datos["fecha_dev"]
        );
    }


}
