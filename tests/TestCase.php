<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;

abstract class TestCase extends BaseTestCase
{
    protected static $migrated = false;

    protected function setUp(): void
    {
        parent::setUp();

        Artisan::call('passport:client --personal');
        if (!static::$migrated) {
            Artisan::call('db:seed');
            static::$migrated = true;
        }
    }
}

