<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = ['document_name'];

    public function configurations()
    {
        return $this->hasMany(DocumentConfiguration::class);
    }
}

