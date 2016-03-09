<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
     /**
     * The attributes that are mass assignable.
     * Campos que tienen que estar obligatoriamente en la consulta.
     * @var array
     */
    protected $fillable = [
        'firstName','lastName','phone', 'email','address','category','user_id',
    ];

    /*
		Para campos que pueden estar en el formulario hidden

    */
     protected $hidden = [
        'user_id',
    ];
}
