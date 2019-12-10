<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManageProject extends Model
{
    protected $table = 'manage_project';
    protected $fillable = ['nama_project', 'deskripsi', 'tanggal_awal', 'tanggal_akhir'];
}
