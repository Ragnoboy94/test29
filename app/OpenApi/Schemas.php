<?php

namespace App\OpenApi;

/**
 * @OA\Schema(
 *   schema="Brand",
 *   type="object",
 *   @OA\Property(property="id", type="integer", example=1),
 *   @OA\Property(property="name", type="string", example="Toyota")
 * )
 *
 * @OA\Schema(
 *   schema="CarModel",
 *   type="object",
 *   @OA\Property(property="id", type="integer", example=10),
 *   @OA\Property(property="name", type="string", example="Corolla"),
 *   @OA\Property(property="brand_id", type="integer", example=1)
 * )
 *
 * @OA\Schema(
 *   schema="Car",
 *   type="object",
 *   @OA\Property(property="id", type="integer", example=100),
 *   @OA\Property(property="brand_id", type="integer", example=1),
 *   @OA\Property(property="car_model_id", type="integer", example=10),
 *   @OA\Property(property="year", type="integer", nullable=true, example=2020),
 *   @OA\Property(property="mileage", type="integer", nullable=true, example=12000),
 *   @OA\Property(property="color", type="string", nullable=true, example="black"),
 *   @OA\Property(property="user_id", type="integer", nullable=true, example=5)
 * )
 *
 * @OA\Schema(
 *   schema="CarCreate",
 *   type="object",
 *   required={"brand_id","car_model_id"},
 *   @OA\Property(property="brand_id", type="integer", example=1),
 *   @OA\Property(property="car_model_id", type="integer", example=10),
 *   @OA\Property(property="year", type="integer", example=2020),
 *   @OA\Property(property="mileage", type="integer", example=12000),
 *   @OA\Property(property="color", type="string", example="black")
 * )
 *
 * @OA\Schema(
 *   schema="LoginRequest",
 *   type="object",
 *   required={"email","password"},
 *   @OA\Property(property="email", type="string", format="email", example="test@example.com"),
 *   @OA\Property(property="password", type="string", example="password")
 * )
 *
 * @OA\Schema(
 *   schema="TokenResponse",
 *   type="object",
 *   @OA\Property(property="token", type="string", example="1|abcd..."),
 * )
 */
class Schemas {}
