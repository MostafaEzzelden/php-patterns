<?php


/**
 * Let's keep the User class trivial since it's not the focus of our example.
 */
class User
{
    const FILENAME = __DIR__ . "/../users.csv";

    public $attributes = [];

    public function __construct(array $attributes = [])
    {
        $this->attributes = $attributes;
    }

    public function getAll(): array
    {
        $users = [];

        if (($file = @fopen(self::FILENAME, "r")) !== false) {
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

        $users = $this->getAll();

        array_push($users, $this);
        $this->save($users);
    }

    private function save(array $users): void
    {

        if (($file = @fopen(self::FILENAME, "w")) !== false) {

            foreach ($users as $key => $user) {
                $attributes = $user->attributes;
                if (!is_null($attributes)) {
                    fputcsv($file, $attributes, ",");
                }
            }

            fclose($file);
        }
    }

    public function update($data): void
    {
        $this->attributes = array_merge($this->attributes, $data);

        $users = $this->getAll();

        foreach ($users as $key => $user) {
            if ($user->attributes['id'] == $this->attributes['id']) {
                $users[$key] = $this;
            }
        }
        $this->save($users);
    }

    public function delete()
    {
        $users = $this->getAll();
        foreach ($users as $key => $user) {
            if ($user->attributes['id'] == $this->attributes['id']) {
                unset($users[$key]);
                break;
            }
        }

        $this->save($users);
    }

    public function getById(string $id)
    {
        $users = $this->getAll();
        foreach ($users as $user) {
            if ($user->attributes['id'] == $id) {
                return $user;
            }
        }
        return null;
    }
}
