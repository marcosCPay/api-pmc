<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    //use HasFactory;
    protected $table='u_yf_documenttypes';
    //public $timestamps = false;
    protected $primaryKey = 'documenttypesid';
    protected $fillable = ['document_type','document_type_path'];
}

