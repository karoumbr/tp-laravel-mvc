<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Support\Facades\DB;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use App\Models\Contrat;


class HomeController extends Controller
{
    //
    public function index()
    {
        //première méthode
        // $allclients = ['statique - Client1', 'statique - Client2'];
        //return View('index', ['clients' => $allclients]);
        //deuxième méthode - accès à la base de données MySQL
        //  $allclients = DB::table('clients')->get();
        // return View('index', ['clients' => $allclients]);
        //troisième méthode: utilisation de eloquent : couche base de données de Laravel)
        //  $allclients = Client::all();
        //return View('index', ['clients' => $allclients]);
        //quatrième méthode
        $allclients = Client::all();
        $allcontrats = Contrat::when(request('client_id'), function ($requete) {
            $requete->where('client_id', request('client_id'));
        })
            ->latest()
            ->get();
        return View(
            'index',
            ['clients' => $allclients],
            ['contrats' => $allcontrats]
        );
    }
}
