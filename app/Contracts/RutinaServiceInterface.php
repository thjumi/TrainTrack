<?php

namespace App\Contracts;

interface RutinaServiceInterface
{
    public function getAllRutinas($user);

    public function createRutina(array $data, $user);

    public function getRutinaById($id, $user);

    public function updateRutina($id, array $data, $user);

    public function deleteRutina($id, $user);
}
