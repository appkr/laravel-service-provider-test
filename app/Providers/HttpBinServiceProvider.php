<?php

namespace App\Providers;

use App\HttpBinService;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Uri;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class HttpBinServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register()
    {
        Log::info("called OUTSIDE OF the bind() method");
        $this->app->bind(HttpBinService::class, function (Application $app) {
            Log::info("called INSIDE OF the bind() method");
            $httpClient = new Client([
                'base_uri' => new Uri('https://httpbin.org')
            ]);

            return new HttpBinService($httpClient);
        });
    }

    public function provides(): array
    {
        return [HttpBinService::class];
    }
}
