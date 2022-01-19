<?php

namespace App\Repositories;

use App\Models\Barnyard;
use Illuminate\Support\Facades\File;

class BarnyardRepository
{
    protected $model;

    /**
     * BarnyardRepository constructor.
     *
     * @param Barnyard $barnyaerd
     */
    public function __construct(Barnyard $barnyaerd)
    {
        $this->model = $barnyaerd;
    }

    public function all()
    {
        return $this->model->paginate(10, ['*'], 'page', request()->get('page', 1));
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

    public function forSelect()
    {
        return $this->model->get(['id', 'name']);
    }

    public function delete($id)
    {
        $barnyaerd = $this->find($id);
        return $this->model->destroy($id);
    }

    public function disponibility($id)
    {
        $barnyaerd = $this->find($id);
        return $barnyaerd->limit;
    }

    public function find($id)
    {
        $barnyaerd = $this->model->find($id);
        return $barnyaerd;
    }
}
