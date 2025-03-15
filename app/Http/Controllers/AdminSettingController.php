<?php

namespace App\Http\Controllers;

use App\Models\DeliveryLocation;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminSettingController extends Controller
{
    //
    public function index() {
        $pageTitle = "Settings";
        $deliveryLocations = DeliveryLocation::all();
        return view('admin.settings.index', [
            'pageTitle' => $pageTitle,
            'deliveryLocations' => $deliveryLocations,
            'type' => 'add',
        ]);
    }

    public function addLocation(Request $request) {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        // create location
        $location = DeliveryLocation::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return redirect()->back()->with('success', 'Location Added Successfully');
    }

    public function editLocation($id) {
        $pageTitle = "Settings";
        $deliveryLocations = DeliveryLocation::all();
        $location = DeliveryLocation::findorFail($id);
        return view('admin.settings.index', [
            'pageTitle' => $pageTitle,
            'deliveryLocations' => $deliveryLocations,
            'type' => 'edit',
            'location' => $location,
        ]);
    }

    public function editLocationPost(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        $location = DeliveryLocation::findorFail($id);

        // edit location
        $location->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return redirect()->back()->with('success', 'Location Updated Successfully');
    }

    public function deleteLocation(Request $request, $id) {
        $location = DeliveryLocation::findorFail($id);

        // Delete the database record
        $location->delete();

        return redirect()->back()->with('success', 'Location Deleted Successfully');
    }

    public function generateCoupon() {
        $pageTitle = "Generate Coupon";
        $coupons = Coupon::all();
        return view('admin.settings.coupon', [
            'pageTitle' => $pageTitle,
            'coupons' => $coupons,
        ]);
    }

    public function generateCouponPost(Request $request) {
        $request->validate([
            'type' => 'required',
            'discount' => 'required',
            'usage_limit' => 'required',
            'expires_at' => 'required',
            'amount',
        ]);

        if(empty($request->amount)) {
            $amount = 1;
        }

        elseif($request->amount < 1) {
            return redirect()->back()->with('error', 'Amount cannot be less than 1');
        }

        else {
            $amount = $request->amount;
        }

        for ($i = 1; $i <= $amount; $i++) {
            $code = $this->generateCode();
            $coupon = Coupon::create([
                'code' => $code,
                'type' => $request->type,
                'discount' => $request->discount,
                'usage_limit' => $request->usage_limit,
                'expires_at' => Carbon::parse($request->expires_at)->format('Y-m-d'),
            ]);
        }

        return redirect()->back()->with('success', 'Coupon codes generated Successfully');
    }

    private function generateCode() {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $length = 8;
        return substr(str_shuffle($characters), 0, $length);
    }
}
