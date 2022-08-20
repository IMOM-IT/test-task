<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountingCars extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'accounting_cars';
}
