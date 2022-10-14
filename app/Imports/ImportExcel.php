<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\ImportExcelModel;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithHeadingRow;



class ImportExcel implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        $userid = Auth::user()->id;
        foreach($rows as $row)
        {
            ImportExcelModel::create(['user_id'=>$userid,
                                      'name'=>$row['name'],
                                      'mobile'=>$row['mobile'],
                                      'email'=>$row['email'],
                                    ]);
        }
    }
}
