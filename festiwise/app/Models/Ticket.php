<?php

namespace App\Models;

use App\Models\RandId as ModelsRandId;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['event'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->barcode = ModelsRandId::generateID();
        });
    }
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function getRouteKeyName()
    {
        return $this->barcode;
    }
    
}
