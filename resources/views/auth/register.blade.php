<x-guest-layout>
    <div class="w-full h-full bg-red" style="background: #ff7f27">
        <x-authentication-card>
            <x-slot name="logo" style="background: #ff7f27">
                <img class="mx-2" src="{{ asset('images/logo.png') }}" alt="" srcset="" style="height: 8rem"> 
            </x-slot>
    
            <x-validation-errors class="mb-4" />
    
            @php
                $countries = App\Models\Country::all();
            @endphp
    
            <form method="POST" action="{{ route('register') }}">
                @csrf
    
                <div>
                    <x-label for="nom" value="{{ __('Nom') }}" />
                    <x-input id="nom" class="block mt-1 w-full" type="text" name="nom" :value="old('nom')" required autofocus autocomplete="name" />
                </div>
                
                <div>
                    <x-label for="prenoms" value="{{ __('Prenoms') }}" />
                    <x-input id="prenoms" class="block mt-1 w-full" type="text" name="prenoms" :value="old('prenoms')" required autofocus autocomplete="name" />
                </div>
    
                <div class="mt-4">
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                </div>
    
                <div class="mt-4">
                    <x-label for="phone" value="{{ __('Téléphone') }}" />
                    <div class="flex items-center mt-2">
                        <select id="country" name="country">
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
                    <x-label for="password" value="{{ __('Mot de passe') }}" />
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                </div>
    
                <div class="mt-4">
                    <x-label for="password_confirmation" value="{{ __('Confirmez le mot de passe') }}" />
                    <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>
    
                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4">
                        <x-label for="terms">
                            <div class="flex items-center">
                                <x-checkbox name="terms" id="terms" required />
    
                                <div class="ms-2">
                                    {!! __('J\'ai lu et J\'accepte :terms_of_service et :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Les conditions d\'utilisations').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('La politique de confidentialitée').'</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-label>
                    </div>
                @endif
    
                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                        {{ __('Déjâ inscript?') }}
                    </a>
    
                    <x-button class="ms-4 bg-orange-500">
                        {{ __('Inscription') }}
                    </x-button>
                </div>
            </form>
        </x-authentication-card>
    </div>
</x-guest-layout>
