<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatSession extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_type', 'branch_id', 'rider_id', 'customer_id', 'manager_id',
        'order_id', 'reservation_id', 'is_active'
    ];
    protected $casts = ['is_active' => 'boolean'];

    public function messages()
    {
        return $this->hasMany(ChatMessage::class);
    }
}
