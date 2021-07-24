<?php
/**
 * @OA\Schema(
 *      title="Store promotion request",
 *      description="Store promotion request body data",
 *      type="object",
 *      required={"name"}
 * )
 */


 class StorePromotionRequest{
    /**
     * @OA\Property(
     *     title="ID",
     *     description="ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $id;
    /**
     * @OA\Property(
     *      title="Name",
     *      description="Name of the new promotion",
     *      example="new promotion"
     * )
     *
     * @var string
     */
    public $title;
    
    /**
     * @OA\Property(
     *      title="Description",
     *      description="Description of the new promotion",
     *      example="This is new promotion's description"
     * )
     *
     * @var string
     */
    public $description;
    /**
     * @OA\Property(
     *      title="Description",
     *      description="Description of the new promotion",
     *      example="percent "
     * )
     *
     * @var string
     */
    public $type;
    /**
     * @OA\Property(
     *      title="Description",
     *      description="Description of the new promotion",
     *      example="This is new promotion's description"
     * )
     *
     * @var string
     */
    public $partenaire;
    /**
     * @OA\Property(
     *     title="Created at",
     *     description="Created at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $created_at;

    /**
     * @OA\Property(
     *     title="Updated at",
     *     description="Updated at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $updated_at;
 }