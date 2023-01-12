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

    protected $keyType = 'string';
    protected $casts = ['id' => 'string'];
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function getRouteKey()
    {
        return $this->slug;
    }

    public $incrementing = false;

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = ModelsRandId::generateID();
        });
    }
}
