<?php
namespace App\Http\Controllers\Roles;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Product;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function index() { return view('roles.super_admin.dashboard'); }

    public function customers() { return view('roles.super_admin.customers'); }
    public function complaints() { return view('roles.super_admin.complaints'); }
    public function reports() { return view('roles.super_admin.reports'); }
    public function coins() { return view('roles.super_admin.coins'); }
    public function riders() { return view('roles.super_admin.riders'); }

    public function branches() {
        $branches = Branch::all();
        return view('roles.super_admin.branches', compact('branches'));
    }

    public function products() {
        // Super admin sees all products, all branches
        $products = Product::with('branch', 'variations')->get();
        return view('roles.super_admin.products', compact('products'));
    }

    public function attendance() {
        // Super admin sees all branch attendance history
        return view('roles.super_admin.attendance');
    }
}
