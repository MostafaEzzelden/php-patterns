<?php

/**
 * The UserEntity represents a Subject. Various objects are interested in
 * tracking its internal state, whether it's adding a new user or removing one.
 */
class UserEntity implements \SplSubject, UserRepository
{
    /**
     * @var array The list of users.
     */
    private $users = [];

    // Here goes the actual Observer management infrastructure. Note that it's
    // not everything that our class is responsible for. Its primary business
    // logic is listed below these methods.

    /**
     * @var array
     */
    private $observers = [];

    public function __construct()
    {
        // A special event group for observers that want to listen to all
        // events.
        $this->observers["*"] = [];
    }

    private function initEventGroup(string $event = "*"): void
    {
        if (!isset($this->observers[$event])) {
            $this->observers[$event] = [];
        }
    }

    private function getEventObservers(string $event = "*"): array
    {
        $this->initEventGroup($event);
        $group = $this->observers[$event];
        $all = $this->observers["*"];

        return array_merge($group, $all);
    }

    public function attach(\SplObserver $observer, string $event = "*"): void
    {
        $this->initEventGroup($event);

        $this->observers[$event][] = $observer;
    }

    public function detach(\SplObserver $observer, string $event = "*"): void
    {
        foreach ($this->getEventObservers($event) as $key => $s) {
            if ($s === $observer) {
                unset($this->observers[$event][$key]);
            }
        }
    }

    public function notify(string $event = "*", $data = null): void
    {
        echo "UserEntity: Broadcasting the '$event' event.</br>";
        foreach ($this->getEventObservers($event) as $observer) {
            $observer->update($this, $event, $data);
        }
    }

    // Here are the methods representing the business logic of the class.

    public function initialize(): void
    {
        echo "UserEntity: Loading user records from a file.</br>";
        $user = new User;
        foreach ($user->getAll() as $user) {
            $this->users[$user->attributes['id']] = $user;
        }
        $this->notify("users:init", User::FILENAME);
    }

    public function createUser(array $data): User
    {
        echo "UserEntity: Creating a user.</br>";

        $user = new User;

        $id = bin2hex(openssl_random_pseudo_bytes(16));

        $user->create(array_merge(["id" => $id], $data));

        $this->users[$id] = $user;

        $this->notify("users:created", $user);

        return $user;
    }

    public function updateUser(User $user, array $data)
    {
        echo "UserEntity: Updating a user.</br>";

        $id = $user->attributes["id"];
        if (!isset($this->users[$id])) {
            return null;
        }

        $user = $this->users[$id];

        $user->update($data);

        $this->notify("users:updated", $user);

        return $user;
    }

    public function deleteUser(User $user): void
    {
        echo "UserEntity: Deleting a user.</br>";

        $id = $user->attributes["id"];
        if (!isset($this->users[$id])) {
            return;
        }

        $user->delete();

        unset($this->users[$id]);

        $this->notify("users:deleted", $user);
    }
}
