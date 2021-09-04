<?php

namespace App\Models;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Facades\Excel;

class BeneficiariesImport extends ToModel
{  
    use HasFactory;

   /**
     * @param array $row
     *
     * @return User|null
     */
    public function model(array $row)
    {  dd(20);
      
    }


    // public function collection(Collection $collection)
    // {   
    //     dd(1111);
    //     // DB::table('students')->truncate();
    //     foreach($collection as $key => $value)
    //     {
            
    //         if($key > 0)
    //         {
    //             if($value[1] == null):
    //                 continue;
    //             endif;
    //             DB::table('students')->insert([
    //                 //'id'	    =>$value[0]
    //                  'numberId'     => $value[1]
    //                  ,'name'        => $value[2]
    //                  ,'email'       => $value[3]
    //                  ,'mobile'      => $value[4]
    //                  ,'class'       => $value[5]
    //                  ,'school'      => $value[6]                   
    //             ]);
                  

    //         }
    //     }
    // }
}
