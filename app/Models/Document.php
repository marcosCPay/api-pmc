<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    //use HasFactory;
    protected $table='vtiger_notes';
    //public $timestamps = false;
    protected $primaryKey = 'notesid';
    protected $fillable = ['title','filename','document_type','case'];
}

