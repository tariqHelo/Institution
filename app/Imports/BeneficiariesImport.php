<?php

namespace App\Imports;

use App\Models\Beneficiaries;
use Maatwebsite\Excel\Concerns\ToModel;

class BeneficiariesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Beneficiaries([
            'file_no'    =>$row[0],
            'name'      => $row[1],
            'calss'     => $row[2],
            'id_number' => $row[3],
            'phone'     => $row[4],
            'area'      => $row[5],
        ]);
           
    }
}
