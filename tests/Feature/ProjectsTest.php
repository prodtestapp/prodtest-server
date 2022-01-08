<?php

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;

uses(DatabaseTransactions::class);

it('Unauthorized projects list', function () {
    $response = $this->get('/api/projects');

    $response->assertStatus(401);
});

it('Authorized projects list', function () {
    $user = User::factory()->create();
    $response = $this->actingAs($user)->get('/api/projects');

    $response->assertStatus(200);
});

it('Create project', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('/api/projects', [
        'name' => 'Test Project',
    ]);

    $response->assertStatus(201);
    $response->assertJsonCount(1, 'data.environments');
    $response->assertJsonStructure([
        'data' => [
            'id',
            'name',
            'background_color',
            'cases_count',
            'environments' => [
                '*' => [
                    'id',
                ],
            ],
            'created_at',
            'updated_at',
        ],
    ]);
});
