<?php

namespace App\Services;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use Native\Mobile\Edge\Edge;
use Native\Mobile\Facades\SecureStorage;

class ApiClient
{
    protected static function baseUrl(): string
    {
        return config('services.api.url', 'http://localhost:8000');
    }

    protected static function client(): PendingRequest
    {
        $token = SecureStorage::get('api_token');

        return Http::baseUrl(static::baseUrl() . '/api')
            ->acceptJson()
            ->when($token, fn ($http) => $http->withToken($token))
            ->timeout(30);
    }

    public static function get(string $endpoint, array $query = [])
    {
        return static::client()->get($endpoint, $query);
    }

    public static function post(string $endpoint, array $data = [])
    {
        return static::client()->post($endpoint, $data);
    }

    public static function put(string $endpoint, array $data = [])
    {
        return static::client()->put($endpoint, $data);
    }

    public static function delete(string $endpoint, array $data = [])
    {
        return static::client()->delete($endpoint, $data);
    }

    public static function isAuthenticated(): bool
    {
        return !empty(SecureStorage::get('api_token'));
    }

    public static function logout(): void
    {
        static::post('/logout');
        SecureStorage::delete('api_token');
        SecureStorage::delete('user_name');
        SecureStorage::delete('user_email');
        nativephp_call('Edge.Set', json_encode(['components' => []]));
//        Edge::clear();
    }
}
