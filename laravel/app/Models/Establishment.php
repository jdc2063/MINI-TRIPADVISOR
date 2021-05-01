<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Establishment extends Model
{
    use HasFactory;
    protected $table = "establishment";

    // Créer un établissement avec les informations de la requête
    static function createDTOtoOBJECT($request) {
        $establishment = new Establishment;
        $establishment->name = $request->name;
        $establishment->address = $request->address;
        $establishment->city = $request->city;
        $establishment->ZIP_code = $request->ZIP_code;
        $establishment->country = $request->country;
        if ($request->avatar != NULL) {
            $path = request('avatar')->store('avatars', 'public');
            $path = "/storage/" . $path;
            $establishment->image = $path;
        }
        return($establishment);
    }

    // Modifie l'établissement avec les informations de la requête
    static function updateEstablishment($request) {
        $establishment = Establishment::find($request->id);
        $establishment->name = $request->name;
        $establishment->address = $request->address;
        $establishment->city = $request->city;
        $establishment->ZIP_code = $request->ZIP_code;
        $establishment->country = $request->country;
        if ($request->avatar != NULL) {
            $path = request('avatar')->store('avatars', 'public');
            $path = "/storage/" . $path;
            $establishment->image = $path;
        } else if ($request->delete_image == "on") {
            $path = "/images/icons8-house-52.png";
            $establishment->image = $path;
        }
        return($establishment);
    }
}
