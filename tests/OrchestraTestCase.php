<?php

namespace Marketplaceful\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Marketplaceful\MarketplacefulServiceProvider;
use Orchestra\Testbench\TestCase;
use Spatie\SchemalessAttributes\SchemalessAttributesServiceProvider;

class OrchestraTestCase extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Marketplaceful\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            MarketplacefulServiceProvider::class,
            SchemalessAttributesServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        $app['migrator']->path(__DIR__.'/../database/migrations');

        $app['config']->set('database.default', 'testbench');

        $app['config']->set('database.connections.testbench', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }
}
