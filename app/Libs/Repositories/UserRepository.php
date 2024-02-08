<?php

namespace App\Libs\Repositories;

use App\Models\User;
use App\Libs\Actions\UserAction;
use App\Libs\RepositoryInterfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @var UserAction
     */
    private UserAction $action;

    /**
     * @param UserAction $action
     */
    public function __construct(UserAction $action)
    {
        $this->action = $action;
    }

    public function update($request, User $user) : User
	{
		$user = $user->where('id', auth()->guard('user')->user()->id)->first();
        $request->profile = 1;
		$this->action->update($request, $user);

		return $user;
    }
}
