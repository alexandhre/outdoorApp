<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Outdoor extends Model
{
    protected $table = 'Outdoor';    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'situacao', 'contratante', 'endereco', 'cep'
    ];        
}
