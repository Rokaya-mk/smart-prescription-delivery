<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'manufacturer',
        'price',
        'stock_quantity'
    ];
    public function prescriptions()
    {
        return $this->belongsToMany(Prescription::class);
    }
}
