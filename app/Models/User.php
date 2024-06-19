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

    public function lifeTimeSubscribed(): bool
    {
        return $this->lifetime_access;
    }

    public function monthlySubscribed(): bool
    {
        if ($this->subscription('Nody Builder')->stripe_price === Product::where('type', 'monthly')->first()->stripe_id) {
            return true;
        } else {
            return false;
        }
    }

    public function yearlySubscribed(): bool
    {
        if ($this->subscription('Nody Builder')->stripe_price === Product::where('type', 'yearly')->first()->stripe_id) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role',
        'lifetime_access',
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
