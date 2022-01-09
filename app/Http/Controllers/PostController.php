<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Traits\ApiResponser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    use ApiResponser;

    public function store(Request $request): JsonResponse
    {
        $customAttributes = ['title' => 'Post Title', 'website_id' => 'Website', ];
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'website_id' => 'required|integer',
        ], [], $customAttributes);
        if ($validator->fails()) {
            $msg = "Data submit error";
            return $this->error(200, $msg, "Error ", $validator->errors()->toArray(), 4220);
        }

        $menu = new Post();
        $menu->title = request('title');
        $menu->content = request('content');
        $menu->slug = request('slug');
        $menu->website_id = request('website_id');
        $menu->save();
        return $this->simpleSuccess('Create post successful', "SUCCESS", 'CREATE POST', 200, 2000);
    }
}
