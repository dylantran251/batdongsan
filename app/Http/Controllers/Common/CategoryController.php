<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{

    // ====================================== admin =========================================
    public function index(Request $request){
        $limit = $request->limit ?? 40;
        $categories = Category::where('parent_id', 0)->with('_children')->paginate($limit);
        $title = 'Danh sách danh mục';
        return view('admin.pages.categories.index', compact('title', 'categories'));
    }

    public function getItems(Request $request){
        try{
            $categories = Category::where('parent_id', 0)->with('_children')->get();
            return Response::json(['data' => $categories], 200);
        }catch(Exception $e){
            return Response::json(['message' => 'Đã xảy ra lỗi '.$e->getMessage()], 500);
        }
    }

    public function getItem(Request $request, Category $category){
        try{
            return Response::json(['data' => $category], 200);
        }catch(Exception $e){
            return Response::json(['mesage' => 'Đã cảy ra lỗi '.$e->getMessage()], 500);
        }
    }

    public function store(Request $request){
        try{
            $data = $request->all();
            $validator = Validator::make($data, [
                'name' => 'required|min:8|max:255',
            ]);
            if ($validator->fails()) {
                return Response::json(['errors' => $validator->errors()], 422);
            }
            Category::create($data);
            return Response::json(['success' => 'Đã thêm '. $data['name'] ], 200);
        }catch(Exception $e){
            return Response::json(['error' => 'Đã xảy ra lỗi '.$e->getMessage()]);
        }
    }

    public function update(Request $request, Category $category){
        try{
            $data = $request->all();
            $validator = Validator::make($data, [
                'name' => 'required|min:8|max:255',
            ]);
            if ($validator->fails()) {
                return Response::json(['errors' => $validator->errors()], 422);
            }

            $data = $request->all();
            $category->update($data);
            return Response::json(['success' => 'Đã cập nhật danh mục này' ], 200);
        }catch(Exception $e){
            return Response::json(['error' => 'Đã xảy ra lỗi '.$e->getMessage()]);
        }
    }

    public function destroy(Category $category){
        try{
            $category->delete();
            return Response::json(['message' => 'Đã xóa thành công danh mục này'], 200);
        }catch(Exception $e){
            return Response::json(['error' => 'Đã xảy ra lỗi '.$e->getMessage()], 500);
        }
    }

    //===================================== common ===========================================
    public function getRealEstateTypesByCategory(Request $request){
        try{
            $category_id = $request->category_id;
            $realEsateTypes = Category::where('type', 1)->where('parent_id', $category_id)->orWhere('parent_id', -1)->get();
            return Response::json(['data' => $realEsateTypes], 200);
        }catch(Exception $e){
            return Response::json(['message' => 'Đã xẩy ra lỗi '. $e->getMessage()], 500);
        }
    }

    public function checkShortenedNameCategory($name){
        $category_name = '';
        if($name === 'Bán'){
            $category_name = 'Nhà đất chính chủ';
        }elseif($name === 'Môi giới'){
            $category_name = 'Nhà đất trung gian';
        }elseif($name === 'Cho thuê'){
            $category_name = 'Nhà đất cho thuê';
        }
        return $category_name;
    }
}
