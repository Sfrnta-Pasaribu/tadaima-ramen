<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pengaturan Akun') }}
        </h2>
    </x-slot>

    <div class="pt-32 pb-14">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <div class="p-8 bg-white shadow-sm rounded-xl border border-gray-100">
                @include('profile.partials.update-profile-information-form')
            </div>

            <div class="p-8 bg-white shadow-sm rounded-xl border border-gray-100">
                @include('profile.partials.update-password-form')
            </div>

            <div class="p-8 bg-white shadow-sm rounded-xl border border-gray-100">
                @include('profile.partials.delete-user-form')
            </div>

        </div>
    </div>
</x-app-layout>