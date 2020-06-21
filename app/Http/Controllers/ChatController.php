<?php

namespace App\Http\Controllers; use App\User;
use App\Channel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request; 
use GetStream\StreamChat\Client as StreamClient;

class ChatController extends Controller
{
    protected $client;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->client =  new StreamClient(
            getenv("STREAM_API_KEY"),
            getenv("STREAM_API_SECRET"),
            null,
            null,
            9 // timeout
        );
    }

    /**
     * Generate Token from Stream Chat
     */
    public function generateToken(Request $request)
    {
        return response()->json([
            'token' => $this->client->createToken($request->input('username'))
        ], 200);
    }

    public function getUsers(Request $request)
    {
        $follows = User::find($request->userId)->following;
        $users = [];
        foreach($follows as $user){
            array_push($users, User::find($user->id));
        }
        return response()->json([
            'users' => $users
        ], 200);
    }
}
