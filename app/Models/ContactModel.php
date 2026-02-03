<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactModel extends Model
{
    protected $table = "contact";

    protected $fillable = [ // Polja koja se mogu popunjavati
        "email", "subject", "message"
    ];
}
