<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class IssueStatusLog extends Model
{
    //
    use Hasfactory;

        protected $fillable = [
        'issue_id',
        'status',
        'additional_data',
        ];

        protected $casts = [
        'additional_data' => 'array',
        ];

        public function issue()
        {
            return $this->belongsTo(Issue::class);
        }

        public function user()
        {
            return $this->belongsTo(User::class);
        }
}
