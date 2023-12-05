<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        return view('');
    }
    public function store(Request $request): JsonResponse
    {
        try {
            $category = Category::create($request->all());
            return Response::json($category);
        }catch (Exception $exception){
            return Response::json(['message'=> $exception->getMessage()], 500);
        }
    }

    public function update(Request $request, Category $category): JsonResponse
    {
        try {
            $category->update($request->all());
            return Response::json($category);
        }catch (Exception $exception){
            return Response::json(['message'=> $exception->getMessage()], 500);
        }
    }

    public function destroy(Category $category): JsonResponse
    {
        try {
            $category->delete();
            return Response::json([]);
        }catch (Exception $exception){
            return Response::json(['message'=> $exception->getMessage()], 500);
        }
    }
  
    // public function getRealEstateTypes(Request $request): JsonResponse
    // {
    //     try {
    //         $q = $request->q ?? null;
    //         $
    //         $categories = Category::select();
    //         if($q)
    //         {
    //             $categories->where('name', 'LIKE', '%'.$q.'%')->where('parent_id', '!=', 0);
    //         }
    //         $categories = $categories->get();
    //         $categories = Category::all();
    //         return Response::json(['items'=>$categories]);
    //     }catch (Exception $exception){
    //         return Response::json(['message'=> $exception->getMessage()], 500);
    //     }
    // }

    // public function getRealEstateTypes(Request $request): JsonResponse
    // {
    //     try {
    //         $q = $request->q ?? null;
    //         $categories = Category::select();
    //         $category = $request->get('category') ?? 1;
    //         if($q)
    //         {
    //             $categories->where('name', 'LIKE', '%'.$q.'%')->where('parent_id', $category);
    //         }
    //         $categories = $categories->get();
    //         $categories = Category::all();
    //         return Response::json(['items'=>$categories]);
    //     }catch (Exception $exception){
    //         return Response::json(['message'=> $exception->getMessage()], 500);
    //     }
    // }

    public function getRealEstateTypes(Request $request): JsonResponse
    {
        try {
            $category = $request->get('category') ?? 1;
            $realEstateTypes = Category::where('type', 1)->where('parent_id', $category)->get();
            return Response::json(['data'=>$realEstateTypes]);
        }catch (Exception $exception){
            return Response::json(['message'=> $exception->getMessage()], 500);
        }
    }

    public function getItem(Category $category): JsonResponse
    {
        try {
            return Response::json($category);
        }catch (Exception $exception){
            return Response::json(['message'=> $exception->getMessage()], 500);
        }
    }

    public function getItems(Request $request){
        try{
            $type = $request->get('type') ?? 1;
            $realEstateTypes = Category::where('parent_id', '!=', 0)->where('type', $type)->get();
            return Response::json(['items' => $realEstateTypes], 200);
        }catch (Exception $exception){
            return Response::json(['message' => $exception->getMessage()], 500);
        }
    }
}
