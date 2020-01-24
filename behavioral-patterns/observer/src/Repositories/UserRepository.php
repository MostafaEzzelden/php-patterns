<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Model;
use App\Observer\Observer;
use App\Repositories\RepositoryInterface;

class UserRepository extends Observer implements RepositoryInterface
{
    /**
     * @var array The list of users.
     */
    private $users = [];

    public function create(array $data): User
    {
        $user = new User;
        $id = bin2hex(openssl_random_pseudo_bytes(16));
        $user->create(array_merge(["id" => $id], $data));
        $this->users[$id] = $user;
        $this->notify("users:created", $user);
        return $user;
    }

    public function update(Model $user, array $data)
    {
        $id = $user->attributes["id"];
        if (!isset($this->users[$id])) {
            return null;
        }
        $user = $this->users[$id];
        $user->update($data);
        $this->notify("users:updated", $user);
        return $user;
    }

    public function delete(Model $user): void
    {
        $id = $user->attributes["id"];
        if (!isset($this->users[$id])) {
            return;
        }
        $user->delete();
        unset($this->users[$id]);
        $this->notify("users:deleted", $user);
    }

    public function initialize(): void
    {
        $user = new User;
        foreach ($user->all() as $user) {
            $this->users[$user->attributes['id']] = $user;
        }
        $this->notify("users:init");
    }
}
