<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
      'name',
      'street',
      'city',
      'state'
    ];
    // relazione One To Many location -> employees
    public function employees() {
      return $this -> hasMany(Employee::class);
    }
}
