<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'temp_password',
        'is_authorized',
        'is_active',
        'force_password_reset',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function reportedIssues()
    {
        return $this->hasMany(Issue::class, 'reporter_id');
    }

    public function assignedIssues()
    {
        return $this->hasMany(Issue::class, 'assigned_to');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function attachments()
    {
        return $this->hasMany(Attachment::class, 'uploaded_by');
    }
}
