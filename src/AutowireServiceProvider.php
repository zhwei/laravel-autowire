<?php

namespace Zhwei\LaravelAutowire;

use Illuminate\Support\ServiceProvider;

class AutowireServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->afterResolving(AutowireAble::class, function ($instance) {
            AutowireInjector::inject($this->app, $instance);
        });
    }
}
