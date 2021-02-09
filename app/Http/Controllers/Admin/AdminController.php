<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function index()
    {
        return view('admin.main.index');
    }

    public function listUsers()
    {
        return view('admin.main.pages.users-liste');
    }

    public function listAnnonce()
    {
        return view('admin.main.pages.liste-annonces');
    }

    public function profileUser($id)
    {
        return view('admin.main.pages.profile-user')->with(['id'=>$id]);
    }
}
