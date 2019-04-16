<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Client;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $clientType = \App\Client::getClientType($this->client_type);
        $documentNumberType = $clientType == Client::TYPE_INDIVIDUAL ? 'cpf' : 'cnpj';
        $client = $this->route('client');
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

        return $clientType == Client::TYPE_INDIVIDUAL ? $rules + $rulesIndividual : $rules + $rulesLegal;
    }
}
