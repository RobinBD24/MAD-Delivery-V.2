<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableReservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'branch_id', 'table_layout_id', 'customer_id', 'reservation_date', 'reservation_time',
        'guest_count', 'special_request', 'status', 'rejection_reason'
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function tableLayout()
    {
        return $this->belongsTo(TableLayout::class);
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
}
