<?php

namespace Corp;

use Illuminate\Database\Eloquent\Model;

class CsvData extends Model
{
    protected $fillable=['id','csv_filename','csv_header','csv_data'];
}
