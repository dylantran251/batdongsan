<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Common\KeywordController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Front\LocationController;
use App\Models\Post;
use App\Models\Category;
use App\Models\Keyword;
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
        $menus = Category::where('parent_id', 0)->get();
        $customer = auth()->user();
        $categories = $menus->where('type', 1)->where('parent_id', 0);
        $realEstateTypes= Category::where('parent_id', '<', 0)->orWhere('parent_id', 1)->get();

        $tags = Tag::all();

        $keywordController = new KeywordController();
        $dataKeywordByCategory = $keywordController->dataKeywordByCategory();
        return view('frontend.pages.posts.crud.index', compact('title', 'customer', 'categories', 'tags', 'menus', 'dataKeywordByCategory', 'realEstateTypes'));
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
            $post = Post::where('type', 1)->where('title', trim($post_title) )->first();
            $title = $post->name;
            $countPostByUser = Post::where('type', 1)->where('user_id', $post->user->id)->count();
            $location = 'Chưa xác định';
            // if($post->province()->name !== null &&)
            // Get keywords according to each category of posts type = 1
            $keywordController = new KeywordController();
            $dataKeywordByCategory = $keywordController->dataKeywordByCategory();
            // Menu navbar
            $menus = Category::where('parent_id', 0)->get();
            // Select option category search bar
            $categoryPosts = $menus->where('type', 1);
            // Real estate type according to category of this post current 
            $realEstateTypes = Category::where('parent_id' , '<', 0)->orWhere('parent_id', $post->category_id)->get();
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
            $realEstateForYou = Post::where('type', 1)->where('category_id', $post->category_id)->where('id', '!=', $post->id)->limit(8)->get();
            $postsViewed = Post::where('type', 1)->inRandomOrder()->limit(8)->get();
            $this->addToViewed($post);
            return view('frontend.pages.posts.details.index', compact('post', 'countPostByUser', 'title', 'allWarData', 'firstEightWardData', 'dataPostsByProvince', 'menus', 'categoryPosts', 'dataKeywordByCategory', 'realEstateForYou', 'realEstateTypes', 'isCheckWardData', 'postsViewed'));
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
        if(empty($request->input('oldImages'))){
            $rules['newImages'] = 'required'; 
        }
        elseif(empty($request->file('newImages'))){
            $rules['oldImages'] = 'required' ;
        }
        else{
            $rules['oldImages'] = 'required' ;
            $rules['newImages'] = 'required'; 
        }
        $messages = [
            "required" => ":attributes không được để trống",
            "numeric" => ":attributes phải là số.",
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Lấy ra mảng images của post và request mảng images của post từ input hidden
        // So sánh hai mảng lấy ra những path ảnh không trùng lặp và xóa nó 
        try{
            $imagesInit = $post->getImages();
            $oldImages = $request->input('oldImages');
            $newImages = [];
            if(!empty($imagesInit)){
                $diffImages = array_diff($imagesInit, $oldImages);
                if(!empty($diffImages)){
                    foreach($diffImages as $image){
                        $path = public_path('images/posts/' . $image);   
                        if (File::exists($path)) {
                            File::delete($path); 
                        }
                    }   
                }
            }
            // Nếu tồn tại $request này là user đã tải thêm ảnh mới và gộp mảng images mới này với images cũ  
            if($request->hasFile('newImages')){
                $uploadImages = $request->file('newImages');
                foreach($uploadImages as $image){
                    $path = Str::uuid() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('/images/posts') , $path);
                    $newImages[] = $path ;
                }
            }
            // dd($oldImages, $newImages);
            $mergerImages = array_merge($oldImages, $newImages);
            $jsonImages = json_encode($mergerImages);
    
            $ortherProperties = [];
            for($i = 0; $i < count($request->input('value_properties')); $i++){
                $ortherProperties[] = [
                    'name' => $request->input('name_properties')[$i],
                    'value' => $request->input('value_properties')[$i]
                ];
            }
            $jsonOtherProperties = json_encode($ortherProperties, JSON_UNESCAPED_UNICODE);
            
            $post->update([
                "title" => $request->input('title'),
                "type" => 1,
                "status" => 1,
                "short_description" => $request->input('short_description'),
                "description" => $request->input('description'),
                "price" => $request->input('price'),
                "area" => $request->input('area'),
                "sub_price" => $request->input('sub_price'),
                "floors" => $request->input('floor'),
                "bedroom" => $request->input('bedroom'),
                "toilet" => $request->input('toilet'),
                "location" => $request->input('location'),
                "other_properties" => $jsonOtherProperties,
                "images" => $jsonImages,
                'real_estate_type' => 1,
                'updated_at' => Carbon::now(),
            ]);
    
            // Cập nhật lại danh mục 
            $categories = $post->categories()->get();
            $categoriesID = [];
            foreach($categories as $category) $categoriesID[] = $category['id'];

    
            $tags = $post->tags()->get();
            $tagsID = [];
            foreach($tags as $tag) $tagsID[] = $tag['id'];
            if($request->input('tags')){
                $diffTagsID = array_diff($tagsID, $request->input('tags'));
                foreach($diffTagsID as $tagID){
                    $PostTag = PostTag::where('post_id', $post['id'])->where('tag_id', $tagID)->first();
                    $PostTag->delete();
                }
                foreach($request->input('tags') as $tagID){
                    $PostTag = PostTag::where('post_id', $post['id'])->where('category_id', $tagID)->first();
                    if($PostTag == null){
                        PostTag::create([
                            'post_id' => $post['id'],
                            'tag_id' => $$tagID
                        ]);
                    }
                }
            }
            return Response::json(['message' => 'Bài đăng đã được cập nhật!']);
        }catch(Exception $exception){
            return Response::json(['message'=> $exception->getMessage()], 500);
        }
    }

    public function destroy(Post $post){
        $categories = $post->categories()->get();
        $tags = $post->tags()->get();

        // Xóa tag
        if($tags){
            foreach($tags as $tag){
                $PostTag = PostTag::where('post_id', $post['id'])->where('tag_id', $tag['id'])->first();
                if($PostTag){
                    $PostTag->delete();
                }
            }            
        }
        // Xóa ảnh 
        if(!empty($post['images'])){
            $images = json_decode($post['images']);
            foreach($images as $image){
                $path = public_path('images/posts/' . $image);   
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
        if (Auth::check()) {
            $user = Auth::user();
            $hasViewedPost = $user->viewedPosts()->where('post_id', $post->id)->exists();
            $postsViewed = $user->viewedPosts()->where('post_id', '!=', $post->id)->get();
            if (!$hasViewedPost) {
                $user->viewedPosts()->attach($post->id);
            }
        }
    }

    // News
    public function listNews(){
        $title = "Tin tức";
        $menus = Category::where('parent_id', 0)->get();
        $keywordController = new KeywordController();
        $dataKeywordByCategory = $keywordController->dataKeywordByCategory();
        return view('frontend.pages.news.index', compact('title', 'menus', 'dataKeywordByCategory'));
    }

    public function detailNews(Request $request, $news_title){
        $menus = Category::where('parent_id', 0)->get();
        $keywordController = new KeywordController();
        $dataKeywordByCategory = $keywordController->dataKeywordByCategory();

        $news = Post::where('type', 0)->where('title', $news_title)->first();
        $title = $news->title;

        $this->addToViewed($news);
        return view('frontend.pages.news.show', compact('title', 'menus', 'dataKeywordByCategory', 'news'));
    }
}
 