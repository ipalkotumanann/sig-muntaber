<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Patient;
use App\Models\Clinic;

class District extends Model
{
    use HasFactory;

    protected $table = 'districts';
    protected $fillable = [
        'name',
        'status',
        'geometry',
        'jumlah_penduduk'
    ];

    protected $casts = [
        'geometry' => 'array'
    ];

    public function clinics()
    {
        return $this->hasMany(Clinic::class,'districts_id');
    }
}
