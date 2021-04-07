<?php

namespace App\Imports;

use App\students;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        if (!isset($row[0])) {
            return null;
        }

        return new students([

          'reg_no'    => $row[0],
          'name'      => $row[1],
          'avatar'    => $row[0].'.jpeg',
            //
        ]);
    }

        public function headingRow(): int
    {
        return 1;
    }
}
