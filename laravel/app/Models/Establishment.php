<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Establishment extends Model
{
    use HasFactory;
    protected $table = "establishment";

    static function createDTOtoOBJECT($request) {
        $establishment = new Establishment;
        $establishment->name = $request->name;
        $establishment->address = $request->address;
        $establishment->city = $request->city;
        $establishment->ZIP_code = $request->ZIP_code;
        $establishment->country = $request->country;
        return($establishment);
    }
}
