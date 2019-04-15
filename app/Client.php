<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    const TYPE_INDIVIDUAL = 'Individual';
    const TYPE_LEGAL = 'Legal';

    const MARITAL_STATUS = [
        1 => 'Solteiro',
        2 => 'Casado',
        3 => 'Divorciado'
    ];

    protected $fillable = [
        'name',
        'email',
        'document_number',
        'sex',
        'defaulter',
        'date_birth',
        'physical_disability',
        'phone',
        'marital_status',
        'client_type',
        'company_name'
    ];

    public static function getClientType($type) {
       return $type == \App\Client::TYPE_LEGAL ? $type : \App\Client::TYPE_INDIVIDUAL;
    }

}
