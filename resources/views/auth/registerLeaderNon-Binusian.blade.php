<x-guest-layout>
    <form method="POST" action="{{ route('/non-binusian-register') }}" enctype="multipart/form-data">
        @csrf

         <!-- Leader Name -->
         <div>
            <x-input-label for="fullName" :value="__('Leader Full Name')" />
            <x-text-input id="fullName" class="block mt-1 w-full" type="text" name="fullName" :value="old('fullName')" required autofocus autocomplete="fullName" />
            @error('fullName') <span class="error">{{ $message }}</span> @enderror
        </div>

         <!-- Email -->
         <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="email" />
            @error('email') <span class="error">{{ $message }}</span> @enderror
        </div>

        <!-- WhatsApp Number -->
        <div>
            <x-input-label for="whatsappNumber" :value="__('WhatsApp Number')" />
            <x-text-input id="whatsappNumber" class="block mt-1 w-full" type="text" name="whatsappNumber" :value="old('whatsappNumber')" required autofocus autocomplete="whatsappNumber" />
            @error('whatsappNumber') <span class="error">{{ $message }}</span> @enderror
        </div>

        <!-- LINE ID -->
        <div>
            <x-input-label for="lineID" :value="__('LINE ID')" />
            <x-text-input id="lineID" class="block mt-1 w-full" type="text" name="lineID" :value="old('lineID')" required autofocus autocomplete="lineID" />
            @error('lineID') <span class="error">{{ $message }}</span> @enderror
        </div>

        <!-- Github/Gitlab ID -->
        <div>
            <x-input-label for="github" :value="__('Github/Gitlab ID')" />
            <x-text-input id="github" class="block mt-1 w-full" type="text" name="github" :value="old('github')" required autofocus autocomplete="github" />
            @error('github') <span class="error">{{ $message }}</span> @enderror
        </div>

        <!-- Birth Place -->
        <div>
            <x-input-label for="birthPlace" :value="__('Birth Place')" />
            <x-text-input id="birthPlace" class="block mt-1 w-full" type="text" name="birthPlace" :value="old('birthPlace')" required autofocus autocomplete="birthPlace" />
            @error('birthPlace') <span class="error">{{ $message }}</span> @enderror
        </div>

        <!-- Birth Date -->
        <div>
            <x-input-label for="birthDate" :value="__('Birth Date')" />
            <x-text-input id="birthDate" class="block mt-1 w-full" type="date" name="birthDate" :value="old('birthDate')" required autofocus autocomplete="birthDate" />
            @error('birthDate') <span class="error">{{ $message }}</span> @enderror
        </div>

        <!-- Curriculum Vitae (CV) -->
        <div>
            <x-input-label for="cv" :value="__('Curriculum Vitae (CV)')" />
            <x-text-input id="cv" class="block mt-1 w-full" type="file" name="cv" :value="old('cv')" required autofocus autocomplete="cv" />
            @error('cv') <span class="error">{{ $message }}</span> @enderror
        </div>

        <!-- ID Card -->
        <div>
            <x-input-label for="idCard" :value="__('ID Card (Non-Binusian)')" />
            <x-text-input id="idCard" class="block mt-1 w-full" type="file" name="idCard" :value="old('idCard')" required autofocus autocomplete="idCard" />
            <@error('idCard') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
