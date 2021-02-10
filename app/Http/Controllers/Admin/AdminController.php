<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Annonce;
use App\Reservations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

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

    public function getStat()
    {
        $year=\Carbon\Carbon::now()->year;
        // dd($year);
        $items=Reservations::whereYear('created_at',$year)
                ->where('accepter',true)
                ->where('recuperer', true)
                ->where('livrer', true)
                ->get()
                ->groupBy(function($d){
                return \Carbon\Carbon::parse($d->created_at)->format('m');
            });
            // dd($items);
            //->translatedFormat('l jS F Y,')
        $result=[];
        foreach($items as $month=>$item_collections){
            foreach($item_collections as $item){
                $amount=$item->sum('montantReservation');
                // dd($amount);
                $m=intval($month);
                // return $m;
                isset($result[$m]) ? $result[$m] += $amount :$result[$m]=$amount;
            }
        }
        $data=[];
        setlocale (LC_TIME, 'fr_FR.utf8','fra');
        for($i=1; $i <=12; $i++){
            $monthName=strftime('%B', mktime(0,0,0,$i,1));
            $data[$monthName] = (!empty($result[$i]))? number_format((float)($result[$i]), 2, '.', '') : 0.0;
        }
        return $data;
    }

    public function getStatAnnonce()
    {
        $year=\Carbon\Carbon::now()->year;
        // dd($year);
        $items=Annonce::whereYear('created_at',$year)
                //->where('accepter',true)
               // ->where('recuperer', true)
               // ->where('livrer', true)
                ->get()
                ->groupBy(function($d){
                return \Carbon\Carbon::parse($d->created_at)->format('m');
            });
            // dd($items);
            //->translatedFormat('l jS F Y,')
        $result=[];
        foreach($items as $month=>$item_collections){
            $amount = 0;
            foreach($item_collections as $item){
                $amount +=1;
                // dd($amount);
                $m=intval($month);
                // return $m;
                isset($result[$m]) ? $result[$m] = $amount :$result[$m]=$amount;
            }
        }
        //dd($result);
        $data=[];
        setlocale (LC_TIME, 'fr_FR.utf8','fra');
        for($i=1; $i <=12; $i++){
            $monthName=strftime('%B', mktime(0,0,0,$i,1));
            $data[$monthName] = (!empty($result[$i]))? (int)($result[$i]) : 0;
        }
        return $data;

    }

    public function reservationsAnnonce($id)
    {
        $reservations = DB::table('reservations')->where('annonce_id', $id)->join('users', 'users.id', 'reservations.user_id')
                        ->select('users.name', 'users.prenom', 'reservations.*')
                        ->get();
        return view('admin.main.pages.reservations-annonce')->with(['reservations' => $reservations, 'idAnnonce' =>$id]);
    }

    public function listTransactionMontant()
    {

        return view('admin.main.pages.liste-transactions-gain');
    }

    public function editAnnonce(Request $request, $id)
    {
        $user = Annonce::find($id);
        if ($user) {
            # code...
            $user->update([
                'etat'=> $request->status
            ]);
            return back()->with('success', 'Opération effectuée avec succès');
        }else{
            return back()->with('error', 'Echèc de l\'opération');
        }
    }

    public function deleteAnnonce($id)
    {
        $annonce=Annonce::findorFail($id);
        if($annonce){
            $annonce->delete();
            request()->session()->flash('success','User Successfully deleted');
        }
        else{
            request()->session()->flash('error','There is an error while deleting users');
        }
       return redirect()->back();

    }
}
