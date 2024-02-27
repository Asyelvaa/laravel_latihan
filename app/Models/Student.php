<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'nis',
        'nama',
        'tanggal_lahir',
        'grade_id',
        'alamat',
    ];

    public function grade()
    {
        return $this->belongsTo(Grades::class, 'grade_id');
    }
    
}
