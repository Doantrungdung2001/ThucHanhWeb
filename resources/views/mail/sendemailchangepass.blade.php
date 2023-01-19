<x-mail::message>
# Email change

Nhan vao day de doi email

<button>
    <a href="{{ route('change-email') }}">Change</a>
</button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
