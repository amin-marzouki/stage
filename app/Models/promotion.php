<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @OA\Schema(
 *     title="promotion",
 *     description="promotion model",
 *     @OA\Xml(
 *         name="promotion"
 *     )
 * )
 */
class promotion extends Model
{
    use HasFactory;
}
