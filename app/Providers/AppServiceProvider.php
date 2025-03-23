<?php

namespace App\Providers;

use App\Helpers\AliasHelper;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        /*$config = $this->app['config'];
        $modelAliases = AliasHelper::generateModelAliases();
        $allAliases = array_merge(
            $config->get('app.aliases', []),
            $modelAliases
        );
        dd($allAliases);
        $config->set('app.aliases', $allAliases);*/
    }
}
