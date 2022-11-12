<?php

namespace Tests\Feature\app\controllers;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
  use RefreshDatabase;

  public function setUp(): void
  {
    parent::setUp();
    $this->withoutExceptionHandling();

    $this->user = User::factory()->createOne();
  }
  /**
   * A basic feature test example.
   *
   * @return void
   */
  public function test_user_login()
  {
    $response = $this->postJson(route('admin.login'), [
      'email'    => $this->user->email,
      'password' => 'password',
    ]);

    $response->assertStatus(200);
    $this->assertAuthenticated($guard = null);
  }

  public function test_user_logout()
  {
    $this->actingAs($this->user);
    $response = $this->getJson(route('admin.logout'));

    $response->assertStatus(200);
    $this->assertDatabaseEmpty('personal_access_tokens');
  }
}
