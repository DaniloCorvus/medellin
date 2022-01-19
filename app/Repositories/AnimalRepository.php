<?php

namespace App\Repositories;

use App\Models\Animal;
use Illuminate\Support\Facades\File;

class AnimalRepository
{
    protected $model;

    /**
     * AnimalRepository constructor.
     *
     * @param Animal $animal
     */
    public function __construct(Animal $animal)
    {
        $this->model = $animal;
    }

    public function all()
    {
        return $this->model->with('barnyard')
            ->where('barnyard_id', request()->get('barnyard'))->paginate(50, ['*'], 'page', request()->get('page', 1));
    }

    public function ageAverage()
    {
        $temp = $this->model->where('barnyard_id', request()->get('barnyard'))->get();
        return $temp->avg('age');
    }

    public function get()
    {
        return $this->model->get(['name', 'id']);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->model->firstWhere('id', $id)->update($data);
    }

    public function delete($id)
    {
        $animal = $this->find($id);
        return $this->model->destroy($id);
    }

    public function find($id)
    {
        $animal = $this->model->find($id);
        return $animal;
    }
}
