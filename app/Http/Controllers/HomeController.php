<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Device;
use App\Models\Merchant;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
          // Count all devices
          $totalDevices = Device::count();

          // Retrieve the total merchants count
          $totalMerchants = Merchant::count();
            // Retrieve the total merchants count
            $totalUsers = User::count();
  
          // Return the total devices and total merchants counts
          return view('home', [
              'totalDevices' => $totalDevices,
              'totalMerchants' => $totalMerchants,
               'totalUsers'  =>  $totalUsers 
          ]);
    }
}
