<?php
namespace App\Http\Controllers\Roles;

use App\Http\Controllers\Controller;

class AccountsController extends Controller
{
    // Customer payments, rider commissions, withdrawals,
    // financial reports, refunds, invoices, settlements
    public function index() { return view('roles.accounts.dashboard'); }
    public function payments() { return view('roles.accounts.payments'); }
    public function commissions() { return view('roles.accounts.commissions'); }
    public function withdrawals() { return view('roles.accounts.withdrawals'); }
    public function reports() { return view('roles.accounts.reports'); }
    public function refunds() { return view('roles.accounts.refunds'); }
    public function settlements() { return view('roles.accounts.settlements'); }
}
