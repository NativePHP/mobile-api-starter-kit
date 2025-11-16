<?php

namespace App\Livewire\Auth;

use App\Services\ApiClient;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Native\Mobile\Facades\SecureStorage;

class Register extends Component
{
    #[Rule('required|string|max:255')]
    public string $name = '';

    #[Rule('required|email|max:255')]
    public string $email = '';

    #[Rule('required|min:8')]
    public string $password = '';

    #[Rule('required|same:password')]
    public string $password_confirmation = '';

    public string $errorMessage = '';

    public function register(): void
    {
        $this->validate();

        $this->errorMessage = '';

        $response = ApiClient::post('/register', [
            'name' => $this->name,
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
            $errors = $response->json('errors', []);
            $this->errorMessage = $response->json('message', 'Registration failed');

            if (isset($errors['email'])) {
                $this->addError('email', $errors['email'][0]);
            }
        }
    }

    #[Layout('components.layouts.auth')]
    public function render()
    {
        return view('livewire.auth.register');
    }
}
