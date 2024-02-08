<?php
namespace App\Libs\Actions;


//use App\Models\User;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\UserResource;

class UserAction
{
    /**
     * @var User
     */
    private User $model;

    /**
     *
     * @param User $model
     */
    public function __construct(User $model)
    {
       $this->model = $model;
    }

	public function update($request, User $user) : User
	{
		$user->fname = $request->fname;
		$user->lname = $request->lname;
		$user->phone = $request->phone;
		$user->gender = $request->gender;
		$user->profile = $request->profile;
		$user->save();

		return $user;
	}
}
