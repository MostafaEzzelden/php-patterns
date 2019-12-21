<?php

namespace App;

interface UserRepositoryInterface
{
    public function createUser(array $data);
    public function updateUser(User $user, array $data);
    public function deleteUser(User $user);
    public function initialize();
}
