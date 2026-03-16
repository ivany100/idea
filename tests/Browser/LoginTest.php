<?php

use App\Models\User;

it('logs in a user', function (): void {
    User::factory()->create([
        'email' => 'john@example.com',
        'password' => 'asdfasdf',
    ]);

    visit('/login')
        ->fill('email', 'john@example.com')
        ->fill('password', 'asdfasdf')
        ->click('@login-button')
        ->assertPathIs('/');

    $this->assertAuthenticated();
});

it('logs out a user', function (): void {
    $user = User::factory()->create([
        'password' => 'asdfasdf',
    ]);

    $this->actingAs($user);

    visit('/')
        ->click('Log Out');

    $this->assertGuest();
});
