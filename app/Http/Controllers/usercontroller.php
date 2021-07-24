<?php

namespace App\Http\Controllers;
 use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use Illuminate\Support\Facades\Hash;


class usercontroller extends Controller
{
    //

/**
 * @OA\Post(
 * path="login",
 * summary="Sign in",
 * description="Login by email, password",
 * operationId="authLogin",
 * tags={"auth"},
 * @OA\RequestBody(
 *    required=true,
 *    description="Pass user credentials",
 *    @OA\JsonContent(
 *       required={"email","password"},
 *       @OA\Property(property="email", type="string", format="email", example="user1@mail.com"),
 *       @OA\Property(property="password", type="string", format="password", example="PassWord12345"),
 *      
 *    ),
 * ),
 * @OA\Response(
 *    response=422,
 *    description="Wrong credentials response",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="Sorry, wrong email address or password. Please try again")
 *        )
 *     
 * ),
 *  @OA\Response(
 *    response=205,
 *    description="succes",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="succes")
 *        )
 *   )   
 * )
 */

    function index(Request $request)
    {
        $user= User::where('email', $request->email)->first();
        // print_r($data);
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response([
                    'message' => ['These credentials do not match our records.']
                ], 404);
            }
        
             $token = $user->createToken('my-app-token')->plainTextToken;
        
            $response = [
                'user' => $user,
                'token' => $token
            ];
        
             return response($response, 201);
    }
    
/**
 * @OA\Post(
 * path="register",
 * summary="Sign up",
 * description="register by name ,email, password",
 * operationId="authregister",
 * tags={"auth"},
 * @OA\RequestBody(
 *    required=true,
 *    description="Pass user credentials",
 *    @OA\JsonContent(
 *       required={"email","password","name"},
 *       @OA\Property(property="name", type="string", format="text", example="user"),
 *       @OA\Property(property="email", type="string", format="email", example="user1@mail.com"),
 *       @OA\Property(property="password", type="string", format="password", example="PassWord12345"),
 *      
 *    ),
 * ),
 * @OA\Response(
 *    response=423,
 *    description="Wrong credentials response",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="Sorry, wrong email  or password format. Please try again")
 *        )
 *     
 * ),
 * @OA\Response(
 *    response=206,
 *    description="Wrong credentials response",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="succes")
 *        )
 *     )
 * 
 *)
 */
    public function register(Request $request)
    {
        
        $attr = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed'
        ]);
       
        $user = User::create([
            'name' => $attr['name'],
            'password' => Hash::make($attr['password']),
            'email' => $attr['email']
        ]);
$token =$user->createToken('API Token')->plainTextToken;
        return[
            'token' => $token
        ];
    }
  /*  public function logout(Request $request)
    {
        return 'hi';
        $user = request()->user();
        $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();

        return [
            'message' => 'Tokens Revoked'
        ];
    }*/
}
