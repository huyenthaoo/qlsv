<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         // Các lựa chọn cho ngành
         $nganhs = ['KTPM', 'HTTT', 'ANM', 'CNTT'];
         $nganh = $this->faker->randomElement($nganhs); // Chọn ngẫu nhiên ngành
         $lop = $nganh . rand(1, 4); // Tạo lớp từ ngành và số ngẫu nhiên từ 1 đến 4
         return [
            'ten' => $this->faker->name(), // Tên người thật
            'lop' => $lop,                 // Lớp theo format yêu cầu
            'khoa' => 'Khoa Công nghệ thông tin', // Cố định khoa
            'nganh' => $nganh,             // Ngành đã chọn
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
