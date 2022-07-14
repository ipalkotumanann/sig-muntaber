<?php

namespace App\Models;

use App\Models\Clinic;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cases extends Model
{
    use HasFactory;

    protected $table = 'cases';
    protected $fillable = [
        'clinics_id',
        'year',
        'toddler',
        'all_ages'
    ];

    protected $appends = [
        'total_infected',
//        'cfr_total'
    ];

//    public function getTotalInfectedAttribute()
//    {
//        return $this->man_infected + $this->woman_infected;
//    }
//
    public function getTotalInfectedAttribute()
    {
        return $this->toddler + $this->all_ages;
    }
//    public function getCfrTotalAttribute()
//    {
//        return $this->getTotalInfectedAttribute() !== 0
//            ? round((($this->getTotalInfectedAttribute() / $this->clinic()->id) * 100), 2)
//            : 0;
//    }

//    public function getTotalInfectedAttribute()
//    {
//        return $this->getTotalInfectedAttribute() != 0 && $this->getTotalDiedAttribute() != 0
//            ? round((($this->getTotalDiedAttribute() / $this->getTotalInfectedAttribute()) * 100), 2)
//            : 0;
//    }

    public function clinic()
    {
        return $this->belongsTo(Clinic::class,'clinics_id');
    }
}
