<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'photo' => 'required'
        ]);

        //Se sube el archivo a la carpeta profiles.
        //Es la carpeta /storage/framework/testing/disks/local/profiles
        $request->file('photo')->store('profiles');
    
        return redirect('profile');
    }
}
