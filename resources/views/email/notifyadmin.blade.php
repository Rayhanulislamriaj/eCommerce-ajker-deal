<x-mail::message>
    # Congratulations

    Your account has been created!

    <x-mail::button :url="url('login')" color="success">
        Click Here to Login
    </x-mail::button>

    <x-mail::panel>
        Email: {{ $email }}
    </x-mail::panel>
    <x-mail::panel>
        Password: {{ $random_password }}
    </x-mail::panel>


    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>
