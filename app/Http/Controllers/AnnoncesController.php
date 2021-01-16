<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnnoncesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('webpages.annonces.choose-type-annonce');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        //
        return view('webpages.annonces.search');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function typeAnnonce(Request $request)
    {
        //
        return redirect('/type-annonce/'.$request->choix);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function vueTypeAnnonce($type)
    {
        //
        return view('webpages.annonces.choose-category-annonce')->with(['type'=>$type]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function categoryAnnonce(Request $request)
    {
        //
        $type = $request->type;
        $category = $request->choix;

        switch ($type) {
            case 'expédition colis':
                # code...
                return redirect('/coli/create/'.$type.'/'.$category);

                /*switch ($category) {
                    case 'libre':
                        # code...
                        return redirect('/coli/create')->with(['type' =>$type, 'category' =>$category]);
                        break;
                    case 'certifiee':
                        return redirect('/coli/create/'.$type.'/'.$category);
                        break;
                    case 'certifiee urgente':
                        # code...
                        return redirect('/coli/create/'.$type.'/'.$category);
                        break;
                    default:
                        # code...
                        break;
                }*/
                break;
            case 'location véhicule':
                # code...
                break;

            case 'location appartement':
                # code...
                break;

            default:
                # code...
                break;
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
