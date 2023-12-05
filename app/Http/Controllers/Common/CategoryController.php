<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CategoryController extends Controller
{
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
