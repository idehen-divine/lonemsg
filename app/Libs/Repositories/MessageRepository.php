<?php

namespace App\Libs\Repositories;

use App\Models\User;
//use App\Http\Resources\MessageResource;
use App\Models\Message;
use App\Models\MsgType;
use Illuminate\Support\Str;
use App\Libs\Actions\MessageAction;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Libs\RepositoryInterfaces\MessageRepositoryInterface;

class MessageRepository implements MessageRepositoryInterface
{
    /**
     * @var MessageAction
     */
    private MessageAction $action;

    /**
     * @param MessageAction $action
     */
    public function __construct(MessageAction $action)
    {
        $this->action = $action;
    }

    public function index()
    {
        return Message::where('user_id', auth()->guard('user')->user()->id)->get();
    }

    public function create($username)
    {
        try {
			return $this->getUser($username);
		} catch (ModelNotFoundException $e) {
			return abort(404);
		}
    }

    public function store($username,  $request)
    {
        $user = $this->getUser($username);
        $type = $this->msgTypes($request->input('type'));
        $message = Message::create([
            'user_id' => $user->id,
            'type_id' => $type,
            'content' => $request->input('message')
        ]);
        if ($request->hasfile('editedImage')) {
            $newFileName = Str::random(30);
            $relativePath = 'assets/img/msg/' . $newFileName;
            $request->file('editedImage')->move(public_path('assets/img/msg/'), $newFileName);
            $message->url = $relativePath;
            $message->save();
        }
        return $message;
    }

    public function destroy(string $id)
    {
        //
    }

	private function getUser($username)
    {
        $user = User::where('is_delete', '!=', 1)
            ->where('username', $username)
            ->firstOrFail();
        return $user;
    }

    private function msgTypes(int $int)
    {
        switch ($int) {
            case 1:
                $name = 'text';
                break;
            case 2:
                $name = 'image';
                break;
            case 3:
                $name = 'video';
                break;

            default:
                $name = 'text';
                break;
        }

        $type = MsgType::where('name', $name)->first();
        return $type->id;
    }
}
