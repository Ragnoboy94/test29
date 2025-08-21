<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * @OA\Get(
     *   path="/api/brands",
     *   tags={"Brands"},
     *   summary="Список марок",
     *   @OA\Response(response=200, description="OK",
     *     @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Brand"))
     *   )
     * )
     */
    public function index()
    {
        return Brand::query()->orderBy('name')->get(['id', 'name']);
    }
}
