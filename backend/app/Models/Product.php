<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'category', 'price', 'description', 'image_path',
        'is_available', 'branch_id', 'category_id', 'brand_tag'
    ];
    protected $casts = ['is_available' => 'boolean'];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function categoryModel()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function variations()
    {
        return $this->hasMany(ProductVariation::class);
    }
}
