<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    public $primaryKey = '__pk';
    public $table = 'properties';

    public function location () {
        return $this->belongsTo(\App\Location::class, '_fk_location', '__pk');
    }

}
