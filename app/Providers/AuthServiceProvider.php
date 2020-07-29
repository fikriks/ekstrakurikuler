<?php

namespace App\Providers;


use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Policies\RohisPolicy;
use App\Models\Rohis;
use App\Policies\FutsalPolicy;
use App\Models\Futsal;
use App\Models\Marching;
use App\Models\Paskibra;
use App\Models\Pmr;
use App\Models\Pramuka;
use App\Models\Seni;
use App\Policies\SilatPolicy;
use App\Models\Silat;
use App\Models\Volly;
use App\Policies\MarchingPolicy;
use App\Policies\PaskibraPolicy;
use App\Policies\PmrPolicy;
use App\Policies\PramukaPolicy;
use App\Policies\SeniPolicy;
use App\Policies\UsersPolicy;
use App\Policies\VollyPolicy;
use App\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Rohis::class => RohisPolicy::class,
        Futsal::class => FutsalPolicy::class,
        Silat::class => SilatPolicy::class,
        Seni::class => SeniPolicy::class,
        Pramuka::class => PramukaPolicy::class,
        Marching::class => MarchingPolicy::class,
        Paskibra::class => PaskibraPolicy::class,
        Pmr::class => PmrPolicy::class,
        Volly::class => VollyPolicy::class,
        User::class => UsersPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
