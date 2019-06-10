<?php

namespace App\Http\Controllers\Api;

use App\Chat;
use App\Http\Filters\UserChatFilter;
use App\Http\Requests\ChatRequest;
use App\Http\Resources\ChatResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserChatResource;
use App\User;
use Spatie\QueryBuilder\Filter;
use Spatie\QueryBuilder\QueryBuilder;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $chats = QueryBuilder::for(Chat::class)
            ->allowedFilters([
                Filter::custom('user_id', UserChatFilter::class)
            ])
            ->orderBy('created_at')
        ;

        return ChatResource::collection($chats->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ChatRequest $request
     * @return ChatResource
     */
    public function store(ChatRequest $request)
    {
        return new ChatResource(Chat::create($request->validated()));
    }

    public function show(User $user)
    {
        $ids = Chat::where('from', $user->id)->pluck('to')->toArray();
        $ids = array_unique(array_merge($ids,Chat::where('to', $user->id)->pluck('from')->toArray()));

        return UserChatResource::collection(User::whereIn('id', $ids)->get());
    }
}
