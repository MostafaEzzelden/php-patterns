<?php

namespace App\Models;

abstract class Model
{
    protected $filename;

    public $attributes = [];

    public function __construct(array $attributes = [])
    {
        $this->attributes = $attributes;
    }

    abstract public function all();

    abstract public function create(array $data = []);

    protected function save(array $data): void
    {
        if (($file = @fopen($this->filename, "w")) !== false) {
            foreach ($data as $key => $model) {
                $attributes = $model->attributes;
                if (!is_null($attributes)) {
                    fputcsv($file, $attributes, ",");
                }
            }
            fclose($file);
        }
    }

    abstract public function update($data);

    abstract public function delete();

    public function getById(string $id)
    {
        $rows = $this->all();
        foreach ($rows as $row) {
            if ($row->attributes['id'] == $id) {
                return $row;
            }
        }
        return null;
    }
}
