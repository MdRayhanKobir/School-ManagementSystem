<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignSubject extends Model
{
    use HasFactory;

    public function studentClass(){
        return $this->belongsTo(StudentClass::class,'class_id','id');
    }
    public function studentSubject(){
        return $this->belongsTo(SchoolSubject::class,'subject_id','id');
    }
}
