<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UpdateUserRequest;
use App\Libs\RepositoryInterfaces\UserRepositoryInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Route;

class UserController extends Controller
{
	private UserRepositoryInterface $userRepository;

	/**
	 * Create a controller instance.
	 */
	public function __construct(UserRepositoryInterface $userRepository)
	{
		$this->userRepository = $userRepository;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Illuminate\Contracts\View\View
	 */
    public function index() : View
    {
        return view('user.profile');
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param App\Http\Requests\UpdateUserRequest $request
	 * @param App\Models\User $users
	 * @return Illuminate\Http\RedirectResponse
	 */
    public function update(UpdateUserRequest $request, User $user) : RedirectResponse
    {
		$this->userRepository->update($request, $user);
		return redirect(route('dashboard'));
    }
}
