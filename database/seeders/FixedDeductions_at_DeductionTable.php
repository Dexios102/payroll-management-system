<?php

namespace Database\Seeders;

use App\Models\Deduction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FixedDeductions_at_DeductionTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $deductions = [
            [
               'name'=>'GSIS Per Share',
               'code'=>'11111',
               'description'=> 'Sample Description',
               'type'=>'fixed',
               'status'=>'active'
            ],
            [
                'name'=>'Medicare',
                'code'=>'11111',
                'description'=> 'Sample Description',
                'type'=>'fixed',
                'status'=>'active'
             ],
             [
                'name'=>'Pag-Ibig',
                'code'=>'11111',
                'description'=> 'Sample Description',
                'type'=>'fixed',
                'status'=>'active'
             ],
             [
                'name'=>'Withholding Tax',
                'code'=>'11111',
                'description'=> 'Sample Description',
                'type'=>'fixed',
                'status'=>'active'
             ],
            
           
        ];
    
        foreach ($deductions as $key => $deduction) {
            Deduction::create($deduction);
        }
    }
}
