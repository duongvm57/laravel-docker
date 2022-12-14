<?php

namespace App\Repositories;

use App\Contracts\Repositories\BaseRepositoryInterface;
use Exception;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements BaseRepositoryInterface
{
    public Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param string[] $columns
     * @param array $with
     * @return mixed
     */
    public function getColumns($columns = ['*'], $with = []): mixed
    {
        return $this->model->select($columns)->with($with);
    }

    /**
     * @param $id
     * @param string[] $columns
     * @return mixed
     */
    public function find($id, $columns = ['*']): mixed
    {
        return $this->model->findOrFail($id, $columns);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function store($data): mixed
    {
        return $this->model->create($data);
    }

    /**
     * @param Model $model
     * @param array $data
     * @return bool|mixed
     */
    public function update(Model $model, array $data): mixed
    {
        return $model->update($data);
    }

    /**
     * @param $ids
     * @return int
     */
    public function destroyMulti($ids): int
    {
        return $this->model->destroy($ids);
    }

    /**
     * @param Model $model
     * @return bool|null
     * @throws Exception
     */
    public function destroy(Model $model): ?bool
    {
        return $model->delete();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function restoreSoftDelete($id): mixed
    {
        return $this->model
            ->withTrashed()
            ->where('id', $id)
            ->restore();
    }
}
