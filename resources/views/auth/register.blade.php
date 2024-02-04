<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="teamName" :value="__('Team Name')" />
            <x-text-input id="teamName" class="block mt-1 w-full" type="text" name="teamName" :value="old('teamName')" required autofocus autocomplete="teamName" />
            @error('teamName') <span class="error">{{ $message }}</span> @enderror
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />



            @error('password') <span class="error">{{ $message }}</span> @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            @error('password_confirmation') <span class="error">{{ $message }}</span> @enderror
        </div>

         <!-- User Type -->
         <input type="radio" name="user_type" value="binusian" required> Binusian
         <input type="radio" name="user_type" value="non-binusian" required> Non-Binusian

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already have an account? Login') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Next') }}
            </x-primary-button>
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var radioButtons = document.querySelectorAll('input[name="isBinusian"]');
            radioButtons.forEach(function (radioButton) {
                radioButton.addEventListener('change', function () {
                    // Jika "binusian" dipilih, alihkan ke halaman
                    if (radioButton.value === 'binusian') {
                        window.location.href = '/binusian-register';
                    }
                    // Jika "non_binusian" dipilih, alihkan ke halaman
                    else if (radioButton.value === 'nonbinusian') {
                        window.location.href = '/non-binusian-register';
                    }
                });
            });
        });
    </script>
</x-guest-layout>
