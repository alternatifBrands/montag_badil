<?php

namespace App\Http\Controllers\API;
use App\Models\Category;

use App\Trait\AHM_Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\API\CategoryResource;

class CategoryController extends Controller
{
    use AHM_Response;
    public function index()
    {
        if (Category::exists()) {
            $categories = Category::with(['brands'])->paginate();
            return $this->paginateResponse(CategoryResource::collection($categories));
        }
        return $this->NotFoundResponse();
    }
    public function show($id)
    {
        $category = Category::with(['brands'])->find($id);
        if ($category) {
            return $this->GetDataResponse(CategoryResource::make($category));
        }
        return $this->NotFoundResponse();
    }
    public function search($keyword)
    {
        if (Category::exists()) {
            $categories = Category::with(['brands'])
                ->where('name', 'like', '%' . $keyword . '%')
                ->paginate();
            return $this->paginateResponse(CategoryResource::collection($categories));
        }
        return $this->NotFoundResponse();
    }
}
