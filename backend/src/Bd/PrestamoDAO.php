<?php

namespace Raiz\Bd;

use Raiz\Auxiliares\Serializador;
use Raiz\Bd\InterfaceDAO;
use Raiz\Models\Prestamo;


class PrestamoDAO implements InterfaceDAO
{

    public static function listar(): array
    {
        $sql = 'SELECT * FROM prestamos';
        $listaPrestamos = ConectarBD::leer(sql: $sql);
        $prestamos = [];
        foreach ($listaPrestamos as $prestamo) {
            $prestamo['socio'] = SocioDAO::encontrarUno($prestamo['id']);
            $prestamo['libro'] = LibroDAO::encontrarUno($prestamo['id']);
            $prestamos[] = Prestamo::deserializar($prestamo);
        }
        return $prestamos;
    }
    public static function encontrarUno(string $id): ?Prestamo
    {
        $sql = 'SELECT * FROM prestamos WHERE id =:id;';
        $prestamo = ConectarBD::leer(sql: $sql, params: [':id' => $id]);
        if (count($prestamo) === 0) {
           return null;
        } else {
            $prestamo = Prestamo::deserializar($prestamo[0]);
            return $prestamo;
        }
    }

    public static function crear(Serializador $instancia): void
    {
        $params = $instancia->serializar();
        $sql = 'INSERT INTO prestamos (id, id_libro, id_socio, fecha_desde, fecha_hasta, fecha_dev) VALUES (:id, :id_libro, :id_socio, :fecha_desde, :fecha_hasta, :fecha_dev)';
        ConectarBD::escribir(
            sql: $sql,
            params: [
                ':id' => $params['id'],
                ':id_libro' => $params['libro']['id'],
                ':id_socio' => $params['socio']['id'],
                ':fecha_desde' => $params['fecha_desde'],
                ':fecha_hasta' => $params['fecha_hasta']
            ]
        );
    }

    public static function actualizar(Serializador $instancia): void
    {
        $params = $instancia->serializar();
        $sql = 'UPDATE prestamos SET id_libro =:id_libro WHERE id=:id';
        ConectarBD::escribir(
            sql: $sql,
            params: [
                ':id' => $params['id'],
                ':id_libro' => $params['id_libro'],
                ':id_socio' => $params['id_socio'],
                ':fecha_desde' => $params['fecha_desde'],
                ':fecha_dev' => $params['fecha_dev']
            ]
        );
    }
    public static function borrar(string $id)
    {
        $sql = 'DELETE FROM prestamos WHERE id=:id';
        ConectarBD::escribir(sql: $sql, params: [':id' => $id]);
    }
}
