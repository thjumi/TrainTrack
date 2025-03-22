<?php

namespace App\Contracts;

interface ClaseServiceInterface
{
    public function getAllClases($user);
    public function getClaseById($id);
    public function createClase(array $data);
    public function updateClase($id, array $data);
    public function deleteClase($id);
}
