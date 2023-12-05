<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Exception;

class TagController extends Controller
{
    public function index(Request $request)
    {
        return view('');
    }
    
    public function store(Request $request): JsonResponse
    {
        try {
            $category = Tag::create($request->all());
            return Response::json($category);
        }catch (Exception $exception){
            return Response::json(['message'=> $exception->getMessage()], 500);
        }
    }

    public function update(Request $request, Tag $item): JsonResponse
    {
        try {
            $item->update($request->all());
            return Response::json($item);
        }catch (Exception $exception){
            return Response::json(['message'=> $exception->getMessage()], 500);
        }
    }

    public function destroy(Tag $item): JsonResponse
    {
        try {
            $item->delete();
            return Response::json();
        }catch (Exception $exception){
            return Response::json(['message'=> $exception->getMessage()], 500);
        }
    }

    public function getItems(Request $request): JsonResponse
    {
        try {
            // $q = $request->q ?? null;
            // $items = Tag::select();
            // if($q)
            // {
            //     $items->where('name', 'LIKE', '%'.$q.'%');
            // }
            // $items = $items->get();
            $tags = Tag::all();
            return Response::json(['items'=>$tags]);
        }catch (Exception $exception){
            return Response::json(['message'=> $exception->getMessage()], 500);
        }
    }

    public function getItem(Tag $item): JsonResponse
    {
        try {
            return Response::json($item);
        }catch (Exception $exception){
            return Response::json(['message'=> $exception->getMessage()], 500);
        }
    }
}
