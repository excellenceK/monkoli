<?php

namespace App\Http\Controllers;

use App\User;
use App\Messages;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            $data['name'] = Auth::user()->email;
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

    public function updateMessage($id)
    {
        $message = Messages::findOrFail($id);
        if ($message) {
            # code...
            $message->update([
                'read_at' =>Carbon::now()
            ]);
            return back();
        }else {
            # code...
            return back()->with('error', 'Ce message n\'est plus disponible !');

        }
    }

    public function deleteMessage($id)
    {
        $message =  Messages::findOrFail($id);
        if ($message) {
            # code...
            $message->delete();
            return back()->with('succes', 'message supprimé avec succès !');
        }else{
            return back()->with('error', 'message non trouvé !');
        }

    }
}
