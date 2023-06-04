<?php

namespace Raiz\Bd;

use Raiz\Auxiliares\Serializador;
use Raiz\Bd\InterfaceDAO;
use Raiz\Models\Genero;


class GeneroDAO implements InterfaceDao{

    public static function crear(Serializador $instancia):void {
        $params = $instancia->serializar();
        $sql = 'INSERT INTO genero (id, descripcion, activo) VALUES (:id, :descripcion, :activo)';
        ConectarBD::escribir(
            sql: $sql,
            params: [
                ':id' => $params['id'],
                ':descripcion' => $params['descripcion'],
                ':activo' => $params['activo'],
            ]
        );
    }

    public static function listar(): array{
        $sql = 'SELECT * FROM genero';
        $listaGeneros = ConectarBD::leer(sql: $sql);
        $generos = [];
        foreach ($listaGeneros as $genero) {
            $generos[] = Genero::deserializar($genero);
        }
        return $generos;
    }

    public static function encontrarUno(string $id): ?Genero{
        $sql = 'SELECT * FROM genero WHERE id =:id;';
        $genero = ConectarBD::leer(sql: $sql, params: [':id' => $id]);
        if (count($genero) === 0) {
           return null;
        } else {
            $genero = Genero::deserializar($genero[0]);
            return $genero;
        }
    }

    public static function actualizar(Serializador $instancia): void{
        $params = $instancia->serializar();
        $sql = 'UPDATE genero SET nombre =:nombre WHERE id=:id';
        ConectarBD::escribir(
            sql: $sql,
            params: [
                ':id' => $params['id'],
                ':descripcion' => $params['descripcion'],
                ':activo' => $params['activo']
            ]
        );
    }
    
    public static function borrar(string $id){
        $sql = 'DELETE FROM genero WHERE id=:id';
        ConectarBD::escribir(sql: $sql, params: [':id' => $id]);
    }
}




//create
//read
//update
//delete