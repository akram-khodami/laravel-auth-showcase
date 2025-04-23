<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Client;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    private function validUserData(array $overrides = []): array
    {
        return array_merge([
            'name' => 'Akram Khodami',
            'email' => 'akram.khodami@gmail.com',
            'password' => '123456789',
            'password_confirmation' => '123456789',
        ], $overrides);
    }


    public function test_it_registers_a_user_with_valid_data()
    {
        $response = $this->postJson('/api/register', $this->validUserData());

        $response->assertCreated();

        $response->assertJsonStructure([
            'message',
            'access_token',
            'token_type',
            'expires_at',
            'user' => ['id', 'name', 'email']
        ]);

        $this->assertDatabaseHas('users', ['email' => 'akram.khodami@gmail.com']);

        $user = User::where([['email', '=', 'akram.khodami@gmail.com']])->first();

        $this->assertTrue($user->hasRole('user','web'));
    }


    public function test_it_fails_if_passwords_do_not_match()
    {
        $response = $this->postJson('/api/register', $this->validUserData([
            'password_confirmation' => 'wrong_password',
        ]));

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['password']);
    }


    public function test_it_fails_if_email_is_already_taken()
    {
        User::factory()->create([
            'email' => 'akram.khodami@gmail.com',
        ]);

        $response = $this->postJson('/api/register', $this->validUserData());

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['email']);
    }


    public function test_it_requires_name_email_and_password()
    {
        $response = $this->postJson('/api/register', []);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['name', 'email', 'password']);
    }
}
