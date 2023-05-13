<?php

namespace App\Http\Controllers\Api;

use App\Models\ChatMessage;
use App\Http\Requests\ChatMessageRequest;
use App\Http\Resources\ChatMessageResource;
use App\Http\Controllers\Controller;
use App\Events\NewChatMessageEvent;
use Illuminate\Http\Request;

class ChatMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = ChatMessage::latest()->limit(50)->get();

        return ChatMessageResource::collection($messages);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ChatMessageRequest $request)
    {
        $data = $request->validated();

        $data['body'] = substr($data['body'], 0, 255);
        $data['user_id'] = auth('sanctum')->user()->id;

        $message = ChatMessage::create($data);
        event(new NewChatMessageEvent($message));

        return new ChatMessageResource($message);
    }

    /**
     * Display the specified resource.
     */
    public function show(ChatMessage $chatMessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ChatMessageRequest $request, ChatMessage $chatMessage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ChatMessage $chatMessage)
    {
        //
    }
}
