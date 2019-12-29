<?php

namespace App\Http\Controllers\Admin;

use App\Http\Resources\TagResource;
use App\Models\Tag;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagsController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function all(): JsonResponse
    {
        return response()->json(TagResource::collection(Tag::all()));
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $tag = Tag::create($request->only('name'));

        return response()->json(new TagResource($tag));
    }
}
