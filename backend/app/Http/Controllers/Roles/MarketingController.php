<?php
namespace App\Http\Controllers\Roles;

use App\Http\Controllers\Controller;

class MarketingController extends Controller
{
    // Campaigns, discounts, coupons, promotions,
    // audience segmentation, notifications, performance
    public function index() { return view('roles.marketing.dashboard'); }
    public function campaigns() { return view('roles.marketing.campaigns'); }
    public function coupons() { return view('roles.marketing.coupons'); }
    public function audience() { return view('roles.marketing.audience'); }
    public function notifications() { return view('roles.marketing.notifications'); }
    public function reports() { return view('roles.marketing.reports'); }
}
