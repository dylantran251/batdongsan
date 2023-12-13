<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class TagController extends Controller
{
    public function dataTagByCategory(){
        $categories = Category::where('type', 1)->where('parent_id', 0)->get();
        $data = [];
        foreach($categories as $category){
            $tags = $category->posts()->with('tags')->get()
            ->flatMap(function ($post) {
                return $post->tags;
            });
            $unique_tags = $tags->unique('name');
            $data[] = [
                'category_id' => $category->id,
                'category_name' => $category->name,
                'keyword' => $unique_tags,
            ];
        }
        return $data;
    }

    public function allTags(){
        try{
            $tags = Tag::all();
            return Response::json(['data' => $tags], 200);
        }catch(Exception $e){
            return Response::json(['message' => "Đã xảy ra lỗi ".$e->getMessage()], 500);
        }
    }
}
