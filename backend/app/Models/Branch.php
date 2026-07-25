<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'location', 'brand_type', 'delivery_zone', 'pickup_points', 'is_active'
    ];
    protected $casts = ['is_active' => 'boolean'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function tableLayouts()
    {
        return $this->hasMany(TableLayout::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
