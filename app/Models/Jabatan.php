<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table      = "das_jabatan";

    protected $fillable = ['nama_jabatan', 'parent_id'];

    public function parent()
    {
        return $this->belongsTo('App\Models\Jabatan', 'parent_id')->select(['nama_jabatan']);
    }

    public function childs() {
        return $this->hasMany('App\Models\Jabatan','parent_id','id');
    }

    public function pegawai()
    {
        return $this->hasMany('App\Models\Pegawai', 'jabatan_id','id')->select(['jabatan_id','nama_pegawai']);
    }

    public function children(){
        return $this->childs()->with('children','pegawai');
    }

}
