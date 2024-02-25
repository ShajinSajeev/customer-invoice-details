<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\InputField;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $inputs = InputField::select('name','id')->pluck('id','name');
        $values = [
            [
                'type' => 'customer',
                'label' => 'name',
                'input_field' => $inputs['text']
            ],
            [
                'type' => 'customer',
                'label' => 'phone',
                'input_field' =>$inputs['number']
            ],
            [
                'type' => 'customer',
                'label' => 'email',
                'input_field' =>$inputs['email']
            ],
            [
                'type' => 'customer',
                'label' => 'address',
                'input_field' =>$inputs['textarea']
            ],
            [
                'type' => 'invoice',
                'label' => 'name',
                'input_field' =>$inputs['select']
            ],
            [
                'type' => 'invoice',
                'label' => 'date',
                'input_field' =>$inputs['date']
            ],
            [
                'type' => 'invoice',
                'label' => 'amount',
                'input_field' =>$inputs['number']
            ],
            [
                'type' => 'invoice',
                'label' => 'status',
                'input_field' =>$inputs['select']
            ],

        ];
        foreach ($values as $field) {
            DB::table('types')->updateOrInsert(
                ['type' => $field['type'], 'label' => $field['label']],
                $field
            );
        }
    }
}
