<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Offer;
use App\Models\Service;
use App\Models\Voucher;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EnterpriseCopone;
use App\Models\EnterpriseSubscription;
use App\Models\PromoCode;
use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index($period = null)
    {

        return view('admin.index');
    }


}
