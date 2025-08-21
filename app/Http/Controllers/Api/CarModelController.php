<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CarModel;
use Illuminate\Http\Request;

class CarModelController extends Controller
{
    /**
     * @OA\Get(
     *   path="/api/models",
     *   tags={"Models"},
     *   summary="Список моделей",
     *   @OA\Parameter(name="brand_id", in="query", required=false, @OA\Schema(type="integer")),
     *   @OA\Response(response=200, description="OK",
     *     @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/CarModel"))
     *   )
     * )
     */
    public function index(Request $r)
    {
        $q = CarModel::query()->with('brand:id,name')->orderBy('name');
        if ($r->filled('brand_id')) $q->where('brand_id', (int)$r->input('brand_id'));
        return $q->get(['id', 'name', 'brand_id']);
    }
}
