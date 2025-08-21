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
        $this->middleware('auth:sanctum')->only(['index','store','show','update','destroy']);
        $this->authorizeResource(Car::class, 'car');
    }

    /**
     * @OA\Get(
     *   path="/api/cars",
     *   tags={"Cars"},
     *   summary="Мои автомобили",
     *   security={{"bearerAuth":{}}},
     *   @OA\Response(response=200, description="OK",
     *     @OA\JsonContent(type="object",
     *       @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/Car"))
     *     )
     *   )
     * )
     */
    public function index(Request $r)
    {
        $q = Car::query()->with(['brand:id,name','model:id,name'])->where('user_id', $r->user()->id)->orderByDesc('id');
        return $q->paginate(15);
    }

    /**
     * @OA\Post(
     *   path="/api/cars",
     *   tags={"Cars"},
     *   summary="Создать авто",
     *   security={{"bearerAuth":{}}},
     *   @OA\RequestBody(required=true, @OA\JsonContent(ref="#/components/schemas/CarCreate")),
     *   @OA\Response(response=201, description="Created", @OA\JsonContent(ref="#/components/schemas/Car"))
     * )
     */
    public function store(CarStoreRequest $r)
    {
        $data = $r->validated();
        $data['user_id'] = $r->user()->id;
        $car = Car::create($data);
        return response()->json($car->load(['brand:id,name','model:id,name']), 201);
    }

    /**
     * @OA\Get(
     *   path="/api/cars/{id}",
     *   tags={"Cars"},
     *   summary="Показать авто",
     *   security={{"bearerAuth":{}}},
     *   @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *   @OA\Response(response=200, description="OK", @OA\JsonContent(ref="#/components/schemas/Car")),
     *   @OA\Response(response=404, description="Not found")
     * )
     */
    public function show(Car $car) { return $car->load(['brand:id,name','model:id,name']); }

    /**
     * @OA\Put(
     *   path="/api/cars/{id}",
     *   tags={"Cars"},
     *   summary="Обновить авто",
     *   security={{"bearerAuth":{}}},
     *   @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *   @OA\RequestBody(required=true, @OA\JsonContent(ref="#/components/schemas/CarCreate")),
     *   @OA\Response(response=200, description="OK", @OA\JsonContent(ref="#/components/schemas/Car"))
     * )
     */
    public function update(CarUpdateRequest $r, Car $car)
    {
        $car->update($r->validated());
        return $car->load(['brand:id,name','model:id,name']);
    }

    /**
     * @OA\Delete(
     *   path="/api/cars/{id}",
     *   tags={"Cars"},
     *   summary="Удалить авто",
     *   security={{"bearerAuth":{}}},
     *   @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *   @OA\Response(response=204, description="No Content")
     * )
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return response()->noContent();
    }
}
