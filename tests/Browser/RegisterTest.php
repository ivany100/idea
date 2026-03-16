<?php

use Illuminate\Support\Facades\Auth;

it('registers a user', function (): void {
    visit('/register')
        ->fill('name', 'john doe')
        ->fill('email', 'john@example.com')
        ->fill('password', 'asdfasdf')
        ->click('Create Account')
        ->assertPathIs('/');

    $this->assertAuthenticated();

    expect(Auth::user())->toMatchArray([
        'name' => 'john doe',
        'email' => 'john@example.com',
    ]);
});

it('requires an email address', function (): void {
    visit('/register')
        ->fill('name', 'john doe')
        ->fill('email', 'john1234')
        ->fill('password', 'asdfasdf')
        ->click('Create Account')
        ->assertPathIs('/register');

    $this->assertGuest();
});
