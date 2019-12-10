<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
// use Illuminate\Support\Facades\Mail;

class UsersImport implements ToModel
{

    public $manage_project_id;

    public function __construct($id)
    {
        $this->manage_project_id = $id;

    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        return new User([
            'name'     => $row[0],
            'email'    => $row[1], 
            'password' => \Hash::make($row[0].'123'),
            'manage_project_id' => $this->manage_project_id
        ]);
    }
}
