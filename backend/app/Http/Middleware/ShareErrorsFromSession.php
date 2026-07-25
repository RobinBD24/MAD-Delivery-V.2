<?php
namespace App\Http\Middleware;
use Closure; use Illuminate\Http\Request;
class ShareErrorsFromSession { public function handle(Request $r, Closure $n) { return $n($r); } }
