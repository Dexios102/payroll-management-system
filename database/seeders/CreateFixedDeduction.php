<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FixedDeduction;


class CreateFixedDeduction extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $deductions = [
            [
               'name'=>'GSIS Per Share',
               'percentage'=>'9',
               'description'=> 'Sample Description',
            ],
            [
                'name'=>'Medicare',
                'percentage'=>'4',
                'description'=> 'Sample Description',
             ],
             [
                'name'=>'Pag-Ibig',
                'percentage'=>'0',
                'description'=> 'Sample Description',
             ],
             [
                'name'=>'Modified Pag-ibig 2',
                'percentage'=>'0',
                'description'=> 'Sample Description',
             ],
             [
                'name'=>'Withholding Tax',
                'percentage'=>'0',
                'description'=> 'Sample Description',
             ],
           
        ];
    
        foreach ($deductions as $key => $deduction) {
            FixedDeduction::create($deduction);
        }
    }
}
