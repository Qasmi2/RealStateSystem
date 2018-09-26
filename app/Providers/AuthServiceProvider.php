<?php

namespace App\Providers;

use App\User;
use App\property;
use App\approval;
use App\Policies\roles;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        User::class => roles::class,
        property::class => roles::class,
        approval::class => roles::class
        
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin-only', 'App\Policies\roles@admin_only');
        Gate::define('user-actions','App\Policies\roles@user_actions');
        Gate::define('financial-actions','App\Policies\roles@financial_only');
        Gate::define('view','App\Policies\roles@view_single');
        Gate::define('create','App\Policies\roles@create_form');
        Gate::define('delete','App\Policies\roles@delete_form');

        // Gate::define('delete', function ($user, $approval) {
        //     var_dump(Json_encode($user));
        //     echo "<br>";
        //     var_dump(Json_encode($approval));
        //     exit();
        //     return $user->id == $property->user_id;
        //   });
        
    }
}
