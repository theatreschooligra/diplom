<?php

namespace App\Http\Controllers\Api;

use App\Group;
use App\Http\Controllers\Controller;
use App\Http\Filters\GroupNameFilter;
use App\Http\Resources\GroupResource;
use Illuminate\Http\Response;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\Filter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $group = QueryBuilder::for(Group::class)
            ->allowedFilters([
                Filter::custom('name', GroupNameFilter::class),
            ]);

        $user = Auth::user();

        if ($user->role_id == 2)
        {
            $group = $group->whereHas('teachers', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            });
        }

        return GroupResource::collection($group->get());
    }

    /**
     * Display the specified resource.
     *
     * @param Group $group
     * @return GroupResource
     */
    public function show(Group $group)
    {
        return new GroupResource($group);
    }
}
