<?php

namespace App\Livewire;

use App\Services\ApiClient;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Native\Mobile\Facades\SecureStorage;

class Home extends Component
{
    public string $userName = '';
    public string $userEmail = '';

    public function mount(): void
    {
        $this->userName = SecureStorage::get('user_name', 'User');
        $this->userEmail = SecureStorage::get('user_email', '');
    }

    public function logout(): void
    {
        ApiClient::logout();
        $this->redirect(route('login'));
    }

    #[Layout('components.layouts.app', ['title' => 'Home'])]
    public function render()
    {
        return view('livewire.home');
    }
}
