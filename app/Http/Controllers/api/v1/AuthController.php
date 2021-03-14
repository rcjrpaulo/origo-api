<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\v1\auth\LoginRequest;
use App\Http\Requests\api\v1\auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return response()->json($user);
    }

    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            $user = User::where('email', $request->email)->first();
            $token = $user->createToken('token-name');

            return response()->json(['token' => $token->plainTextToken, 'user' => $user], 200);
        }

        throw ValidationException::withMessages([
            'email' => ['As credenciais enviadas estão incorretas.']
        ]);
    }

    public function logout()
    {
        // desativa apenas do token passado
        request()->user()->currentAccessToken()->delete();

        return response()->json(null, 204);
    }

    public function logoutAllDevices()
    {
        // desativa todos os tokens do usuário (desloga de web, mobile, etc)
        auth()->user()->tokens()->delete();

        return response()->json(null, 204);
    }

    public function loggedUser()
    {
        return response()->json(auth()->user());
    }
}
