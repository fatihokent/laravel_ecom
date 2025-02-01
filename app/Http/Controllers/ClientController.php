<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    //
    public function index(){ 
        $clients = Client::all();
        return View ("cclients.index", compact('clients'));
    }
    public function show ($id){
        $client = Client::find($id);
        return View ("cclients.show", compact('client'));
    }

    public function create(){
        return View ("cclients.create");
    }
    
    public function store(Request $request){
        Client::create($request->all());
        return redirect()->route ('clients.index');
    }

    public function edit ($id){
        $client = Client::find($id);
        return View ("cclients.edit", compact('client'));
    }

    public function update (Request $request, $id){
        $client = Client::find($id);
        $client->update($request->all());
        return redirect()->route ('clients.index');
    }

    public function destroy ($id){
        $client = Client::find($id);
        $client->delete();
        return redirect()->route ('clients.index');
    }
}
