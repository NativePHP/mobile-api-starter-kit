<?php

namespace App\Livewire;

use App\Services\ApiClient;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Native\Mobile\Facades\Dialog;
use Native\Mobile\Facades\SecureStorage;

class Profile extends Component
{
    #[Rule('required|string|max:255')]
    public string $name = '';

    #[Rule('required|email|max:255')]
    public string $email = '';

    #[Rule('required')]
    public string $current_password = '';

    #[Rule('required|min:8')]
    public string $password = '';

    #[Rule('required|same:password')]
    public string $password_confirmation = '';

    public function mount(): void
    {
        $this->name = SecureStorage::get('user_name', '');
        $this->email = SecureStorage::get('user_email', '');
    }

    public function updateProfile(): void
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $response = ApiClient::put('/user/profile', [
            'name' => $this->name,
            'email' => $this->email,
        ]);

        if ($response->successful()) {
            $data = $response->json();

            SecureStorage::set('user_name', $data['user']['name']);
            SecureStorage::set('user_email', $data['user']['email']);

            Dialog::toast('Profile updated successfully');
        } else {
            $errors = $response->json('errors', []);

            Dialog::toast($response->json('message', 'Failed to update profile'));

            if (isset($errors['email'])) {
                $this->addError('email', $errors['email'][0]);
            }
        }
    }

    public function updatePassword(): void
    {
        $this->validate([
            'current_password' => 'required',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
        ]);

        $response = ApiClient::put('/user/password', [
            'current_password' => $this->current_password,
            'password' => $this->password,
            'password_confirmation' => $this->password_confirmation,
        ]);

        if ($response->successful()) {
            Dialog::toast('Password updated successfully');

            $this->current_password = '';
            $this->password = '';
            $this->password_confirmation = '';
        } else {
            $errors = $response->json('errors', []);

            Dialog::toast($response->json('message', 'Failed to update password'));

            if (isset($errors['current_password'])) {
                $this->addError('current_password', $errors['current_password'][0]);
            }
        }
    }

    #[Layout('components.layouts.app', ['title' => 'Profile'])]
    public function render()
    {
        return view('livewire.profile');
    }
}
