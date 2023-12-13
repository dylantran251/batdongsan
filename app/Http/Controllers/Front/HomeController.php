<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Common\KeywordController;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Location;
use App\Models\News;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;
use LDAP\Result;

class HomeController extends Controller
{
    public function index(){
        $title = 'Tin nhà đất chính chủ';

        $menus = Category::where('parent_id', 0)->get();
        $categoryPosts  = $menus->where('type', 1);
        $realEstateTypes = Category::where('parent_id', 1)->orWhere('parent_id', '<' , 0)->where('type', 1)->get();
        $defaulCategory = $menus->first();

        $data = [];

        $keywordController = new KeywordController();
        $dataKeywordByCategory = $keywordController->dataKeywordByCategory();

        // Get posts is news
        $news = News::orderByDesc('created_at')->get();
        $firstNews = $news->first();
        $nextNews = $news->skip(1)->take(3);
        foreach($categoryPosts as $category){
            $posts = $category->posts()->orderByDesc('created_at')->get();
            $postsCount = $posts->count();
            $sliderPosts = [];
            $listPosts = [];
            if($postsCount>13){
                $sliderPosts = $posts->take(8);
                $listPosts = $posts->skip(8)->take(5);
            }else if($postsCount>8 && $postsCount<13){
                $sliderPosts = $posts->take(8);
                $listPosts = $posts->skip(8)->take(13-$postsCount);
            }
            $data[] = [
                'category' => $category,
                'sliderPosts' => $sliderPosts,
                'listPosts' => $listPosts,
            ];
        }
        return view('frontend.pages.home.index', compact('data', 'nextNews', 'firstNews','title', 'realEstateTypes', 'defaulCategory', 'menus', 'categoryPosts', 'dataKeywordByCategory'));
    }

    public function loadMorePosts(Request $request){
        try{
            $category_id = $request->get('category_id');
            $posts = Post::where('category_id', $category_id)->orderByDesc('id')->get();
            $count_posts = $posts->count();
            if($count_posts > 13){
                $posts = $posts->skip(13)->take(5);
                return view('frontend.pages.home.components.card_post', compact('posts'));
            }else{
                return Response::json(['message' => 'Dữ liệu không đủ hiển thị thêm!']);
            }
        }catch(Exception $e){
            return Response::json(['message' => 'Đã xảy ra lỗi '. $e->getMessage()], 500);
        }

    }

    // public function 

}
