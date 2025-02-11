<?php

namespace App\Repositories;

use App\Constants\RepoConst;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

abstract class BaseRepo implements IBaseRepo
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * @var Table
     */
    protected $table;

    /**
     * @var Builder
     */
    protected $query;

    public function __construct()
    {
        $this->makeModel();
        $this->table = $this->model->getTable();
        $this->query = $this->model->newQuery();
    }

    /**
     * Specify Model class name.
     *
     * @return Model
     */
    abstract public function model();

    /**
     * @throws Exception
     */
    public function makeModel(): Model
    {
        $model = app()->make($this->model());
        if (! $model instanceof Model) {
            throw new Exception("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }

        return $this->model = $model;
    }

    /**
     * @return Builder
     */
    public function resetQuery()
    {
        return $this->query = $this->model->newQuery();
    }

    /**
     * Retrieve all entities.
     *
     * @param  array  $columns
     * @return mixed
     */
    public function all($columns = ['*'])
    {
        $result = $this->query->get($columns);

        $this->resetQuery();

        return $result;
    }

    /**
     * Get entities values of a given key.
     *
     * @param  string  $column
     * @param  string|null  $key
     * @return \Illuminate\Support\Collection|array
     */
    public function pluck($column, $key = null)
    {
        $result = $this->query->pluck($column, $key);

        $this->resetQuery();

        return $result;
    }

    /**
     * Find an entity by id.
     *
     * @param  int  $id
     * @param  array  $columns
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|static[]|static|null
     */
    public function find($id, $columns = ['*'])
    {
        $model = $this->query
            ->where($this->model->getQualifiedKeyName(), $id)
            ->firstOrFail($columns);

        $this->resetQuery();

        return $model;
    }

    /**
     * Get first entity.
     *
     * @param  array  $columns
     * @return \Illuminate\Database\Eloquent\Model|static|null
     */
    public function first($columns = ['*'])
    {
        $model = $this->query->first($columns);

        $this->resetQuery();

        return $model;
    }

    /**
     * Find the entities by attribute and value.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  array  $columns
     * @return mixed
     */
    public function findByAttribute($attribute, $value, $columns = ['*'])
    {
        $result = $this->query->where($attribute, '=', $value)->get($columns);

        $this->resetQuery();

        return $result;
    }

    /**
     * Find the entities by multiple attributes.
     *
     * @param  array  $columns
     * @return mixed
     */
    public function findWhere(array $where, $columns = ['*'])
    {
        $this->applyConditions($where);

        $result = $this->query->get($columns);

        $this->resetQuery();

        return $result;
    }

    /**
     * Find the entities by multiple values in one attribute.
     *
     * @param  mixed  $attribute
     * @param  array  $columns
     * @return mixed
     */
    public function findWhereIn($attribute, array $values, $columns = ['*'])
    {
        $result = $this->query->whereIn($attribute, $values)->get($columns);

        $this->resetQuery();

        return $result;
    }

    /**
     * Find the entities by excluding multiple values in one attribute.
     *
     * @param  mixed  $attribute
     * @param  array  $columns
     * @return mixed
     */
    public function findWhereNotIn($attribute, array $values, $columns = ['*'])
    {
        $result = $this->query->whereNotIn($attribute, $values)->get($columns);

        $this->resetQuery();

        return $result;
    }

    /**
     * Get entities count.
     *
     * @return mixed
     */
    public function count()
    {
        $count = $this->query->count();

        $this->resetQuery();

        return $count;
    }

    /**
     * Determine if the entity exists.
     *
     * @return mixed
     */
    public function exists()
    {
        $exists = $this->query->exists();

        $this->resetQuery();

        return $exists;
    }

    /**
     * Create new entity.
     *
     *
     * @return mixed
     */
    public function insert(array $data)
    {
        $model = $this->model->newInstance();
        $rs = $model->insert($data);

        return $rs;
    }

    /**
     * Create new entity.
     *
     *
     * @return mixed
     */
    public function create(array $attributes)
    {
        $model = $this->model->newInstance();
        $model->fill($attributes);
        $model->save();

        return $model;
    }

    /**
     * Update an entity by id.
     *
     * @param  int  $id
     * @return mixed
     */
    public function update(array $attributes, $id)
    {
        $model = $this->query->findOrFail($id);
        $model->fill($attributes);
        $model->save();

        $this->resetQuery();

        return $model;
    }

    /**
     * Update or Create an entity.
     *
     *
     * @return mixed
     */
    public function updateOrCreate(array $attributes, array $values = [])
    {
        $model = $this->query->updateOrCreate($attributes, $values);

        $this->resetQuery();

        return $model;
    }

    /**
     * Delete an entity by id.
     *
     * @param  int  $id
     * @return int
     */
    public function delete($id)
    {
        $model = $this->find($id);
        $deleted = $model->delete();

        $this->resetQuery();

        return $deleted;
    }

    /**
     * Force delete an entity by id.
     *
     * @param  int  $id
     * @return mixed
     */
    public function forceDelete($id)
    {
        $model = $this->find($id);
        $deleted = $model->forceDelete();

        $this->resetQuery();

        return $deleted;
    }

    /**
     * Delete multiple entities by attribute values.
     *
     *
     * @return int
     */
    public function deleteWhere(array $where)
    {
        $this->applyConditions($where);

        $deleted = $this->query->delete();

        $this->resetQuery();

        return $deleted;
    }

    /**
     * Force delete multiple entities by attribute values.
     *
     *
     * @return int
     */
    public function forceDeleteWhere(array $where)
    {
        $this->applyConditions($where);

        $deleted = $this->query->forceDelete();

        $this->resetQuery();

        return $deleted;
    }

    /**
     * Check if entity has relation.
     *
     * @param  string  $relation
     * @return $this
     */
    public function has($relation)
    {
        $this->query = $this->query->has($relation);

        return $this;
    }

    /**
     * Load relations.
     *
     * @param  array|string  $relations
     * @return $this
     */
    public function with($relations)
    {
        $this->query = $this->query->with($relations);

        return $this;
    }

    /**
     * Load relation with closure.
     *
     * @param  string  $relation
     * @return $this
     */
    public function whereHas($relation, \Closure $closure)
    {
        $this->query = $this->query->whereHas($relation, $closure);

        return $this;
    }

    /**
     * Order the collection by a given attribute.
     *
     * @param  string  $attribute
     * @param  string  $direction
     * @return $this
     */
    public function orderBy($attribute, $direction = 'asc')
    {
        $this->query = $this->query->orderBy($attribute, $direction);

        return $this;
    }

    /**
     * Order the collection by a given attribute.
     *
     * @param  string  $attribute
     * @param  string  $direction
     * @return $this
     */
    public function offset(int $offset)
    {
        $this->query = $this->query->offset($offset);

        return $this;
    }

    /**
     * Order the collection by a given attribute.
     *
     * @param  string  $attribute
     * @param  string  $direction
     * @return $this
     */
    public function limit(int $limit)
    {
        $this->query = $this->query->limit($limit);

        return $this;
    }

    /**
     * Paginate all entities.
     *
     * @param  int|null  $limit
     * @param  array  $columns
     * @param  string  $method
     * @return mixed
     */
    public function paginate($limit = null, $columns = ['*'], $method = 'paginate')
    {
        $limit = is_null($limit) ? RepoConst::PAGINATION_LIMIT_DEFAULT : $limit;
        $result = $this->query->{$method}($limit, $columns);
        $result->appends(app('request')->query());

        $this->resetQuery();

        return $result;
    }

    /**
     * Paginate all entities using simple paginator.
     *
     *
     * @return mixed
     */
    public function simplePaginate(?int $page, array $columns = ['*'])
    {
        $result = $this->limit(RepoConst::PAGINATION_LIMIT_DEFAULT)
            ->offset(RepoConst::PAGINATION_LIMIT_DEFAULT * (($page ?? RepoConst::PAGINATION_PAGE_DEFAULT) - 1))
            ->all($columns);

        $this->resetQuery();

        return $result;
    }

    /**
     * Set visible attributes.
     *
     *
     * @return $this
     */
    public function visible(array $attributes)
    {
        $this->query->setVisible($attributes);

        return $this;
    }

    /**
     * Set hidden attributes.
     *
     *
     * @return $this
     */
    public function hidden(array $attributes)
    {
        $this->query->setHidden($attributes);

        return $this;
    }

    /**
     * Applies the given where conditions to the model.
     *
     *
     * @return void
     */
    protected function applyConditions(array $where)
    {
        foreach ($where as $attribute => $value) {
            if (is_array($value)) {
                [$attribute, $condition, $val] = $value;
                $this->query = $this->query->where($attribute, $condition, $val);
            } else {
                $this->query = $this->query->where($attribute, '=', $value);
            }
        }
    }

    /**
     * Mass Upsert
     *
     * Check item id value to decide item is create or update
     *
     * @param array
     *
     * @return void
     */
    public function massUpsert(array $data): void
    {
        $data = collect($data)->reduce(function ($carry, $item) {
            if (!isset($item['id']) || empty($item['id'])) {
                $item['updated_at'] = now();
                $item['created_at'] = now();
                $carry['insert'][] = $item;
            } else {
                $item['updated_at'] = now();
                $carry['update'][] = $item;
            }
            return $carry;
        });

        if (isset($data['insert']) && !empty($data['insert'])) {
            $this->insert($data['insert']);
        }

        if (isset($data['update']) && !empty($data['update'])) {
            $this->massUpdate($data['update']);
        }

        return;
    }

    /**
     * Mass Update
     *
     * @param array
     *
     * @return int
     */
    public function massUpdate(array $data): int
    {
        $data = collect($data);
        $firstItem = collect($data->first());
        $fieldsInsert = $firstItem
            ->keys()
            ->implode(',');

        $fieldsUpdate = $firstItem
            ->keys()
            ->map(function($item) {
                $item = "{$item} = VALUES({$item})";
                return $item;
            })
            ->implode(',');

        $valuesInsert = $data
            ->map(function($item) {
                $items = collect($item)
                    ->map(function($item) {
                        return !is_null($item) ? "'" . $item . "'" : "null";
                    });

                $items = $items->implode(',');

                $item = "(" . $items . ")";
                return $item;
            })
            ->implode(',');

        $query = "INSERT INTO {$this->table} ({$fieldsInsert}) VALUES {$valuesInsert} ON DUPLICATE KEY UPDATE $fieldsUpdate";

        return DB::insert($query);
    }

    /**
     * Get records by conditions.
     *
     * @param $conditions
     * @param $isGetFirst
     * @param $select
     * @return mixed
     */
    public function getRecordsByConditions($conditions, $isGetFirst = true, $select = '*', $order = [])
    {
        $data = $this->model->where($conditions)->select($select);
        if (count($order) > 0) {
            $data->orderBy($order[0], $order[1]);
        }

        return $isGetFirst ? $data->first() : $data->get();
    }
}
