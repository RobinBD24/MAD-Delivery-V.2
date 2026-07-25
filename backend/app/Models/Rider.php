<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rider extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'vehicle_type', 'license_plate', 'status',
        'commission_rate', 'available_balance', 'current_location'
    ];
    protected $casts = [
        'commission_rate' => 'decimal:2',
        'available_balance' => 'decimal:2',
    ];
    public function user() { return $this->belongsTo(User::class); }
}
