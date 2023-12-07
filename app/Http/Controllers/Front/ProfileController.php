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
            'avatar' => 'nullable|image|mimes:png,jpg,svg,jpeg|max:5096',
            'name' => 'required',
            'phone' => 'required'
        ]);
        $user = User::findOrFail($id);
        if($request->hasFile('avatar')){
            $imagePath = public_path('uploads/' . $user->avatar);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
            $path = time() . '.' . $request->avatar->getClientOriginalExtension();
            $request->avatar->move(public_path('/uploads') , $path);
            $user->update([
                'name' => $request->name,
                'phone' => $request->input('phone'),
                'avatar' => $path
            ]);
        }
        $user->update([
            'name' => $request->name,
            'phone' => $request->input('phone'),
        ]);
        toastr()->success('Thông tin đã được cập nhật', 'Thành công');
        return back();
    }
}
