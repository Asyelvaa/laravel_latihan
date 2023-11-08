<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students 
{
    private static $students = [
        [
            "id" => 1,
            "nis" => "009876",
            "nama" => "Asyella",
            "kelas" => "11 PPLG 2",
            "alamat" => "jawa tengah"
        ],
        [
            "id" => 2,
            "nis" => "009877",
            "nama" => "Asyella2",
            "kelas" => "11 PPLG 2",
            "alamat" => "jawa tengah"
        ],
        [
            "id" => 3,
            "nis" => "009878",
            "nama" => "Asyella3",
            "kelas" => "11 PPLG 2",
            "alamat" => "jawa tengah"
        ],
        [
            "id" => 4,
            "nis" => "009879",
            "nama" => "Asyella4",
            "kelas" => "11 PPLG 2",
            "alamat" => "jawa tengah"
        ],
        [
            "id" => 5,
            "nis" => "009880",
            "nama" => "Asyella5",
            "kelas" => "11 PPLG 2",
            "alamat" => "jawa tengah"
        ]
    ];

    public static function all(){
        return collect(self::$students);
    }
}
