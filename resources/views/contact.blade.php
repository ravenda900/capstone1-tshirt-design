<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('contact.store') }}">
            @csrf

            <!-- Sbuject -->
            <div>
                <x-label for="subject" :value="__('Subject')" />

                <x-input id="subject" class="block mt-1 w-full" type="text" name="subject" :value="old('subject')" required autofocus />
            </div>

            <!-- Name -->
            <div class="mt-4">
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Message -->
            <div class="mt-4">
                <x-label for="message" :value="__('Message')" />

                <x-textarea id="message" class="block mt-1 w-full"
                                name="message"
                                required />
            </div>

            @if (session('status') == 'contact-message-sent')
                <div class="my-4 font-medium text-sm text-green-600">
                    {{ __('Your message has been sent.') }}
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Submit') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
