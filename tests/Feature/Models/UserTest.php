<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        //Proceso
        //Revisa que el usuario exista en la tabla usuarios

        $this->assertDatabaseHas('users', [
            'email' => 'i@admin.com'
        ]);

        $this->assertDatabaseMissing('users',[
            'email' => 'no@existe.com'
        ]);
    }
}
