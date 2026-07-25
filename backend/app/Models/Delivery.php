<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id', 'rider_id', 'status', 'delivery_zone',
        'delivery_address', 'assigned_at', 'picked_up_at',
        'delivered_at', 'travel_distance_meters', 'route_history'
    ];
    protected $casts = ['route_history' => 'array', 'assigned_at' => 'datetime', 'picked_up_at' => 'datetime', 'delivered_at' => 'datetime'];
    public function order() { return $this->belongsTo(Order::class); }
    public function rider() { return $this->belongsTo(Rider::class); }
}
