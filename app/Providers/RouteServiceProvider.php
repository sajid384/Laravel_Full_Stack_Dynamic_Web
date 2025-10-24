<?php

namespace App\Providers;

use App\Http\Controllers\PageController;
use App\Models\NavLink;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/dashboard';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });



        parent::boot();

        // Dynamically create routes for active NavLinks
        $navLinks = NavLink::where('is_active', 1)->get();

        // Check if $navLinks is not empty
        if ($navLinks->isEmpty()) {
            dd('No active NavLinks found.');
        }
        // dd($navLinks);

        foreach ($navLinks as $navLink) {

            // dd("Creating route for: " . $navLink->url);

            Route::get($navLink->url, [PageController::class, 'showPage'])
                ->name($navLink->url); // Route ka naam dynamic hoga

            // dd("Route created for: " . $navLink->url);
        }
    }



    /**
     * Define the routes for your application.
     *
     * @return void
     */
    public function map()
    {
        // This method is used to define application-wide routes
        $this->mapWebRoutes();
        // $this->mapApiRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

}
