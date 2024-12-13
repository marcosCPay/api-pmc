<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    //use HasFactory;
    protected $table='vtiger_attachments';
    //public $timestamps = false;
    protected $primaryKey = 'attachmentsid';
    protected $fillable = ['name','path'];
}
