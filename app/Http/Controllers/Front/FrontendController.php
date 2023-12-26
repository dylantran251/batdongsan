<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Common\KeywordController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\District;
use App\Models\Keyword;
use Exception;
use Illuminate\Support\Facades\Response;
use App\Models\Province;
use App\Models\Tag;
use App\Models\Ward;

class FrontendController extends Controller
{
    public function loadPage(Request $request, $category_name){
        try{
            $keywordController = new KeywordController();
            $dataKeywordByCategory = $keywordController->dataKeywordByCategory();
            // get 12 province and posts by this
            
            // 
            $fiveMenus = Category::where('parent_id', 0)->take(5)->get();
            // 
            $categoriesPost = $fiveMenus->where('type', 1);
            $category = $fiveMenus->where('name', $category_name)->first();
            $realEstateTypes = Category::where('parent_id', '<', 0)->orWhere('parent_id', $category->id)->where('type', 1)->get();

            $locationController = new LocationController();
            $dataPostsByProvince = $locationController->dataPostsByProvince($category->id, null);
            // 
            $title = $category->name;
            $posts = $category->posts()->orderByDesc('vip')->orderByDesc('created_at');
            $postsCount = $posts->count();
            $posts = $posts->paginate(8);

            if($category->type === 0){
                return view('frontend.pages.news.index', compact('posts', 'title', 'postsCount', 'category', 'dataPostsByProvince', 'realEstateTypes', 'fiveMenus', 'dataKeywordByCategory', 'categoriesPost'));
            }
            return view('frontend.pages.page.index', compact('posts', 'title', 'postsCount', 'category', 'dataPostsByProvince', 'realEstateTypes', 'fiveMenus', 'dataKeywordByCategory', 'categoriesPost'));
        }catch(Exception $exception){
            return Response::json(['message' => $exception->getMessage()], 500);
        }        
    }

