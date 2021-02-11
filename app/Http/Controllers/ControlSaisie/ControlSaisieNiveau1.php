<?php

namespace App\Http\Controllers\ControlSaisie;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ControlSaisieNiveau1 extends Controller
{
    //Controlle de saisie de niveau 1 gere trim,stripslashes et htmlspecialchars
    public static function checkInput1($data) {
        //$data = trim($data);
        //$data = stripslashes($data);
        //$data = htmlspecialchars($data);
        return $data;
    }

}
