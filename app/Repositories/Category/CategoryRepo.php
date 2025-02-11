<?php

namespace App\Repositories\Category;


use App\Models\Category;
use App\Repositories\BaseRepo;
class CategoryRepo extends BaseRepo implements ICategoryRepo
{
    /**
     * @return string
     */
    public function model()
    {
        return Category::class;
    }


}
