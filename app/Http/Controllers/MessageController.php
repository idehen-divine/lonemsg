<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libs\RepositoryInterfaces\MessageRepositoryInterface;

class MessageController extends Controller
{

	private MessageRepositoryInterface $messageRepository;

	/**
	 * Create a controller instance.
	 */
	public function __construct(MessageRepositoryInterface $messageRepository)
	{
		$this->messageRepository = $messageRepository;
	}

    /**
     * Store a newly created message in storage.
     *
     * @param string $username
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($username, Request $request)
    {
        $message = $this->messageRepository->store($username, $request);
        if ($message) {
            return response()->json(['status' => 'success', 'message' => 'Message sent successfully!']);
        }
        return response()->json(['status' => 'error', 'message' => 'Please refresh your browser and try again!']);
    }

	/**
	 * Display a listing of the resource.
	 */
	public function switch(string $username)
	{
		if (auth()->guard('user')->check() && auth()->guard('user')->user()->username == $username) {
			return view('user.message.index', [
				'username' => $username,
				'userId' => auth()->guard('user')->user()->id
			]);
		} else {
			return view('user.message.create', [
				'user' => $this->messageRepository->create($username),
			]);
		}
	}
}
