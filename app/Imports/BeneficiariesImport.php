<?php

namespace App\Imports;

use App\Models\Beneficiaries;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use DB;
class BeneficiariesImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
      DB::table('beneficiaries')->truncate();
        foreach ($rows as $row) 
        {   
            if($row[1] == null):
                    //dd(20);
                continue;
            endif;
            Beneficiaries::create([
                'file_no'   => $row[0],
                'name'      => $row[1],
                'calss'     => $row[2],
                'id_number' => $row[3],
                'phone'     => $row[4],
                'area'      => $row[5],
            ]);
        }
    }
}
