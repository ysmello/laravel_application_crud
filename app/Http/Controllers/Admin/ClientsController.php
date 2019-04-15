<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = \App\Client::all();
        return view('admin.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $clientType = \App\Client::getClientType($request->client_type); 
        return view('admin.clients.create', ['client' => new Client(), 'clientType' => $clientType]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->_validate($request);
        $data['defaulter'] = $request->has('defaulter');
        Client::create($data);
        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('admin.clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        $clientType = \App\Client::getClientType($client->client_type);
        return view('admin.clients.edit', compact('client', 'clientType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $data = $this->_validate($request);
        $data['defaulter'] = $request->has('defaulter');
        $client->fill($data);
        $client->save();
        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index');
    }

    public function _validate(Request $request) {
        $clientType = \App\Client::getClientType($request->client_type);
        $documentNumberType = $clientType == Client::TYPE_INDIVIDUAL ? 'cpf' : 'cnpj';
        $client = $request->route('client');
        $clientId = $client instanceof Client?$client->id:null;

        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'document_number' => "required|unique:clients,document_number,$clientId|document_number:$documentNumberType",
        ];
        
        $maritalStatus = implode(',', array_keys(Client::MARITAL_STATUS));
        $rulesIndividual = [
            'sex' => 'required|in:M,F',
            'marital_status' => "required|in:$maritalStatus",
            'physical_disability' => 'max:255',
            'date_birth' => 'required|date',
        ];
        
        $rulesLegal = [
            'client_type' => 'required',
            'company_name' => 'required|max:255',
        ];

        return $this->validate($request, $clientType == Client::TYPE_INDIVIDUAL ? $rules + $rulesIndividual : $rules + $rulesLegal);
    }

}