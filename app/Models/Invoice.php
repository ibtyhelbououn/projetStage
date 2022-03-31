<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\InvoiceProducts;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoices';

    protected $fillable =[
        'total',
        'organizationID',
        
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class,'organizationID');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class,'invoice_product')->withPivot('quantity');
    }
}
