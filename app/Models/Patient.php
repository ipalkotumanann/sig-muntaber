<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\District;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'district_id',
        'name',
        'email',
        'address',
        'phone',
        'lat',
        'lng',
        'photo'
    ];

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
