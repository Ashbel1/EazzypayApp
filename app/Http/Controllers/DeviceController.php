<?php

namespace App\Http\Controllers;
use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    // showing all Devices
    public function index()
    {
        try {
            $devices = Device::get();
            return view('devices.show', compact('devices'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while retrieving devices.');
        }
    }

    // get the edit form
    public function create()
    {
        return view('Devices.create');
    }

    public function edit($id)
    {
        try {
            $device = Device::findOrFail($id);

            return view('Devices.edit', compact('device'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while retrieving the device.');
        }
    }

// update Record
public function update(Request $request, $id)
{
    try {
        $request->validate([
            'imei' => 'required',
            'name' => 'required',
            'serial_number' => 'required|numeric',
            'status' => 'required|in:pending,active,blocked',
        ]);

        $device = Device::findOrFail($id);
        $device->imei = $request->input('imei');
        $device->name = $request->input('name');
        $device->serial_number = $request->input('serial_number');
        $device->status = $request->input('status');
        $device->save();

        return redirect()->route('devices-index')->with('success', 'Device updated successfully!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'An error occurred while updating the device.');
    }
}

   // store the record
    public function store(Request $request)
    {
        try {
            $request->validate([
                'imei' => 'required',
                'name' => 'required',
                'serial_number' => 'required|numeric',
                'status' => 'required|in:pending,active,blocked',
            ]);

            $device = new Device();
            $device->imei = $request->input('imei');
            $device->name = $request->input('name');
            $device->serial_number = $request->input('serial_number');
            $device->status = $request->input('status');
            $device->save();

            return redirect()->back()->with('success', 'Device added successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while adding the device.');
        }
    }
    
    // delete the record
    public function destroy($id)
    {
        try {
            $device = Device::findOrFail($id);
            $device->delete();

            return redirect()->back()->with('success', 'Device deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while deleting the device.');
        }
    }

}
