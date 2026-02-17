<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UasTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_pages_are_accessible()
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        $response = $this->get('/about');
        $response->assertStatus(200);
    }

    public function test_catalogue_shows_products()
    {
        $category = Category::create(['nama_kategori' => 'Electronics']);
        Product::create([
            'name' => 'Laptop',
            'description' => 'Gaming Laptop',
            'category_id' => $category->id
        ]);

        $response = $this->get('/');
        $response->assertSee('Laptop');
        $response->assertSee('Electronics');
    }

    public function test_user_can_register_and_login()
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertRedirect(route('login'));
        $this->assertDatabaseHas('users', ['email' => 'test@example.com']);

        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'password',
        ]);

        $response->assertRedirect('dashboard');
        $this->assertAuthenticated();
    }

    public function test_login_failure_message()
    {
        $response = $this->post('/login', [
            'email' => 'wrong@example.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertSessionHasErrors('email');
    }

    public function test_admin_dashboard_stats()
    {
        $user = User::factory()->create();
        Category::create(['nama_kategori' => 'Cat1']);
        Category::create(['nama_kategori' => 'Cat2']);

        $response = $this->actingAs($user)->get('/dashboard');
        $response->assertStatus(200);
        $response->assertSee('Total Categories');
    }

    public function test_category_management()
    {
        $user = User::factory()->create();

        // Create
        $response = $this->actingAs($user)->post(route('categories.store'), [
            'nama_kategori' => 'New Category',
        ]);
        $response->assertRedirect(route('categories.index'));
        $this->assertDatabaseHas('kategori', ['nama_kategori' => 'New Category']);

        // List
        $response = $this->actingAs($user)->get(route('categories.index'));
        $response->assertSee('New Category');

        // Delete
        $category = Category::where('nama_kategori', 'New Category')->first();
        $response = $this->actingAs($user)->delete(route('categories.destroy', $category));
        $response->assertRedirect(route('categories.index'));
        $this->assertDatabaseMissing('kategori', ['id' => $category->id]);
    }
}
