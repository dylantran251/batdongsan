<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Common\KeywordController;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\File;


class ProfileController extends Controller
{
    public function index(){
        $title = "Hồ sơ cá nhân";
        $menus = Category::where('parent_id', 0)->get();
        $keywordController = new KeywordController();
        $dataKeywordByCategory = $keywordController->dataKeywordByCategory();
        $customer = auth()->user();
        return view('frontend.pages.profile.index', compact('title', 'customer', 'menus', 'dataKeywordByCategory'));
    }

    public function update(Request $request,$id){
        $request->validate([
            'image' => 'nullable|image|mimes:png,jpg,svg,jpeg|max:5096',
            'name' => 'required',
            // 'email' => 'unique:users,email|required|email',
            'phone-number' => 'required'
        ]);
        $customer = User::findOrFail($id);
        if($request->hasFile('image')){
            $imagePath = public_path('uploads/' . $customer->image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
            $path = time() . '.' . $request->image->getClientOriginalExtension();
            $request->file('image')->move(public_path('/uploads') , $path);
            $customer->update([
                'name' => $request->name,
                'phone' => $request->input('phone-number'),
                'avatar' => $path
            ]);
        }
        $customer->update([
            'name' => $request->name,
            'phone' => $request->input('phone-number'),
        ]);
        return back();
    }
}
