<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Invoice;
use App\Models\Product;

class InvoiceProducts extends Model
{
    use HasFactory;

    protected $table = 'invoice_product';

    protected $fillable = ['invoice_id','product_id','quantity'];

    public function product()
    {
        return $this->hasMany(Product::class,'product_id');
    }
}
