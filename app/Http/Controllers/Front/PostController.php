<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Common\KeywordController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Front\LocationController;
use App\Models\Post;
use App\Models\Category;
use App\Models\News;
use App\Models\Tag;
use App\Models\PostTag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Exception;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    public function myPosts(){
        $title = "Danh sách tin";
        $menus = Category::where('parent_id', 0)->get();
        $keywordController = new KeywordController();
        $dataKeywordByCategory = $keywordController->dataKeywordByCategory();
        $posts = Post::where('user_id', auth()->user()->id)->orderByDesc('id')->paginate(8);
        $countPost = Post::where('user_id', auth()->user()->id)->count();
        return view('frontend.pages.posts.my_posts', compact('title', 'posts', 'countPost', 'menus', 'dataKeywordByCategory'));
    }

    public function create(){
        $title = "Đăng tin";
        $fiveMenus = Category::where('parent_id', 0)->take(5)->get();
        $customer = auth()->user();
        $categories = $fiveMenus->where('type', 1)->where('parent_id', 0);
        $realEstateTypes= Category::where('parent_id', '<', 0)->orWhere('parent_id', 1)->get();

        $tags = Tag::all();

        $keywordController = new KeywordController();
        $dataKeywordByCategory = $keywordController->dataKeywordByCategory();
        return view('frontend.pages.posts.crud.index', compact('title', 'customer', 'categories', 'tags', 'fiveMenus', 'dataKeywordByCategory', 'realEstateTypes'));
    }

    public function syncPostTag(Request $request, $name){

    }

    public function store(Request $request){
        try {
            // $rules = [
            //     'title' => 'required|string|min:30|max:100',
            //     'description' => 'required|string|min:30',
            //     'short_description' => 'required|string',
            //     'price' => 'required|numeric',
            //     'sub_price' => 'required|numeric',
            //     'location' => 'required|string',
            //     'area' => 'required|numeric',
            //     'images' => 'required',
            //     'floor' => 'required|integer',
            //     'bedroom' => 'required|integer',
            //     'toilet' => 'required|integer',
            //     'legal_documents' => 'required',
            //     'real_estate_type' => 'required',
            // ];
            // $validator = Validator::make($request->all(), $rules);
            // if ($validator->fails()) {
            //     return response()->json(['message' => $validator->errors()], 422);
            // }
            // user_id, province_id, district_id, ward_id, expired_at, created_at
            $user_id = Auth::user()->id;
            $data = $request->all();
            $data['created_at'] = Carbon::now();
            $data['expired_at'] = Carbon::now()->addMonth();
            $data['user_id'] = $user_id;
            $data['images'] = json_encode($request->images);
            $data['other_properties'] = json_encode($request->other_properties);
            foreach (['tags', '_token', 'location'] as $unset) {
                unset($data[$unset]);
            }
            Post::create($data);
            return Response::json(['message' => 'Đăng tin thành công!', 'data' => $data]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return Response::json(['error' => 'Đã xảy ra lỗi'.$e->getMessage()], 500);
        }
    }

    public function postDetails($post_title){
        try{
            $post = Post::where('title', trim($post_title) )->first();
            $title = $post->name;
            $countPostByUser = Post::where('user_id', $post->user->id)->count();
            $location = 'Chưa xác định';
            // if($post->province()->name !== null &&)
            // Get keywords according to each category of posts type = 1
            $keywordController = new KeywordController();
            $dataKeywordByCategory = $keywordController->dataKeywordByCategory();
            // Menu navbar
            $fiveMenus = Category::where('parent_id', 0)->take(5)->get();
            // Select option category search bar
            $categoriesPost = $fiveMenus->where('type', 1);
            // Real estate type according to category of this post current 
            $realEstateTypes = Category::where('parent_id', $post->category_id)->get();
            // LocationConTroller
            $locationController = new LocationController();
            // Province data and posts data for each province
            $dataPostsByProvince = $locationController->dataPostsByProvince($post->category_id, $post->real_estate_type);
            // Ward data related to this posts and posts data for each ward
            $dataPostsByWard = $locationController->dataPostsByWard($post->category_id,$post->district_id,  $post->real_estate_type);
            $firstEightWardData = $dataPostsByWard['first_eight_data'];
            $remainingWardData = $dataPostsByWard['remaining_data'];
            $allWarData = $dataPostsByWard['all_data'];
            $isCheckWardData = !empty($remainingWardData) ? true : false;
            // Posts related
            $realEstateForYou = Post::where('category_id', $post->category_id)->where('id', '!=', $post->id)->limit(8)->get();
            $postsViewed = $this->addToViewed($post);
            //  return $this->addToViewed($post);
            return view('frontend.pages.posts.details.index', compact('title', 'post', 'categoriesPost', 'firstEightWardData', 'isCheckWardData', 'realEstateForYou', 'fiveMenus', 'postsViewed', 'allWarData', 'dataPostsByProvince', 'dataKeywordByCategory'));
        }catch(Exception $e){
            toastr()->error('Lỗi', 'Có lỗi xảy ra');
        }
    }

    public function edit(Request $request, Post $post){
        $title = "Cập nhật " . $post->name;
        $categories = Category::where('type', 1)->where('parent_id', 0)->get();
        $tags = Tag::all();
        $user = auth()->user();
        return view('frontend.pages.posts.crud.index', compact('post', 'title', 'categories', 'tags', 'user'));
    }

    // Upadate post
    public function update(Request $request, Post $post){
        $rules = [
            "title" => 'required|min:50',
            "short_description" => 'required',
            "description" => 'required',
            "price" => 'required|numeric',
            "area" => 'required|numeric',
            "sub_price" => 'numeric',
            "floor" => 'required|numeric',
            "bedroom" => 'required|numeric',
            "toilet" => 'required|numeric',
            "location" => 'required',
            "categories" => 'required',
            "name_properties" => 'required',
            "value_properties" => 'required',
            // 'tags' => 'nullable'
        ];
    }

    public function destroy(Post $post){
        $categories = $post->categories()->get();
        $tags = $post->tags()->get();

        // Xóa tag
        $post->tags()->detach();
        // Xóa ảnh 
        if(!empty($post['images'])){
            $images = json_decode($post['images']);
            foreach($images as $image){
                $path = public_path('uploads/' . $image);   
                if (File::exists($path)) {
                    File::delete($path); 
                }
            }            
        }
        // Xóa bài đăng 
        $post->delete();
        return Response::json(['message' => 'Bài viết đã được xóa thành công!']);
    }

    // Posts by one user 
    public function userPosts($userID){  
        $posts = Post::where('user_id', $userID)->orderByDesc('created_at')->paginate(8);
        $user = User::findOrFail($userID);
        $title = 'Danh sách bài đăng từ '. $user['name'];
        return view('frontend.pages.posts.posts_by_user', compact('posts', 'user', 'title'));
    }

    // Add favorite post
    public function addPostToFavorite(Request $request){
        try{
            $post_id = $request->post_id;
            $user = Auth::user();
            $hasFavoritePost = $user->favoritePosts()->where('post_id', $post_id)->exists();
            $message = 'Tin đã được yêu thích';
            if (!$hasFavoritePost) {
                $user->favoritePosts()->attach($post_id);
                $message = 'Đã thêm vào yêu thích';
            }
            return Response::json(['message' => $message], 200);
        }catch(Exception $e){
            Log::error($e->getMessage());
            return Response::json(['message' => 'Đã xảy ra lỗi '.$e->getMessage()], 500);
        }
    }

    protected function addToViewed($post){
        try{
            $postsViewed = Post::inRandomOrder()->limit(8)->get();
            if (Auth::check()) {
                $user = Auth::user();
                $postsViewed = $user->viewedPosts()->where('viewable_id', '!=', $post->id)->get();
                $user->viewedPosts()->syncWithoutDetaching($post->id);
            }
            return $postsViewed;
        }catch(Exception $e){
            return Response::json(['message' => 'Đã xảy ra lỗi '.$e->getMessage()]);
        }
    }

    // News
    public function listNews(){
        $title = "Tin tức";
        $fiveMenus = Category::where('parent_id', 0)->take(5)->get();
        $keywordController = new KeywordController();
        $dataKeywordByCategory = $keywordController->dataKeywordByCategory();
        return view('frontend.pages.news.index', compact('title', 'fiveMenus', 'dataKeywordByCategory'));
    }

    public function detailNews(Request $request, $news_title){
        $fiveMenus = Category::where('parent_id', 0)->take(5)->get();
        $keywordController = new KeywordController();
        $dataKeywordByCategory = $keywordController->dataKeywordByCategory();

        $news = News::where('title', $news_title)->first();
        $title = $news->title;
        // dd($news->content);
        $this->addToViewed($news);
        return view('frontend.pages.news.show', compact('title', 'fiveMenus', 'dataKeywordByCategory', 'news'));
    }
}
 