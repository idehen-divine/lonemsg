<?php

namespace App\Repository;

use App\Models\User;
use App\Models\Message;
use App\Models\MsgType;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Interfaces\MessageRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MessageRepository implements MessageRepositoryInterface
{
    public function index(string $username = null)
    {
        $id = auth()->guard('user')->user()->id;
        return Message::where('user_id', $id)->get();
    }

    public function show($username)
    {
        try {
            $user = $this->getUser($username);
            return $user->username;
        } catch (ModelNotFoundException $th) {
            abort('404');
        }
    }

    public function store($username, $request)
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
            $request->file('editedImage')->move(public_path('assets/img/msg'), $newFileName);
            $message->url = $relativePath;
            $message->save();
        }
        return $message;
    }

    public function destroy(string $id)
    {
        return Message::where('user_id', $id)->delete();
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

    private function getUser($username)
    {
        $user = User::where('is_delete', '!=', 1)
            ->where('username', $username)
            ->firstOrFail();
        return $user;
    }
}
