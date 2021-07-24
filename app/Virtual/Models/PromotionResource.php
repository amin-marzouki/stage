<?php
/**
 * @OA\Schema(
 *     title="PromotionResource",
 *     description="Promotion resource",
 *     @OA\Xml(
 *         name="PromotionResource"
 *     )
 * )
 */


class PromotionResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\Promotion[]
     */
    private $data;
}