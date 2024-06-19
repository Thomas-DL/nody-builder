<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function __invoke()
    {
        $githubUser = Socialite::driver('github')->user();

        $user = User::where('email', $githubUser->email)->first();

        if ($user) {
            $user->github_id = $githubUser->id;
            $user->github_token = $githubUser->token;
            $user->github_refresh_token = $githubUser->refreshToken;
            $user->save();
            Auth::login($user);
            return redirect()->route('filament.user.pages.dashboard');
        } else {
            $user = User::create([
                'github_id' => $githubUser->id,
                'name' => $githubUser->name,
                'username' => $githubUser->nickname,
                'email' => $githubUser->email,
                'password' => bcrypt($githubUser->token),
                'github_token' => $githubUser->token,
                'github_refresh_token' => $githubUser->refreshToken,
                'lifetime_access' => 0,
            ]);
            Auth::login($user);
            return redirect()->route('filament.user.pages.dashboard');
        }
    }
}
