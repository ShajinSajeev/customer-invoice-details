<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InputFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values = [
            [
                'name' => 'text'
            ],
            [
                'name' => 'number'
            ],
            [
                'name' => 'email'
            ],
            [
                'name' => 'select'
            ],
            [
                'name' => 'textarea'
            ],
            [
                'name' => 'date'
            ],

        ];
        foreach ($values as $field) {
            DB::table('input_fields')->updateOrInsert(
                ['name' => $field['name']]
            );
        }
    }
}
