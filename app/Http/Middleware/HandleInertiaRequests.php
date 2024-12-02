<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use Tighten\Ziggy\Ziggy;

class HandleInertiaRequests extends Middleware
{
    protected $rootView = 'app';

    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    public function share(Request $request): array
    {
        return [
            ...parent::share($request),
            'auth' => [
                'user' => $request->user(),
            ],
            'ziggy' => fn () => [
                ...(new Ziggy)->toArray(),
                'location' => $request->url(),
            ],
            'app' => [
                'name' => config('app.name'),
                'url' => config('app.url'),
            ],
            'navigation' => [
                'homepage' => route('homepage'),
                'dashboard' => route('dashboard'),
                'about' => route('about-us'),
                'volunteer' => route('volunteer'),
                'donate' => route('donate'),
                'registerVolunteer' => route('register-volunteer'),
            ],
            'flash' => [
                'message' => fn () => $request->session()->get('message'),
                'success' => fn () => $request->session()->get('success'),
                'error' => fn () => $request->session()->get('error'),
            ],
        ];
    }
}

