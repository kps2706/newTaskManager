<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    //
    protected $fillable = ['issue_id', 'uploaded_by', 'file_path'];

    public function issue()
    {
        return $this->belongsTo(Issue::class);
    }

    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }
}
