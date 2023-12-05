<?php

namespace App\Http\Controllers;

use app\Models\Client;
use App\Models\Contrat;
use Illuminate\Http\Request;

class ContratController extends Controller
{
    //
    public function afficher($contratId)
    {
        //   $allclients = Client::all();
        $contrat = Contrat::find($contratId);
        return view('contrat', ['uncontrat' => $contrat]);
    }
}
