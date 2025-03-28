<?php

namespace App\Contracts;

interface ReservaServiceInterface
{
    public function getAllReservas($user);
    public function createReserva(array $data);
    public function getReservaById($id, $user);
    public function updateReserva($id, array $data, $user);
    public function deleteReserva($id, $user);
}


