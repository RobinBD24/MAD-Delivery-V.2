<?php
namespace App\Http\Controllers\Roles;

use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    // Login, browse food, place order, track order, profile,
    // notifications, rewards, complaints, order history
    public function index() { return view('roles.customer.dashboard'); }
    public function menu() { return view('roles.customer.menu'); }
    public function orders() { return view('roles.customer.orders'); }
    public function profile() { return view('roles.customer.profile'); }
    public function rewards() { return view('roles.customer.rewards'); }
    public function complaints() { return view('roles.customer.complaints'); }
    public function notifications() { return view('roles.customer.notifications'); }
}
