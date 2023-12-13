<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class KeywordController extends Controller
{
    public function dataKeywordByCategory(){
        $categories = Category::where('type', 1)->where('parent_id', 0)->get();
        $data = [];
        foreach($categories as $category){
            $keywords = $category->posts()->with('keywords')->get()
            ->flatMap(function ($post) {
                return $post->keywords;
            });
            $unique_keywords = $keywords->unique('name')->sortByDesc('created_at');
            $data[] = [
                'category_id' => $category->id,
                'category_name' => $category->name,
                'keyword' => $unique_keywords,
            ];
        }
        return $data;
    }
}
