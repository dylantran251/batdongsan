<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use App\Models\News;
use App\Models\Post;
use App\Models\Tag;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class NewsController extends Controller
{
    public function index(){
        $title = "Danh sách tin tức";
        return view('admin.pages.news.index', compact('title'));
    }

    public function getItems(Request $request){
        try{
            $limit = $request->limit ?? 40;
            // $news = News::with('author')->orderByDesc('created_at')->paginate($limit);
           
            $news = News::with('author')->orderByDesc('created_at')->paginate($limit);

             return Response::json(['data' => $news], 200);
        }catch(Exception $e){
            Response::json(['error' => 'Đã xảy ra lỗi '.$e->getMessage()], 500);
        }
    }

    public function create()
    {
        $title = 'Tạo tin tức';
        $categories = Category::where('parent_id', 0)->get();
        return view('admin.pages.news.create', compact('title', 'categories'));
    }

    public function syncTagsNews($news, $tagNames)
    {
        try {
            $tagIds = [];
            if (!empty($tagNames)) {
                foreach ($tagNames as $tagName) {
                    $tag = Tag::firstOrCreate(['name' => $tagName]);
                    $tagIds[] = $tag->id;
                }
                $news->tags()->syncWithoutDetaching($tagIds);
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            throw $e; // Re-throw the exception to propagate it up
        }
    }
    

    public function store(Request $request){
        try{
            $data = $request->all();
            $data['user_id'] = Auth::user()->id;
            $data['created_at'] = Carbon::now();
            if(isset($data['tags'])){
                unset($data['tags']);
            }
            $news = News::create($data);
            $this->syncTagsNews($news, $request->tags);
            return Response::json([
                'message' => 'Đã tạo mới tin tức', 
                'url' => route('admin.news.index')
            ], 200);
        }catch(Exception $e){
            Log::error($e->getMessage());
            return Response::json(['error' => $e->getMessage()], 500);
        }
    }

    public function edit(News $news){
        try{
            $title = "Cập nhật tin tức";
            $categories = Category::where('parent_id', 0)->get();
            $tags = $news->tags()->get();
            return view('admin.pages.news.create', compact('news', 'title', 'categories', 'tags'));
        }catch(Exception $e){
            return Response::json(['error' => 'Đã xảy ra lỗi '.$e->getMessage()], 500);
        }
    }

    public function update(Request $request, News $news){
        try{
            $data = $request->all();
            $data['updated_at'] = Carbon::now();
            $news->update($data);
            $this->syncTagsNews($news, $request->tags);
            return Response::json([
                'message' => 'Đã cập nhật tin tức', 
                'url' => route('admin.news.index')
            ], 200);
        }catch(Exception $e){
            return Response::json(['error' => 'Đã xảy ra lỗi '.$e->getMessage()], 500);
        }
    }

    public function destroy(News $news){
        try{
            if (File::exists(public_path('uploads/'.$news->avatar))) {
                File::delete(public_path('uploads/'.$news->avatar));
            }
            $news->tags()->detach();
            $news->delete();
            return Response::json(['message' => 'Đã xóa tin tức', ], 200);
        }catch(Exception $e){
            Log::error($e->getMessage());
            return Response::json(['error' => 'Đã xảy ra lỗi '.$e->getMessage()], 500);
        }
    }
}
