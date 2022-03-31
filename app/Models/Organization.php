<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $fillable = ['name','email','adress','taxID'];

    public function invoice()
    {
        return $this->hasMany(Invoice::class);
    }
}
