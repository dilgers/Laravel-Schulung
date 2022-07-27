<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactRequest extends Model
{
    use SoftDeletes;
    // protected $table = 'kontaktanfragen'; // Wenn Tabelle nicht mit Model überienstimmt

    /* protected $fillable = [ // Withlisting
        'name',
        'email',
        'message'
    ]; */
    protected $guarded = [ // Blacklisting
        'id',
        'created_at',
        'updated_at'
    ];
}
