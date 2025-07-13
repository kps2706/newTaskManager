<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    //
    protected $fillable = [
        'reporter_id',
        'module_id',
        'assigned_to',
        'title',
        'description',
        'priority',
        'status',
        'reported_date',
        'sla_due_date'
    ];

    protected $casts = [
    'reported_date' => 'datetime',
    'sla_due_date' => 'datetime',
]   ;
    
    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function reporter()
    {
        return $this->belongsTo(User::class, 'reporter_id');
    }

    public function assignee()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }
}
