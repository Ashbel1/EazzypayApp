<?php

namespace App\Http\Controllers;
use App\Models\Merchant;
use Illuminate\Http\Request;

class MerchantController extends Controller
{
    
    public function index()
    {
        $merchants = Merchant::get();
        return view('merchants.show', compact('merchants'));
    }

    public function create()
    {
        return view('merchants.create');
    }

    public function edit($id)
    {
         $merchant = Merchant::findOrFail($id);
        return view('merchants.edit', compact('merchant'));
    }

    public function update(Request $request, $id)
    {
       
    // I made validate all because some fields are not yet specified..
        try {
            $merchant = Merchant::findOrFail($id);
    
            $merchant->fill($request->all());
    
            $merchant->save();
    
            return redirect()->back()->with('success', 'Merchant updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the record: '.$e->getMessage());
        }
    }

    public function store(Request $request)
    {
        // return $request;
         $validatedData = $request->validate([
            'name' => 'required|string|max:20',
            'supervisor_id' => 'required|numeric|max:15',
            'type' => 'required|string|max:30',
            'tax_clearance' => 'required|string|max:15',
            'commission' => 'required|numeric',
            'agent_class_of_service_id' => 'required|numeric|max:15',
            'logo' => 'required',
            'street' => 'required|string|max:15',
            'suburb' => 'required|string|max:15',
            'city' => 'required|string|max:15',
        ]);
    
        try {
            $merchant = new Merchant();
            $merchant->name = $validatedData['name'];
            $merchant->supervisor_id = $validatedData['supervisor_id'];
            $merchant->type = $validatedData['type'];
            $merchant->tax_clearance = $validatedData['tax_clearance'];
            $merchant->commission = $validatedData['commission'];
            $merchant->agent_class_of_service_id = $validatedData['agent_class_of_service_id'];
            $merchant->logo = $validatedData['logo'];
            $merchant->street = $validatedData['street'];
            $merchant->suburb = $validatedData['suburb'];
            $merchant->city = $validatedData['city'];
            // *****************************************************************//
            $merchant->firstname ="Travis";
            $merchant->lastname ="Scott";
            $merchant->deposit = "3000";
            $merchant->registration_date = '2023-10-22';
            $merchant->last_use = '2023-10-22';
            $merchant->first_use = '2023-10-22';
            $merchant->landline = "4986522";
            $merchant->cellphone ='0775224459';
            $merchant->email = "example@gmail.com";
            $merchant->account_manager_id =1;
            $merchant->account =1234567890652345;
            $merchant->short_code ="2030";
            $merchant->bank_name ="NMB";
            $merchant->bank_account =1234567890652345;
            $merchant->company_name ="PosCloud";
            $merchant->director_full_name_1 = "Mr A Masemo";
            $merchant->director_full_name_2 = "Mr A Masemo";
            $merchant->director_full_name_3 = "Mr A Masemo";
            $merchant->director_full_name_4 = "Mr A Masemo";
            $merchant->director_id_number_1 = "14-017381v04";
            $merchant->director_id_number_2 = "14-017381v04";
            $merchant->director_id_number_3 = "14-017381v04";
            $merchant->director_id_number_4 = "14-017381v04";
            $merchant->category_code = "017381";
            $merchant->bank_branch_code = "1401738104";
            $merchant->bank_account_name = "Nostro";
           $merchant->save();
    
            return redirect()->back()->with('success', 'Merchant added successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while adding the record: '.$e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $merchant = Merchant::findOrFail($id);
            $merchant->delete();
            return redirect()->back()->with('success', 'Record deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while deleting the record: ' . $e->getMessage());
        }
    }
}
