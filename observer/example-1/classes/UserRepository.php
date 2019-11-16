<?php


interface UserRepository
{
    public function attach(\SplObserver $observer);

    public function detach(\SplObserver $observer);

    public function notify(string $event = "*", $data = null);

    public function initialize();

    public function createUser(array $data);

    public function updateUser(User $user, array $data);

    public function deleteUser(User $user);
}
