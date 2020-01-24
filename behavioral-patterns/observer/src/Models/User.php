<?php

namespace App\Models;

use App\Models\Model;

/**
 * Let's keep the User class trivial since it's not the focus of our example.
 */
class User extends Model
{
    protected $filename =  __DIR__ . "/../data/database/users.csv";

    public function all(): array
    {
        $users = [];
        if (($file = @fopen($this->filename, "r")) !== false) {
            while (($data = fgetcsv($file, 1000, ",")) !== false) {
                $users[] = new User([
                    'id' => $data[0],
                    'name' => $data[1],
                    'email' => $data[2],
                ]);
            }
            fclose($file);
        }
        return $users;
    }

    public function create(array $data = []): void
    {
        $this->attributes = array_merge($this->attributes, $data);

        $users = $this->all();

        array_push($users, $this);
        $this->save($users);
    }

    public function update($data): void
    {
        $this->attributes = array_merge($this->attributes, $data);
        $users = $this->all();
        foreach ($users as $key => $user) {
            if ($user->attributes['id'] == $this->attributes['id']) {
                $users[$key] = $this;
            }
        }
        $this->save($users);
    }

    public function delete()
    {
        $users = $this->all();
        foreach ($users as $key => $user) {
            if ($user->attributes['id'] == $this->attributes['id']) {
                unset($users[$key]);
                break;
            }
        }

        $this->save($users);
    }
}
