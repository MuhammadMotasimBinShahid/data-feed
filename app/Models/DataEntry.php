<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataEntry extends Model
{
    use HasFactory;

    protected $fillable = ['xml_data', 'json_data', 'csv_data'];

    protected $casts = [
        'xml_data' => 'json',
    ];
}
