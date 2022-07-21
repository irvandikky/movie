<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Movie;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MovieControllerTest extends TestCase
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
    public function it_displays_index_view_with_movies()
    {
        $movies = Movie::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('movies.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.movies.index')
            ->assertViewHas('movies');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_movie()
    {
        $response = $this->get(route('movies.create'));

        $response->assertOk()->assertViewIs('app.movies.create');
    }

    /**
     * @test
     */
    public function it_stores_the_movie()
    {
        $data = Movie::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('movies.store'), $data);

        unset($data['genre_ids']);

        $this->assertDatabaseHas('movies', $data);

        $movie = Movie::latest('id')->first();

        $response->assertRedirect(route('movies.edit', $movie));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_movie()
    {
        $movie = Movie::factory()->create();

        $response = $this->get(route('movies.show', $movie));

        $response
            ->assertOk()
            ->assertViewIs('app.movies.show')
            ->assertViewHas('movie');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_movie()
    {
        $movie = Movie::factory()->create();

        $response = $this->get(route('movies.edit', $movie));

        $response
            ->assertOk()
            ->assertViewIs('app.movies.edit')
            ->assertViewHas('movie');
    }

    /**
     * @test
     */
    public function it_updates_the_movie()
    {
        $movie = Movie::factory()->create();

        $data = [
            'poster_path' => $this->faker->text(255),
            'backdrop_path' => $this->faker->text(255),
            'adult' => $this->faker->boolean,
            'overview' => $this->faker->text,
            'release_date' => $this->faker->date,
            'original_title' => $this->faker->text(255),
            'original_language' => $this->faker->text(255),
            'title' => $this->faker->sentence(10),
            'genre_ids' => [],
            'popularity' => $this->faker->randomNumber(2),
            'vote_count' => $this->faker->randomNumber(0),
            'video' => $this->faker->boolean,
            'vote_average' => $this->faker->randomNumber(2),
        ];

        $response = $this->put(route('movies.update', $movie), $data);

        unset($data['genre_ids']);

        $data['id'] = $movie->id;

        $this->assertDatabaseHas('movies', $data);

        $response->assertRedirect(route('movies.edit', $movie));
    }

    /**
     * @test
     */
    public function it_deletes_the_movie()
    {
        $movie = Movie::factory()->create();

        $response = $this->delete(route('movies.destroy', $movie));

        $response->assertRedirect(route('movies.index'));

        $this->assertModelMissing($movie);
    }
}
