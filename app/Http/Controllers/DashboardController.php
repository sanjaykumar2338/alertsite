<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Jobs\SendSMSJob;
use App\Jobs\UpdateStoresJob;
use App\Models\Tracks;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        return view('frontend.dashboard.index');
    }
}