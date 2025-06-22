<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<nav class="flex justify-end p-4 bg-white shadow-md dark:bg-gray-900">
    <div class="flex space-x-4">
        @auth
        <button
            wire:click="logout"
            class="px-4 py-2 text-sm font-semibold text-white bg-red-600 rounded hover:bg-red-700 transition">
            Logout
        </button>
        @else
        <a wire:navigate
            href="{{ route('login') }}"
            class="px-4 py-2 text-sm font-semibold text-gray-700 bg-gray-200 rounded hover:bg-gray-300 transition">
            Log in
        </a>

        @if (Route::has('register'))
        <a wire:navigate
            href="{{ route('register') }}"
            class="px-4 py-2 text-sm font-semibold text-white bg-green-600 rounded hover:bg-green-700 transition">
            Register
        </a>
        @endif
        @endauth
    </div>
</nav>