<?php

namespace App\Livewire\Auth;

use App\Services\ApiClient;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Native\Mobile\Facades\SecureStorage;

class Login extends Component
{
    #[Rule('required|email')]
    public string $email = '';

    #[Rule('required')]
    public string $password = '';

    public string $errorMessage = '';

    public function login(): void
    {
        $this->validate();

        $this->errorMessage = '';

        $response = ApiClient::post('/login', [
            'email' => $this->email,
            'password' => $this->password,
        ]);

        if ($response->successful()) {
            $data = $response->json();

            SecureStorage::set('api_token', $data['token']);
            SecureStorage::set('user_id', $data['user']['id']);
            SecureStorage::set('user_name', $data['user']['name']);
            SecureStorage::set('user_email', $data['user']['email']);

            $this->redirect(route('home'));
        } else {
            $this->errorMessage = $response->json('message', 'Invalid credentials');
        }
    }

    #[Layout('components.layouts.auth')]
    public function render()
    {
        return view('livewire.auth.login');
    }
}
