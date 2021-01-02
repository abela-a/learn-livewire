<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function testRegistrationPageContaintsLivewireCompoenent()
    {
        $this->get('/register')
            ->assertSeeLivewire('auth.register');
    }

    public function testCanRegister()
    {
        Livewire::test('auth.register')
            ->set('name', 'Test User')
            ->set('email', 'user@test.test')
            ->set('password', 'secret')
            ->set('passwordConfirmation', 'secret')
            ->call('register')
            ->assertRedirect('/');

        $this->assertTrue(User::whereEmail('user@test.test')->exists());
        $this->assertEquals('user@test.test', auth()->user()->email);
    }

    public function testEmailIsRequired()
    {
        Livewire::test('auth.register')
            ->set('name', 'Test User')
            ->set('email', '')
            ->set('password', 'secret')
            ->set('passwordConfirmation', 'secret')
            ->call('register')
            ->assertHasErrors(['email' => 'required']);
    }

    public function testEmailIsValidEmail()
    {
        Livewire::test('auth.register')
            ->set('name', 'Test User')
            ->set('email', 'user')
            ->set('password', 'secret')
            ->set('passwordConfirmation', 'secret')
            ->call('register')
            ->assertHasErrors(['email' => 'email']);
    }

    public function testEmailHasntTakenAlready()
    {
        User::create([
            'name' => 'Testing User',
            'email' => 'user@test.test',
            'password' => bcrypt('secret'),
        ]);

        Livewire::test('auth.register')
            ->set('name', 'Test User')
            ->set('email', 'user@test.test')
            ->set('password', 'secret')
            ->set('passwordConfirmation', 'secret')
            ->call('register')
            ->assertHasErrors(['email' => 'unique']);
    }

    public function testSeeEmailHasntAlreadyBeenTakenValidationMessageAsUserType()
    {
        User::create([
            'name' => 'Testing User',
            'email' => 'user@test.test',
            'password' => bcrypt('secret'),
        ]);

        Livewire::test('auth.register')
            ->set('name', 'Test User')
            ->set('email', 'use@test.test')
            ->assertHasNoErrors()
            ->set('email', 'user@test.test')
            ->assertHasErrors(['email' => 'unique']);
    }

    public function testPasswordIsRequired()
    {
        Livewire::test('auth.register')
            ->set('name', 'Test User')
            ->set('email', 'user@test.test')
            ->set('password', '')
            ->set('passwordConfirmation', 'secret')
            ->call('register')
            ->assertHasErrors(['password' => 'required']);
    }

    public function testPasswordIsMinimumOfSixCharacters()
    {
        Livewire::test('auth.register')
            ->set('name', 'Test User')
            ->set('email', 'user@test.test')
            ->set('password', '123')
            ->set('passwordConfirmation', 'secret')
            ->call('register')
            ->assertHasErrors(['password' => 'min']);
    }

    public function testPasswordMatchesPasswordConfirmation()
    {
        Livewire::test('auth.register')
            ->set('name', 'Test User')
            ->set('email', 'user@test.test')
            ->set('password', '123')
            ->set('passwordConfirmation', 'secret')
            ->call('register')
            ->assertHasErrors(['password' => 'same']);
    }
}
