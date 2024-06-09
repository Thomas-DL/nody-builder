<?php

namespace App\Models;

use Filament\Panel;
use Laravel\Cashier\Billable;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail, FilamentUser
{
    use HasFactory;
    use Notifiable;
    use Billable;

    public function canAccessPanel(Panel $panel): bool
    {
        if ($panel->getId() === 'user') {
            return true;
        } else if ($panel->getId() === 'admin') {
            return str_ends_with($this->email, '@thomasdelage.com') && $this->hasVerifiedEmail() && $this->isAdmin();
        }
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role',
        'username',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
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
}
