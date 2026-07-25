<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RamadanReservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'branch_id', 'table_layout_id', 'customer_id', 'reservation_date', 'time_slot',
        'guest_count', 'platter_name', 'platter_price', 'payment_status', 'payment_method',
        'status', 'advance_payment_required', 'notes'
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
}
