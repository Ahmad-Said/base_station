<?php

namespace App\Providers;

use View;
use Jenssegers\Agent\Agent;
use Illuminate\Support\ServiceProvider;

class AgentServiceProvider extends ServiceProvider
{
    /**
     * Boot function
     *
     * @return void
     */
    public function boot()
    {
        $agent = new Agent();

        View::share('agent', $agent);
    }

    /**
     * Register function
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
