<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableLayout extends Model
{
    use HasFactory;

    protected $fillable = [
        'branch_id', 'table_name', 'table_identifier', 'seat_capacity', 'status', 'location_description'
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function reservations()
    {
        return $this->hasMany(TableReservation::class);
    }
}
