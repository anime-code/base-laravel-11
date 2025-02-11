<?php

namespace App\Repositories\User;


use App\Models\User;
use App\Repositories\BaseRepo;
class UserRepo extends BaseRepo implements IUserRepo
{
    /**
     * @return string
     */
    public function model()
    {
        return User::class;
    }


}
