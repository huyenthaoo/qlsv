<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    // Khai báo các cột có thể thêm dữ liệu bằng Factory
    protected $fillable = [
        'ten', 
        'lop', 
        'khoa', 
        'nganh'
    ];
}
