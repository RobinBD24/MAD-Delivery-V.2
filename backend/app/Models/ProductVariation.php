<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'size_name', 'price', 'is_available', 'reason'
    ];
    protected $casts = ['is_available' => 'boolean'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
