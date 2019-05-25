<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipiente extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'sinal',
        'voltagem',
        'data_hora',
        'nivel_ocupacao',
        'lshh',
        'lahh',
        'lsh',
        'lah',
        'lsl',
        'lal',
        'lsll',
        'lall',
        'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [ ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [ ];

    public $timestamps = false;
    protected $table = 'recipientes';

    public function sensor_obj() {
        return $this->belongsTo(Sensor::class, 'id');
    }

    public function recipiente_status_obj() {
        return $this->belongsTo(RecipienteStatus::class, 'status');
    }
}
