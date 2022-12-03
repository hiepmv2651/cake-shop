<?php

namespace Tests\test;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/show_cart');

        $response->assertStatus(302);
    }

    public function test_login_form()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    //TODO:
    public function test_user_duplication()
    {
        $user1 = User::make([
            'name' => 'Văn Hiệp',
            'email' => 'hiepmv@gmail.com',
        ]);

        $user2 = User::make([
            'name' => 'Tấn Khuê',
            'email' => 'khuevt@gmail.com',
        ]);

        $user3 = User::make([
            'name' => 'Văn Khánh',
            'email' => 'khanhtv@gmail.com',
        ]);

        $this->assertTrue($user1->name != $user2->name);
    }

    // public function test_delete_user()
    // {
    //     $user = User::factory()->count(1)->make();
    //     $user = User::first();

    //     if ($user)
    //         $user->delete();

    //     $this->assertTrue(true);
    // }

    //TODO: HTTP testing
    public function test_it_stores_new_user()
    {
        $response = $this->post('register', [
            'name' => 'Văn Hiệp',
            'email' => 'hiepmv@gmail.com',
            'phone' => '123',
            'address' => '123',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'gender' => 'nam',
        ]);

        $response->assertRedirect('/redirect');
    }

    //TODO: Database testing
    public function test_database()
    {
        //TODO: tồn tại
        $this->assertDatabaseHas('users', [
            'name' => 'nguyen a',
        ]);

        //TODO: không tồn tại
        // $this->assertDatabaseMissing('users', [
        //     'name' => 'nguyen a',
        // ]);
    }

    //TODO: Seeder testing
    public function test_if_seeders_works()
    {
        $this->seed();
    }
}