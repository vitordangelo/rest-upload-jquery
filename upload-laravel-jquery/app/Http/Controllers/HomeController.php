<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\File;
use App\User;
use Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $userId = Auth::id();
        $user = User::with('files')->find($userId); //Obtem os dados do relacionamento: usuário - files
        //dd($user);
        return view('home')->with('user', $user);
    }

    public function upload()
    {
        $file = \Request::file('documento');
        $userId = \Request::get('userId');
        $storagePath = storage_path().'/documentos/'.$userId;
        $fileName = $file->getClientOriginalName();

        $fileModel = new File();
        $fileModel->name = $fileName;

        $user = User::find($userId);
        $user->files()->save($fileModel);

        return $file->move($storagePath, $fileName);
    }

    public function download($userId, $fileId)
    {
        // dd(compact('userId', 'fileId'));
        $file = \App\File::find($fileId);
        $storagePath = storage_path().'/documentos/'.$userId;

        return \Response::download($storagePath.'/'.$file->name);
    }

    public function destroy($userId, $fileId)
    {
        $file = \App\File::find($fileId);
        $storagePath = storage_path().'/documentos/'.$userId;
        $file->delete();
        unlink($storagePath.'/'.$file->name);

        return redirect('/home')->with('status', 'Profile updated!');
    }
}
