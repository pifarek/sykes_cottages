<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public $primaryKey = '__pk';
    public $table = 'locations';

    public function properties () {
        return $this->hasMany(\App\Property::class, '_fk_location', '__pk');
    }

}
