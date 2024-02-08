<?php

namespace App\Libs\RepositoryInterfaces;

use App\Models\User;



interface UserRepositoryInterface
{
    public function update($request, User $user);
}
