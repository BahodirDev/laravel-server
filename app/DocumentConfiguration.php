<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentConfiguration extends Model
{
    protected $fillable = [
        'document_id', 'field_seq', 'is_mandatory',
        'field_type', 'field_name', 'select_values'
    ];

    public function document()
    {
        return $this->belongsTo(Document::class);
    }
}
