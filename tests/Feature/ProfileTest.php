<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ProfileTest extends TestCase
{
    public function testUpload()
    {
        $response = $this->get('/');

        //Se indica que se esta trabajando con una configuracion falsa
        Storage::fake('local');

        //Que pasa cuando la gente entra a traves de post a la ruta profile
        $response = $this->post('profile', [
            'photo' => $photo = UploadedFile::fake()->image('photo.png')
        ]);

        //Revisa que el archivo exista en el disco local
        Storage::disk('local')->assertExists("profiles/{$photo->hashName()}");

        $response->assertRedirect('profile');
    }

    public function test_photo_required()
    {
        $response = $this->post('profile', ['photo' => '']);

        //La sesion deberia tener el mensaje de error de que no se ha enviado la foto
        $response->assertSessionHasErrors('photo');
    }
}
