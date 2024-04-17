<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <img class="mx-2" src="{{ asset('images/logo.png') }}" alt="" srcset="" style="height: 3rem"> 
        </x-slot>

        <x-validation-errors class="mb-4" />

        @php
            $countries = App\Models\Country::all();
        @endphp

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            
            <div class="mt-4">
                <x-label for="phone" value="{{ __('Téléphone') }}" />
                <div class="flex items-center mt-2">
                    <select class="rounded-lg mt-1" id="country" name="country">
                        @foreach($countries as $country)
                                <option value="{{$country->id}}">
                                    <div class="flex justify-left">
                                        <img src="{{ asset('flags/'.$country->country_code.'.png') }}" style="height: 0.5rem">
                                        <span>{{ $country->country_code }}(+{{ $country->phone_index }})</span>
                                    </div>
                                </option>
                        @endforeach
                    </select>
                    <div class="relative w-full">
                        <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />

                    </div>
                </div>
            </div>


            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Mot de passe oublié?') }}
                    </a>
                @endif

                <x-button class="ms-4 bg-orange-500">
                    {{ __('Connexion') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
