<x-layout.layout>
    <x-form.form
        title="Log in"
        description="Glad to have you back."
    >
        <form action="/login" method="POST" class="mt-10 space-y-4">
            @csrf

            <x-form.field name="email" label="Email" type="email" />

            <x-form.field name="password" label="Password" type="password" />

            <button class="btn mt-2 h-10 w-full" type="submit">Sign In</button>
        </form>
    </x-form.form>
</x-layout.layout>
