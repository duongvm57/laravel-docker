<?php

namespace App\Repositories;

use App\Contracts\Repositories\BaseRepositoryInterface;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements BaseRepositoryInterface
{
    public Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $columns
     * @param array $with
     * @return Builder[]|Collection
     */
    public function getColumns(array $columns = ['*'], array $with= []): Collection|array
    {
        return $this->model::with($with)->get($columns);
    }

    /**
     * @param $id
     * @param string[] $columns
     * @return mixed
     */
    public function find($id, array $columns = ['*']): mixed
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
     * @return bool
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
