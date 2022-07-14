<?php

namespace App\Models;

use App\Models\District;
use App\Models\Cases;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;

    protected $fillable = [
        'districts_id',
        'name',
        'address',
        'lat',
        'lng',
        'jumlah_penduduk'
    ];

    public function cases()
    {
        return $this->hasMany(Cases::class,'clinics_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class,'districts_id');
    }
}
