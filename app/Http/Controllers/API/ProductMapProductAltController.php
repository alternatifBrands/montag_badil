<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\ProductMapProductAlt\storeRequest;
use App\Models\Product;
use App\Models\ProductAlternative;

class ProductMapProductAltController extends Controller
{
    public function store(storeRequest $request)
    {
        $product = Product::find($request->product_id);
        if (!$product->is_alternative) {
            $alternativeIds = $request->alternative_id;
            $productAlternatives = ProductAlternative::whereIn('id', $alternativeIds)->get();
            $productAlternativeIds = $productAlternatives->pluck('id')->toArray();
            $product->productAlternatives()->sync($productAlternativeIds);
            return response()->json([
                'message'=>'Product and ProductAlternative sync successfully',
                'data'=>[],
                'status'=>true,
                'code'=>201
            ],201);
        }
        return response()->json([
            'message'=>'Fail',
            'data'=>[],
            'status'=>false,
            'code'=>400
        ],400);
    }
}
