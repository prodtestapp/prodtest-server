<?php

use App\Models\User;

it('Unauthorized projects list', function () {
    $response = $this->get('/api/projects');

    $response->assertStatus(401);
});

it('Authorized projects list', function () {
    $user = User::factory()->create();
    $response = $this->actingAs($user)->get('/api/projects');

    $response->assertStatus(200);
});
