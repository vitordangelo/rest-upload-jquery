<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Routing\Controller;
use Request;
use Hash;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function allUsers()
    {
        $user = new User();
        return user::all();
    }

    public function getUser($id)
    {
        $user = new User();
        $user = user::find($id);
        if (is_null($user)) {
            return response()->json(['response' => 'Usuário não encontrado'], 400);
        }
        //return response()->json([$user], 200);
        return $user;
    }

    public function saveUser()
    {
        $input = Request::all();
        //dd($input);
        $input['password']  = Hash::make($input['password']);
        $user = new User();
        $user->fill($input);
        $user->save();
        return $user;
    }

    public function updateUser($id)
    {
        $user = new User();
        $user = user::find($id);
        if (!$user)
        {
            return response()->json(['response' => 'Usuário não encontrado'], 400);
        }
        $input = Request::all();
        if (isset($input['password']))
        {
            $input['password'] = Hash::make($input['password']);
        }
        $user->fill($input);
        $user->save();
        return $user;
    }

    public function deleteUser($id)
    {
        $user = new User();
        $user = user::find($id);
        if (is_null($user)) {
            return response()->json(['response' => 'Usuário não encontrado'], 400);
        }
        $user->delete();
        return response()->json(['response' => 'Usuário ' . $user['first_name'] . ' foi deletado com sucesso'], 200);
    }
}
