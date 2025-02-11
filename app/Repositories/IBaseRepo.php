<?php

namespace App\Repositories;

interface IBaseRepo
{
    /**
     * Retrieve all entities.
     *
     * @param  array  $columns
     * @return mixed
     */
    public function all($columns = ['*']);

    /**
     * Get entities values of a given key.
     *
     * @param  string  $column
     * @param  string|null  $key
     * @return \Illuminate\Support\Collection|array
     */
    public function pluck($column, $key = null);

    /**
     * Find an entity by id.
     *
     * @param  int  $id
     * @param  array  $columns
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|static[]|static|null
     */
    public function find($id, $columns = ['*']);

    /**
     * Get first entity.
     *
     * @param  array  $columns
     * @return \Illuminate\Database\Eloquent\Model|static|null
     */
    public function first($columns = ['*']);

    /**
     * Find the entities by attribute and value.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  array  $columns
     * @return mixed
     */
    public function findByAttribute($attribute, $value, $columns = ['*']);

    /**
     * Find the entities by multiple attributes.
     *
     * @param  array  $columns
     * @return mixed
     */
    public function findWhere(array $where, $columns = ['*']);

    /**
     * Find the entities by multiple values in one attribute.
     *
     * @param  mixed  $attribute
     * @param  array  $columns
     * @return mixed
     */
    public function findWhereIn($attribute, array $values, $columns = ['*']);

    /**
     * Find the entities by excluding multiple values in one attribute.
     *
     * @param  mixed  $attribute
     * @param  array  $columns
     * @return mixed
     */
    public function findWhereNotIn($attribute, array $values, $columns = ['*']);

    /**
     * Get entities count.
     *
     * @return mixed
     */
    public function count();

    /**
     * Determine if the entity exists.
     *
     * @return mixed
     */
    public function exists();

    public function insert(array $data);
    /**
     * Create new entity.
     *
     *
     * @return mixed
     */
    public function create(array $attributes);

    /**
     * Update an entity by id.
     *
     * @param  int  $id
     * @return mixed
     */
    public function update(array $attributes, $id);

    /**
     * Update or Create an entity.
     *
     *
     * @return mixed
     */
    public function updateOrCreate(array $attributes, array $values = []);

    /**
     * Delete an entity by id.
     *
     * @param  int  $id
     * @return int
     */
    public function delete($id);

    /**
     * Force delete an entity by id.
     *
     * @param  int  $id
     * @return mixed
     */
    public function forceDelete($id);

    /**
     * Delete multiple entities by attribute values.
     *
     *
     * @return int
     */
    public function deleteWhere(array $where);

    /**
     * Force delete multiple entities by attribute values.
     *
     *
     * @return int
     */
    public function forceDeleteWhere(array $where);

    /**
     * Check if entity has relation.
     *
     * @param  string  $relation
     * @return $this
     */
    public function has($relation);

    /**
     * Load relations.
     *
     * @param  array|string  $relations
     * @return $this
     */
    public function with($relations);

    /**
     * Load relation with closure.
     *
     * @param  string  $relation
     * @return $this
     */
    public function whereHas($relation, \Closure $closure);

    /**
     * Order the collection by a given attribute.
     *
     * @param  string  $attribute
     * @param  string  $direction
     * @return $this
     */
    public function orderBy($attribute, $direction = 'asc');

    /**
     * Paginate all entities.
     *
     * @param  int|null  $limit
     * @param  array  $columns
     * @param  string  $method
     * @return mixed
     */
    public function paginate($limit = null, $columns = ['*'], $method = 'paginate');

    /**
     * Paginate all entities using simple paginator.
     *
     *
     * @return mixed
     */
    public function simplePaginate(?int $page, array $columns = ['*']);

    /**
     * Set visible attributes.
     *
     *
     * @return $this
     */
    public function visible(array $attributes);

    /**
     * Set hidden attributes.
     *
     *
     * @return $this
     */
    public function hidden(array $attributes);

    /**
     * Mass Upsert
     *
     * @param array
     *
     * @return int
     */
    public function massUpsert(array $data): void;

    /**
     * Get records by conditions.
     *
     * @param array $conditions
     * @param $isGetFirst
     * @param $select
     * @return mixed
     */
    public function getRecordsByConditions(array $conditions, $isGetFirst = true, $select = '*');
}
