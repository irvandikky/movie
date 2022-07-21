<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Genre;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GenreControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_genres()
    {
        $genres = Genre::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('genres.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.genres.index')
            ->assertViewHas('genres');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_genre()
    {
        $response = $this->get(route('genres.create'));

        $response->assertOk()->assertViewIs('app.genres.create');
    }

    /**
     * @test
     */
    public function it_stores_the_genre()
    {
        $data = Genre::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('genres.store'), $data);

        $this->assertDatabaseHas('genres', $data);

        $genre = Genre::latest('id')->first();

        $response->assertRedirect(route('genres.edit', $genre));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_genre()
    {
        $genre = Genre::factory()->create();

        $response = $this->get(route('genres.show', $genre));

        $response
            ->assertOk()
            ->assertViewIs('app.genres.show')
            ->assertViewHas('genre');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_genre()
    {
        $genre = Genre::factory()->create();

        $response = $this->get(route('genres.edit', $genre));

        $response
            ->assertOk()
            ->assertViewIs('app.genres.edit')
            ->assertViewHas('genre');
    }

    /**
     * @test
     */
    public function it_updates_the_genre()
    {
        $genre = Genre::factory()->create();

        $data = [
            'name' => $this->faker->name,
        ];

        $response = $this->put(route('genres.update', $genre), $data);

        $data['id'] = $genre->id;

        $this->assertDatabaseHas('genres', $data);

        $response->assertRedirect(route('genres.edit', $genre));
    }

    /**
     * @test
     */
    public function it_deletes_the_genre()
    {
        $genre = Genre::factory()->create();

        $response = $this->delete(route('genres.destroy', $genre));

        $response->assertRedirect(route('genres.index'));

        $this->assertModelMissing($genre);
    }
}
