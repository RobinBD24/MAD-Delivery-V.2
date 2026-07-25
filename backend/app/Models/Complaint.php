<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'recipient_role', 'subject', 'message', 'status', 'priority'];
    public function user() { return $this->belongsTo(User::class); }
}
