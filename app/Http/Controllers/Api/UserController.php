<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bengkel;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Validator;
use Exception;

class UserController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function register(Request $request)
    {
        $user = $request->get('user');
        $data = $request->get('data');

        $validator = Validator::make($user, [
            'email' => 'required|string|email|max:255|unique:users',
            'name' => 'required',
            'password' => 'required|min:6|confirmed',
            'category' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $category = $user['category'];

        $user = User::create([
            'name' => $user['name'],
            'email' => $user['email'],
            'password' => bcrypt($user['password']),
            'category' => $category
        ]);

        if ($category === 'customer'){
            $data['user_id'] = $user->id;
            $this->customerData($data);
        }elseif ($category === 'bengkel'){
            $data['user_id'] = $user->id;
            $this->bengkelData($data);
        }

        $token = JWTAuth::fromUser($user);

        return response()->json(compact('user','token'),201);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProfile()
    {
        return response()->json([
            'status' => 'OK',
            'user' => auth()->user(),
            'detail' => dataUser(),
        ],200);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    public function customerData($data){
        try {
            $bengkel = Customer::create($data);
            return response()->json([
                'msg' => 'success create customer data',
                'status' => 'OK',
                'data' => $bengkel
            ],201);
        }catch (Exception $exception){
            return response()->json([
                'msg' => 'gagal create customer data',
                'status' => 'ERROR',
            ]);
        }
    }

    public function bengkelData($data){
        try {
            $bengkel = Bengkel::create($data);
            return response()->json([
                'msg' => 'success create bengkel data',
                'status' => 'OK',
                'data' => $bengkel
            ],201);
        }catch (Exception $exception){
            return response()->json([
                'msg' => 'gagal create bengkel data',
                'status' => 'ERROR',
            ]);
        }
    }
}
