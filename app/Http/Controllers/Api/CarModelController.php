<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CarModel;
use Illuminate\Http\Request;

class CarModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $r)
    {
        $q = CarModel::query()->with('brand:id,name')->orderBy('name');
        if ($r->filled('brand_id')) $q->where('brand_id', (int)$r->input('brand_id'));
        return $q->get(['id', 'name', 'brand_id']);
    }
}
