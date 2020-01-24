<?php

namespace App\Repositories;

use App\Models\Model;

interface RepositoryInterface
{
    public function create(array $data);
    public function update(Model $repo, array $data);
    public function delete(Model $repo);
    public function initialize();
}
