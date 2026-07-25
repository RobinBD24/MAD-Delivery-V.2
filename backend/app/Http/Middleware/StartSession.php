<?php
namespace App\Http\Middleware;
use Closure; use Illuminate\Http\Request;
class StartSession { public function handle(Request $r, Closure $n) { return $n($r); } }
