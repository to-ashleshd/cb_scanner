<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scan_details_live extends Model
{
     public $timestamps = false;
    public $fillable = [
    	'id',
    	'standard_id',
    	'subject_id',
    	'book_id',
        'chapter_id',
        'pdf_name',
        'pdf_path',
        'pdf_number',
    	'created_by',
        'created_on',
        'updated_by',
        'updated_on'
     ];

    public $table = 'scan_details_live';
    
}
