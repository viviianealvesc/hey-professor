<?php

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\assertDatabaseHas;

it('should be able to create a nwe question bigger than 255 caracters', function () {
  
   $user = App\models\User::factory()->create();
   actingAs($user);


   $request = Pest\Laravel\post(route('questions.store'), [
       'question' => str_repeat('*', 260) . '?',
   ]);


   $request->assertRedirect(route('dashboard'));
   assertDatabaseCount('questions', 1);
   assertDatabaseHas('questions', [
       'question' => str_repeat('*', 260) . '?',
   ]);
   
});

it('should check if ends with question mark?', function () {
  
});

it('should have at least 10 characters', function () {
  
});
