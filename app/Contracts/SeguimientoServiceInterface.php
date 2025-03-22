<?php

namespace App\Contracts;

interface SeguimientoServiceInterface
{
    public function getAllSeguimientos($user);

    public function getSeguimientoById($id, $user);

    public function createSeguimiento(array $data, $user);

    public function updateSeguimiento($id, array $data, $user);

    public function deleteSeguimiento($id, $user);
}

