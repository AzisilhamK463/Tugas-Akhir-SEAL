<?php

namespace App\Models;

use App\Observers\ModulObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy(ModulObserver::class)]

class Modul extends Model
{
    use HasFactory;

    protected $table = 'moduls';
    protected $fillable =
    [
        'name',
        'slug',
        'description',
        'file_name',
        'file_type',
        'mime_type',
        'file_data',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function studyProgram()
    {
        return $this->belongsTo(StudyProgram::class);
    }
}
