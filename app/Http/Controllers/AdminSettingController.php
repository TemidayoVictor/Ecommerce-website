<?php

namespace App\Http\Controllers;

use App\Models\DeliveryLocation;
use App\Models\Coupon;
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
}
