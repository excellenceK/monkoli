<?php

namespace App\Http\Controllers;

use App\User;
use App\Messages;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    //
    public function adminSendMessage(Request $request)
    {
        $this->validate($request,[
            //'name'=>'string|required|min:2',
            'email'=>'email|required',
            'message'=>'required|min:5|max:200',
            'subject'=>'string|required',
            //'phone'=>'numeric|required'
        ]);
        // return $request->all();

        //dd($data);
        $users = User::where('email', $request->email)->first();
        if ($users) {
            # code...
            $data = $request->all();
            $data['name'] = $users->name.' '.$users->prenom;
            //$data['email'] = $value->email;
            $data['phone'] = $users->telephone;
            $data['for_users'] = true;
            Messages::create($data);
            request()->session()->flash('success','Message envoyé avec succès !');
            return back();

        }else
        {
            request()->session()->flash('error','Aucun destinataire trouvé');
            return back();
        }
    }
}
