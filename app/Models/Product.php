<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Invoice;

class Product extends Model
{
    // use HasFactory;

    protected $table = 'products';

    protected $fillable = ['name','description','price','tax','categoryID'];

    // protected $casts = [
        
    //     'name' => 'string',
    //     'description' =>'string',
    //     'categoryID' => 'string'
    // ];

    public function category()
    {
        return $this->belongsTo(Category::class,'categoryID');
    }

    public function invoices()
    {
        // return $this->belongsToMany(Invoice::class);

        return $this->belongsToMany(Invoice::class);
    }

    public function invoice_products()
    {
        return $this->belongsToMany(InvoiceProducts::class);
    }
}
