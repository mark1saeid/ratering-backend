<?php

namespace App\Http\Controllers\Api;

    use App\Http\Controllers\Controller;
    use App\Traits\GeneralTrait;
    use App\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Validator;
    use JWTAuth;





class UserControllers extends Controller
{
use GeneralTrait;
    public function __construct() {
     $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (! $token = auth()->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->createNewToken($token);
    }


    public function register(Request $request) {
        $validator = Validator::make($request->all(), [

            'email' => 'required|string|email|max:100|unique:users|regex:/(.+)@(.+)\.(.+)/i',
            'password' => 'required|string|min:8',
            'full_name' => 'required|string|between:4,40',
            'username' => 'required|string|between:6,12|unique:users',
            'birthday' => 'required|string|between:2,18',
            'gender' => 'required|string|between:3,8',
            'phone' => 'required|string|between:10,16|unique:users',

        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::create(array_merge(
            $validator->validated(),
            ['password' => bcrypt($request->password)],
            ['rating' => '0']

        ));

        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);
    }



    public function logout() {
        auth()->logout();

        return response()->json(['message' => 'User successfully signed out']);
    }


    public function refresh() {
        return $this->createNewToken(auth()->refresh());
    }


    public function userProfile() {
        return response()->json(auth()->user());
    }


    protected function createNewToken($token){
        $id = auth()->user()->id;
       $s = User::all()->where('id' ,$id )->first()->update(['api_token'=> $token]);
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }



    public function uploadTest(Request $request) {

        if(!$request->hasFile('image')) {
            return response()->json(['upload_file_not_found'], 400);
        }
        $file = $request->file('image');
        if(!$file->isValid()) {
            return response()->json(['invalid_file_upload'], 400);
        }
        $path = public_path() . '/uploads/images/store/';
        $file->move($path, $file->getClientOriginalName());
        return response()->json(compact('path'));
    }

}
