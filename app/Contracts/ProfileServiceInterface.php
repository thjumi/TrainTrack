<?php

namespace App\Contracts;

interface ProfileServiceInterface
{
    public function getUser($user);

    public function updateUser($user, array $data);

    public function deleteUser($user, $password);
}
