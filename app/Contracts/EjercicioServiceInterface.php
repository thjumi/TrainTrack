<?php

namespace App\Contracts;

interface EjercicioServiceInterface
{
    public function getAllEjercicios($user);

    public function createEjercicio(array $data);

    public function getEjercicioById($id);

    public function updateEjercicio($id, array $data, $user);

    public function deleteEjercicio($id, $user);
}

