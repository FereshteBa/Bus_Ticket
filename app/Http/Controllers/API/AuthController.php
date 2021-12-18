<?php

namespace App\Http\Controllers\API;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Repositories\UsersRepository;
use PhpParser\Node\Stmt\TryCatch;

class AuthController extends Controller
{
    public $Users;

    public function __construct(UsersRepository $Users)
    {
        $this->Users = $Users;
    }

    public function register(RegisterRequest $request)
    {
        try {
            $User=$this->Users->create($request->all());
            $token = $User->createToken('auth_token')->plainTextToken;

            return
            response()
            ->json(['status'=>'success','message'=>"hi", 'access_token' => $token, 'token_type' => 'Bearer']);

        } catch (\Throwable $error) {
            return response()
            ->json(['status'=>'failed','message'=>$error->getMessage()]);
        }
    }

    public function login(LoginRequest $request)
    {
        // dd('sajhvdwh');
        try {
//->only('email', 'password')
            if (!Auth::attempt($request))
            {
                return
                response()
                ->json([ 'status'=>'failed','message' => 'Unauthorized'], 401);
            }

            $User=$this->Users->find($request->email);
            $token = $User->createToken('auth_token')->plainTextToken;

            return
            response()
            ->json(['message' => 'Hi '.$User->name.', welcome to home','access_token' => $token, 'token_type' => 'Bearer', ]);

        } catch (\Throwable $error) {
            return response()
            ->json(['status'=>'failed','message'=>$error->getMessage()]);
        }
    }

    // method for user logout and delete token
    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'status'=>'success','message' => 'You have successfully logged out and the token was successfully deleted'
        ];
    }
}
