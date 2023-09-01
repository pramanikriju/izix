<?php
use App\Models\User;
use App\Models\Article;
use function Pest\Laravel\{actingAs};

test('home page', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

test('authenticated user can access the dashboard', function () {
    $user = User::factory()->create();

    actingAs($user)->get('/dashboard')
        ->assertStatus(200);
});

test('articles can be accessed', function () {
    $user = User::factory()->create();
    $article = Article::factory()->create();

    actingAs($user)->get('/' . $article->id)
        ->assertStatus(200);
});
