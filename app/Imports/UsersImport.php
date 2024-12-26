<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            //
            
            'id'=>$row[0],
            'email'=>$row[1],
            'password'=>$row[2],
            'mobile'=>$row[3],
            'gender'=>$row[4],
            'city'=>$row[5],
            'hobby'=>$row[6],
            'created_at'=>$row[7],
            'updated_at'=>$row[8],
            'country'=>$row[9],
            'state'=>$row[10],
            'name'=>$row[11],
            'image'=>$row[12],
        ]);
    }
}
