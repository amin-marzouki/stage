<?php

namespace App\Http\Controllers;

use App\Models\promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class promotionController extends Controller
{
     /**
     * @OA\Get(
     *      path="/show/{id}",
     *      operationId="getPromotionById",
     *      tags={"promotion"},
     *      summary="Get promtion information",
     *      description="Returns promotion data",
     *      @OA\Parameter(
     *          name="id",
     *          description="promtion id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *   @OA\JsonContent(ref="#/components/schemas/Promotion")
     *         
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
    function list($id=null){
        
        Log::info(json_encode($id?promotion::find($id):promotion::all()));
        return $id?promotion::find($id):promotion::all();
         
    }
        /**
     * @OA\Post(
     *      path="/add",
     *      operationId="addpromotion",
     *      tags={"promotion"},
     *      summary="Store new promotion",
     *      description="Returns promotion data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StorePromotionRequest")
     *        
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *           @OA\JsonContent(ref="#/components/schemas/Promotion")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
    function add(Request $req)
    {
        $promotion = new promotion;
$promotion->title=$req->title;
$promotion->description=$req->description;
$promotion->type=$req->type;
$promotion->partenaire=$req->partenaire;
$res = $promotion->save();
if($res){
    return "done";
}
else{
    return "fail";
}

    }
      /**
     * @OA\Put(
     *      path="/update/{id}",
     *      operationId="updatepromotion",
     *      tags={"promotion"},
     *      summary="Update existing promotion",
     *      description="Returns updated promotion data",
     *      @OA\Parameter(
     *          name="id",
     *          description="promotion id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StorePromotionRequest")
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/Promotion")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    function update(Request $req)
    {

        $promotion = promotion::find($req->id);
          
$promotion->title=$req->title;
$promotion->description=$req->description;
$promotion->type=$req->type;
$promotion->partenaire=$req->partenaire;
$res = $promotion->save();
if($res){
    return "done";
}
else{
    return "fail";
}

    }
    function search($title){
return promotion::where("title","like",$title)->get();
    }
      /**
     * @OA\Delete(
     *      path="/add/{id}",
     *      operationId="deletepromotion",
     *      tags={"promotion"},
     *      summary="Delete existing promotion",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="promotion id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    function delete($id){
        $promotion = promotion::find($id);
        $res = $promotion->delete();
        if($res){
            return["result"=>"promotion has been deleted"];
        }
        else{
            return["result"=>"  deleted operation has been failed"];
        }

    }
}
