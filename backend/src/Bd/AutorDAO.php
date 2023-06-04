<?php

namespace Raiz\Bd;
use Raiz\Auxiliares\Serializador;
use Raiz\Bd\InterfaceDAO;
use Raiz\Models\Autor;

class AutorDAO implements InterfaceDAO
{

    public static function listar(): array
    {
        $sql = 'SELECT * FROM autores';
        $listaAutores = ConectarBD::leer(sql: $sql);
        $autores= [];
        foreach ($listaAutores as $autor) {
            $autores[] = Autor::deserializar($autor);
        }
        return $autores;
    }
    public static function encontrarUno(string $id): ?Autor
    {
        $sql = 'SELECT * FROM autores WHERE id =:id;';
        $autor = ConectarBD::leer(sql: $sql, params: [':id' => $id]);
        if (count($autor) === 0) {
           return null;
        } else {
            $autor = Autor::deserializar($autor[0]);
            return $autor;
        }
    }

    public static function crear(Serializador $instancia): void
    {
        $params = $instancia->serializar();
        $sql = 'INSERT INTO autores (id, nombre_apellido) VALUES (:id, :nombre_apellido)';
        ConectarBD::escribir(
            sql: $sql,
            params: [
                ':id' => $params['id'],
                ':nombre_apellido' => $params['nombre_apellido'],
                ]
        );
    }

    public static function actualizar(Serializador $instancia): void
    {
        $params = $instancia->serializar();
        $sql = 'UPDATE autores SET nombre =:nombre WHERE id=:id';
        ConectarBD::escribir(
            sql: $sql,
            params: [
                ':id' => $params['id'],
                ':nombre_apellido' => $params['nombre_apellido'],
            ]
        );
    }
    public static function borrar(string $id)
    {
        $sql = 'DELETE FROM autores WHERE id=:id';
        ConectarBD::escribir(sql: $sql, params: [':id' => $id]);
    }
}

