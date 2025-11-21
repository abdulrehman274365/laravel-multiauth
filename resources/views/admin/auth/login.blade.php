
<x-admin-guest-layout>
    <x-auth-card >
        <x-slot name="logo">
            
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

      
        <div class="flex flex-col items-center">
    <a href="/">
        <img src="{{ url('web/assets/images/trurefund.png') }}" 
             style="max-width: 200px;" 
             alt="Logo" 
             class="mx-auto">
    </a>
    <h2 class="text-4xl font-bold text-center mt-4">Admin Login</h2>
</div>

  <!-- Validation Errors -->
  <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form method="POST" action="{{ route('admin.login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

           

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a style="display:none" class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('admin.password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-admin-guest-layout>
