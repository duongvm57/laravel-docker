<?php

namespace App\Contracts\Repositories;

use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryInterface
{
    /**
     * @param array $columns
     * @param array $with
     * @return mixed
     */
    public function getColumns(array $columns = ['*'], array $with= []): mixed;

    /**
     * @param $id
     * @param string[] $columns
     * @return mixed
     */
    public function find($id, array $columns = ['*']): mixed;

    /**
     * @param $data
     * @return mixed
     */
    public function store($data): mixed;

    /**
     * @param Model $model
     * @param array $data
     * @return mixed
     */
    public function update(Model $model, array $data): mixed;

    /**
     * @param Model $model
     * @return mixed
     */
    public function destroy(Model $model): mixed;

    /**
     * @param $ids
     * @return mixed
     */
    public function destroyMulti($ids): mixed;

    /**
     * @param $id
     * @return mixed
     */
    public function restoreSoftDelete($id): mixed;
}
