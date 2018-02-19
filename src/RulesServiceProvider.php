<?php

namespace Egeniq\Laravel\Rules;

use Illuminate\Support\ServiceProvider;

class RulesServiceProvider extends ServiceProvider
{
    public function register()
    {
        require_once __DIR__.'/rules.php';
    }
}
