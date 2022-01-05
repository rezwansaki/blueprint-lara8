<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\PostController
 */
class PostControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $posts = Post::factory()->count(3)->create();

        $response = $this->get(route('post.index'));

        $response->assertOk();
        $response->assertViewIs('post.index');
        $response->assertViewHas('posts');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('post.create'));

        $response->assertOk();
        $response->assertViewIs('post.create');
    }


    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $response = $this->post(route('post.store'));

        $response->assertRedirect(route('post.index'));
        $response->assertSessionHas('post.title', $post->title);

        $this->assertDatabaseHas(posts, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $post = Post::factory()->create();

        $response = $this->get(route('post.show', $post));

        $response->assertOk();
        $response->assertViewIs('post.show');
        $response->assertViewHas('post');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $post = Post::factory()->create();

        $response = $this->get(route('post.edit', $post));

        $response->assertOk();
        $response->assertViewIs('post.edit');
        $response->assertViewHas('post');
    }


    /**
     * @test
     */
    public function update_saves_and_redirects()
    {
        $post = Post::factory()->create();

        $response = $this->put(route('post.update', $post));

        $response->assertRedirect(route('post.index'));
        $response->assertSessionHas('post.title', $post->title);

        $this->assertDatabaseHas(posts, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function destroy_redirects()
    {
        $post = Post::factory()->create();

        $response = $this->delete(route('post.destroy', $post));

        $response->assertRedirect(route('post.index'));
    }
}
