<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Native\Mobile\Events\Biometric\Completed;
use Native\Mobile\Facades\Biometrics;
use Native\Mobile\Facades\SecureStorage;

class Check extends Component
{
    public function mount()
    {
        if($this->isSecure){
            Biometrics::promptForBiometricID();
        }else{
            $this->redirectRoute('login');
        }
    }

    #[On('native:'.Completed::class)]
    public function handleBiometricAuth(bool $success)
    {
        if ($success) {
            return redirect()->route('home');
        }
    }

    #[Computed]
    public function isSecure()
    {
        return ! blank(SecureStorage::get('api_token'));
    }

    #[Layout('components.layouts.auth')]
    public function render()
    {
        return view('livewire.auth.check');
    }
}