    public function searchPosts(Request $request, $category_name){
        $keywordController = new KeywordController();
        $dataKeywordByCategory = $keywordController->dataKeywordByCategory();
        $fiveMenus = Category::where('parent_id', 0)->take(5)->get();
        $categoriesPost = $fiveMenus->where('type', 1);
        $category = $fiveMenus->where('name', $category_name)->first();
        $data = $request->all();
        // 
        $locationController = new LocationController();
        $dataPostsByProvince = $locationController->dataPostsByProvince($category->id, null);

        $realEstateTypes = Category::where('parent_id', '<', 0)->orWhere('parent_id', $category->id)->where('type', 1)->get();
        $title = "Tìm kiếm ". $category_name;
        // Get posts by category
        $posts = $category->posts();
        // dd($posts->count());
        $check_request = false;

        if(isset($data['real-estate-type'])){
            $posts = $posts->whereIn('real_estate_type', $data['real-estate-type']);
            $check_request = true;
        }

        if(isset($data['location'])){
            
            // Cup location => province, dítrict, ward
            $location = explode(', ', $data['location']);
            $province_name = trim($location[count($location)-1]);
            $district_name = (count($location)-2 >= 0) ? trim($location[count($location)-2]) : '';
            $ward_name = (count($location)-3 >= 0) ? trim($location[count($location)-3]) : '';
            // Exists province, district and ward get posts by ward
           if($province_name !== "" && $district_name !== "" && $ward_name !== ""){
                $ward = Ward::where('full_name', $ward_name)->first();
                $posts = $posts->where('ward_id', $ward->id);
           }elseif($province_name !== "" && $district_name !== "" && $ward_name === ""){
                $district = District::where('full_name', $district_name)->first();
                $posts = $posts->where('district_id', $district->id);
           }elseif($province_name !== "" && $district_name === "" && $ward_name === ""){
                $province = Province::where('full_name', $province_name)->first();
                $posts = $posts->where('province_id', $province->id);
           }
           $check_request = true;
           
        }

        if(isset($data['price-range'])){
            list($min, $max) = $this->getParamsByRequest($data['price-range'], 'price');
            if($max === -1 && $min === -1)  $posts = $posts->where('price', 0);
            elseif($min === 0 && $max === 0) ;
            elseif($max === null) $posts = $posts->where('price', '>=', $min);
            else $posts = $posts->where('price', '>=', $min)->where('price', '<', $max);
            $check_request = true;
        }

        if(isset($data['area-range'])){
            list($min, $max) = $this->getParamsByRequest($data['area-range'], 'area');
            if($max === null) $posts = $posts->where('area', '>=', $min);
            elseif($min === 0 && $max === 0) ;
            else $posts = $posts->where('area', '>=', $min)->where('area', '<', $max);
            $check_request = true;
        }
        
        if(isset($data['bedroom'])){
            $posts = $posts->whereIn('bedroom', $data['bedroom']);
            $check_request = true;
        }

        if(isset($data['toilet'])){
            $posts = $posts->whereIn('toilet', $data['toilet']);
            $check_request = true;
        }

        // Nếu tồn tại keyword từ request thì tạo câu lệnh query lấy posts
            // 1. Nếu key exists trong tbl keyword 
            // = > Nếu đã tồn tại xem số lượng posts có key này = số lượng posts vừa lấy bằng câu query hay không?
            // = = > Nếu > gán posts = keyword=>posts(); và thêm các bản post mới vào trong keyword_posts còn kh gán posts = keyword=>posts();
            // 2. Nếu key not exists trong tabl keyword
            // = > Check xem câu query trả về posts count > 0 tạo mới key và creat post and key in tbl keyword_post
            // = > posts count = 0 thôi bỏ qua
        if (isset($data['keyword'])) {
            $data_posts = [];
            $keyword = Keyword::firstOrCreate(['name' => $data['keyword']]);
            
            $posts = $posts->where(function ($query) use ($data) {
                $query->where('title', 'like', '%' . $data['keyword'] . '%')
                    ->orWhere('description', 'like', '%' . $data['keyword'] . '%');
            });
        
            $new_posts = $posts->pluck('id')->all();
        
            // Sử dụng syncWithoutDetaching để thêm mới các bản ghi mà không xóa bất kỳ bản ghi nào không nằm trong mảng $new_posts
            $keyword->posts()->syncWithoutDetaching($new_posts);
        
            $posts = $keyword->posts();
            $check_request = true;
        }
            
        if(isset($data['sort_by'])){
            $value = $data['sort_by'];
            $posts = $this->sortByPosts($value, $posts);
            $check_request = true;
        }
        $postsCount = $posts->count();
        $posts =  $posts->paginate(8);

        if($check_request === true){
            // session(['dataAttributesSearch' => $data]);
            toastr()->info('Tìm thấy '.$postsCount.' bài đăng.', 'Thông báo');
            return view('frontend.pages.page.index', compact('posts', 'title', 'postsCount', 'category', 'dataPostsByProvince', 'realEstateTypes', 'fiveMenus', 'dataKeywordByCategory', 'categoriesPost'));
        }
        else{
            return redirect()->route('loadPage', compact('category_name'));
        }
        return Response::json(['message' => 'Không tìm thấy dữ liệu'], 422);
    }

    protected function sortByPosts($value, $posts){
        $value = intval($value);
        if($value === 1){ 
            $posts = $posts->orderByDesc('created_at');
        }
        elseif($value === 2){ 
            $posts = $posts->orderBy('price');
        }
        elseif($value === 3){ 
            $posts = $posts->orderByDesc('price');
        }
        elseif($value === 4){ 
            $posts = $posts->orderBy('sub_price');
        }
        elseif($value === 5){ 
            $posts = $posts->orderByDesc('sub_price');
        }
        elseif($value === 6){ 
            $posts = $posts->orderBy('area');
        }
        elseif($value === 7){
            $posts = $posts->orderByDesc('area');
        }
        return $posts;
    }

    protected function getParamsByRequest($text, $nameParam){
        $min = 0;
        $max = 0;
        if($text){
            foreach(config('filter_params.'.$nameParam) as $param){
                if($text == $param['text']){
                    $min = $param['min'];
                    $max = $param['max'];
                    break;
                }
            }
        }
        return [$min, $max];
    }

    public function showPhoneNumber(Request $request){
        try{
            $post = Post::where('id', $request->get('post_id'))->first();
            $phone_number = $post->user->getPhoneNumberFormatAttribute();
            return Response::json(['data' => $phone_number], 200);
        }catch(Exception $e){
            return Response::json(['message' => 'Đã xảy ra lỗi '.$e->getMessage()], 500);
        }
    }

}