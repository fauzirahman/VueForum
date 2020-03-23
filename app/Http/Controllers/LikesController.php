<?php

namespace App\Http\Controllers;

use App\Model\Likes;
use App\Model\Reply;
use App\Events\LikeEvents;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => ['login','register']]);
        $this->middleware('jwt');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function likeIt(Reply $reply )
    {
        $reply->like()->create([
            'user_id'=>auth()->id(),          
            ]);

            broadcast(new LikeEvents($reply->id, 1))->toOthers();
    }

    public function unLikeIt(Reply $reply)
    {
        $reply->like()->where('user_id',auth()->id())->first()->delete();
        broadcast(new LikeEvents($reply->id, 0))->toOthers();
    }


}
