<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Component
{
    public function __invoke()
    {
        $user = Socialite::driver('github')->user();

        $user = User::updateOrCreate([
            'github_id' => $user->id,
        ], [
            'name' => $user->name,
            'email' => $user->email,
            'github_token' => $user->token,
            'github_refresh_token' => $user->refreshToken,
        ]);

        Auth::login($user);

        return redirect('filament.user.pages.dashboard');
    }
}
