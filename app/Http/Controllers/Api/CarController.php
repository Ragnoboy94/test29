<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarStoreRequest;
use App\Http\Requests\CarUpdateRequest;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->only(['index', 'store', 'show', 'update', 'destroy']);
        $this->authorizeResource(Car::class, 'car');
    }

    public function index(Request $r)
    {
        $q = Car::query()->with(['brand:id,name', 'model:id,name'])->where('user_id', $r->user()->id)->orderByDesc('id');
        return $q->paginate(15);
    }

    public function store(CarStoreRequest $r)
    {
        $data = $r->validated();
        $data['user_id'] = $r->user()->id;
        $car = Car::create($data);
        return response()->json($car->load(['brand:id,name', 'model:id,name']), 201);
    }

    public function show(Car $car)
    {
        return $car->load(['brand:id,name', 'model:id,name']);
    }

    public function update(CarUpdateRequest $r, Car $car)
    {
        $car->update($r->validated());
        return $car->load(['brand:id,name', 'model:id,name']);
    }

    public function destroy(Car $car)
    {
        $car->delete();
        return response()->noContent();
    }
}
