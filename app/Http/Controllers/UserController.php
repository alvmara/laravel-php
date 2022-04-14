<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserController extends Controller
{

    //traer todos los usuarios

    public function allUsers()
    {
        Log::info('allUsers()');

        try {

            $users = User::all();

            Log::info('Tasks done');

            return response()->json($users, 200);
        } catch (\Exception $e) {

            Log::error($e->getMessage());

            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }



    //traer usuario por id
    public function userByID($id)
    {
        Log::info('userByID()');

        try {

            $user = User::find($id);

            Log::info('Tasks done');

            return response()->json($user, 200);
        } catch (\Exception $e) {

            Log::error($e->getMessage());

            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }


    // actualizar usuario
    public function updateUser(Request $request, $id)
    {
        Log::info('updateUser()');

        try {

            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
            ]);

            if ($validator->fails()) {
                return response()->json(['message' => 'Validation failed'], 400);
            }

            $user = User::find($id);

            $user->name = $request->name;
            $user->email = $request->email;

            $user->save();

            Log::info('Tasks done');

            return response()->json($user, 200);
        } catch (\Exception $e) {

            Log::error($e->getMessage());

            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }

    //eliminar usuario
    public function deleteUser($id)
    {
        Log::info('deleteUser()');

        try {

            $user = User::find($id);

            $user->delete();

            Log::info('Tasks done');

            return response()->json(['message' => 'User deleted'], 200);
        } catch (\Exception $e) {

            Log::error($e->getMessage());

            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }

    //buscar usuario por steamUsername

    public function userBySteamUsername($steamUsername)
    {
        Log::info('userBySteamUsername()');

        try {

            $user = User::where('steamUsername', $steamUsername)->first();

            Log::info('Tasks done');

            return response()->json($user, 200);
        } catch (\Exception $e) {

            Log::error($e->getMessage());

            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }
}
