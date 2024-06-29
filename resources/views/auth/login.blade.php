<x-customer-layout>
    <div class="w-full h-full">
        <x-authentication-card>
            <x-slot name="logo" style="background: #ff7f27">
                <img class="mx-2" src="{{ asset('images/logo.png') }}" alt="" srcset="" style="height: 8rem"> 
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

                
                <div class="mt-8 text-black">
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
                            <x-input id="phone" class="block mt-1 w-full text-black" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />

                        </div>
                    </div>
                </div>


                <div class="mt-8">
                    <x-label for="password" value="{{ __('Password') }}" />
                    <x-input id="password" class="block mt-1 w-full text-black" type="password" name="password" required autocomplete="current-password" />
                </div>

                <div class="block mt-8">
                    <label for="remember_me" class="flex items-center">
                        <x-checkbox id="remember_me" name="remember" />
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="mt-4">
                    <x-button class="w-full">
                        {{ __('Connexion') }}
                    </x-button>
                </div>

                <div class="mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                            {{ __('Mot de passe oublié?') }}
                        </a>
                    @endif                
                </div>
            </form>

            <x-slot name="socials" class=" bg-white shadow-md">
                <div class="w-full h-fit my-4 text-red-500 text-xl font-semibold text-center bg-red-100 shadow-lg rounded-lg px-16 py-4 hover:bg-red-300  cursor-pointer">
                    <a href="{{ route('auth.social', ['provider' => 'google']) }}" >  Continuer avec Google</a>
                </div>
                <div class="w-full h-fit my-4 text-blue-500 text-xl font-semibold text-center bg-blue-100 shadow-lg rounded-lg px-16 py-4 hover:bg-blue-300 cursor-pointer">
                    <a href="{{ route('auth.social', ['provider' => 'facebook']) }}" >  Continuer avec Facebook</a>
                </div>
            </x-slot>

        </x-authentication-card>

    </div>
</x-customer-layout>
