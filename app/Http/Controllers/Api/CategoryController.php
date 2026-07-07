<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return ApiResponse::send(200,true,'تم جلب الفئات بنجاح',new CategoryResource($categories));
    }
}
