<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
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

    public function listAnnonceEnCours()
    {
        return view('admin.main.pages.liste-annonces-en-cours');
    }


    public function profileUser($id)
    {
        return view('admin.main.pages.profile-user')->with(['id'=>$id]);
    }

    public function editUser(Request $request, $id)
    {
        $user = User::find($id);
        if ($user) {
            # code...
            $user->update([
                'status'=> $request->status
            ]);
            return back()->with('success', 'Opération effectuée avec succès');
        }else{
            return back()->with('error', 'Echèc de l\'opération');
        }
    }

    public function deleteUser($id)
    {
        $delete=User::findorFail($id);
        $status=$delete->delete();
        if($status){
            request()->session()->flash('success','User Successfully deleted');
        }
        else{
            request()->session()->flash('error','There is an error while deleting users');
        }
       return redirect()->back();

    }
}
