<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libs\Interfaces\MessageRepositoryInterface;
use Illuminate\Auth\Access\AuthorizationException;

class MessageController extends Controller
{
    private MessageRepositoryInterface $messageRepository;

    /**
     * Create a controller instance.
     */
    public function __construct(MessageRepositoryInterface $messageRepository)
    {
        $this->messageRepository = $messageRepository;
        $this->middleware('verified')->only('show');
    }

    /**
     * Display a listing of the authenticated user messages.
     * Display the send message resource.
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\View\View
     */
    public function index(string $username)
    {
        if (auth()->guard('user')->check() && auth()->guard('user')->user()->username == $username) {
            return $this->show($username);
        } else {
            return $this->create($username);
        }
    }

    /**
     * Send response to ajax refresh script.
     *
     * @return \Illuminate\Http\Response
     */
    public function refresh()
    {
        return response()->json(['messages' => $this->messageRepository->index()->count()]);
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
            // Broadcast the MessageSent event
            // broadcast(new MessageSent($message))->toOthers();
            return response()->json(['status' => 'success', 'message' => 'Message sent successfully!']);
        }
        return response()->json(['status' => 'error', 'message' => 'Please refresh your browser and try again!']);
    }

    /**
     * Show the form for creating a new message.
     *
     * @param  string  $username
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\View\View
     */
    public function create(string $username)
    {
        return view('message.show', [
            'user' => $this->messageRepository->show($username),
            'useranme' => $username
        ]);
    }

     /**
     * Display the message view resource.
     *
     * @param  string  $username
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\View\View
     */
    public function show(string $username)
    {
        return view('message.index', [
                'messages' => $this->messageRepository->index(),
                'username' => $username,
                'userId' => auth()->guard('user')->user()->id
            ]);
    }

    /**
     * Clear user message from the message database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|Illuminate\Support\Facades\Redirect
     */
    public function destroy(string $id)
    {
        $this->messageRepository->destroy($id);
        return redirect()->back()->with(['message' => 'Message cleared successfully']);
    }
}
