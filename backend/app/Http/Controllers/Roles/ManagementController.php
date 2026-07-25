<?php
namespace App\Http\Controllers\Roles;

use App\Http\Controllers\Controller;

class ManagementController extends Controller
{
    // Overall business performance, branch performance,
    // reports, analytics, complaints monitoring
    public function index() { return view('roles.management.dashboard'); }
    public function performance() { return view('roles.management.performance'); }
    public function branches() { return view('roles.management.branches'); }
    public function reports() { return view('roles.management.reports'); }
    public function analytics() { return view('roles.management.analytics'); }
    public function complaints() { return view('roles.management.complaints'); }
}
