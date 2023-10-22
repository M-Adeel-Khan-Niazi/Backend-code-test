<?php

namespace App;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use Uuids;
    protected $table = 'employee';
    protected $fillable = ['name', 'email'];
}
