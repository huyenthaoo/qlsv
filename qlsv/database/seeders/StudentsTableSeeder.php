<?php

namespace Database\Seeders;
use App\Models\Student;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Tạo 20 bản ghi ngẫu nhiên cho bảng students
         Student::factory()->count(20)->create();
    }
}
