<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReplyResource;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Model\Reply;
use App\Model\Question;
use App\Notifications\NewReplyNotification;


class ReplyController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => ['login','register']]);
        $this->middleware('jwt', ['except' => ['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Question $question)
    {
        return ReplyResource::collection($question->replies);
        //return Reply::latest()->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Question $question, Request $request)
    {
        $reply = $question->replies()->create($request->all()) ;
        $user = $question->user;
        if($reply->user_id !== $question->user_id){
            $user->notify(new NewReplyNotification($reply));
        }
        
        return Response(['reply'=> new ReplyResource($reply)], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question, Reply $reply)
    {
        return new ReplyResource($reply);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        // $reply->update($request->all());
        $reply = $question->replies()->update($request->all()) ;                
        return response('update', 202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question, Reply $reply)
    {
        $reply->delete() ;
        return response(null, 204);
    }
}
