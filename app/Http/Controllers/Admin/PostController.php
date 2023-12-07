<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Stmt\Catch_;

class PostController extends Controller
{
    public function listPosts(Request $request): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $title = "Danh sách tin đăng";
        $type = 'posts';
        return view('admin.pages.posts.index', compact('title', 'type'));
    }

    public function listNews(){
        $title = "Danh sách tin tức";
        $type = 'news';
        return view('admin.pages.posts.index', compact('title', 'type'));
    }

    public function getItems(Request $request): JsonResponse
    {
        try {
            $type = $request->get('type') ?? 1;
            $limit = $request->get('limit') ?? 40;
            $posts = Post::with('user')->where('type', $type)->orderByDesc('created_at')->paginate($limit);
            return Response::json($posts, 200);
        } catch (Exception $exception) {
            // Log::error($exception->getMessage());
            return Response::json(['message' => $exception->getMessage()], 500);
        }
    }


    public function getItem(Post $post): JsonResponse
    {
        try {
            return Response::json($post);
        }
        catch (Exception $exception)
        {
            return Response::json(['message'=> $exception->getMessage()], 500);
        }
    }

    // Return view createPP
    public function createNews()
    {
        $title = 'Tạo tin tức';
        $type = 'news';
        $categories = Category::where('type', 0)->where('parent_id', 0)->get();
        return view('admin.pages.posts.form.index', compact('title', 'type', 'categories'));
    }

    public function createPosts(){
        $title = 'Tạo bài đăng';
        $type = 'posts';
        $realEstateTypes = Category::where('parent_id', '<', 0)->orWhere('parent_id', 1)->where('type', 1)->get();
        $categories = Category::where('type', 1)->where('parent_id', 0)->get();
        return view('admin.pages.posts.form.index', compact('title', 'type', 'categories', 'realEstateTypes'));
    }

    public function edit(Request $request, Post $post){
        $type = $request->type ?? 1;
        $categories = Category::where('type', $type)->where('parent_id', 0)->get();
        if($type == 1){
            return view('admin.pages.posts.create',compact('post', 'categories'));
        }
        return view('admin.pages.posts.create',compact('post', 'categories'));    
    }

    // public function syncTagsPost(Post $post, $names): void
    // {
    //     $tagIds = [];
    //     $names = array_map('strtolower', $names);
    //     $tags = Tag::whereIn('name', $names)->get();
    //     foreach ($names as $name) {
    //         if (is_null($tags->where('name', $name)->first())) {
    //             $tag = Category::create(['name' => $name]);
    //             $tagIds[] = $tag->id;
    //         }
    //     }
    //     if (count($tagIds) > 0) {
    //         $post->tags()->sync($tagIds);
    //     }
    // }

    public function store(Request $request): JsonResponse
    {
        try {
            $userId = auth()->user()->id;
            $data = $request->all();
            $data['user_id'] = $userId;
            $data['images'] = json_encode($data['images'], JSON_UNESCAPED_UNICODE);
            $data['created_at'] = Carbon::now();
            // foreach (['tags', 'categories'] as $unset) {
            //     unset($data[$unset]);
            // }
            $post = Post::create($data);
            // $this->syncCategoriesPost($post, $request->categories);
            // $this->syncTagsPost($post, $request->tags);
            return Response::json([
                'message' => 'Tin đăng đã được tạo thành công!',
                'data' => $post, 
                'updateUrl'=> route('admin.posts.update', $post)
            ]);
        } catch (Exception $exception) {
            Log::error($exception);
            return Response::json(['message' => $exception->getMessage()], 500);
        }
    }
    public function update(Post $post, Request $request): JsonResponse
    {
        try {
            $data = $request->all();
            $data['images'] = json_encode($data['images'], JSON_UNESCAPED_UNICODE);
            // foreach (['tags', 'categories'] as $unset) {
            //     unset($data[$unset]);
            // }
            $post->update($data);
            // $this->syncCategoriesPost($post, $request->categories);
            // $this->syncTagsPost($post, $request->tags);
            return Response::json([
                'message' => 'Tin đăng đã được cập nhật thành công',
                'data' => $post, 
            ]);
        } catch (Exception $exception) {
            Log::error($exception);
            return Response::json(['message' => $exception->getMessage()], 500);
        }
    }

    public function destroy(Post $post)
    {
        try {
            foreach($post->getImages() as $image){
                $imagePath = public_path('uploads/' . $image);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }
            $post->delete();
            return Response::json(['message' => 'Bài viết đã được xóa thành công']);
        } catch (Exception $exception) {
            return \response()->json(['message' => $exception->getMessage()], 500);
        }
    }
}
