<?php

namespace App\Http\Controllers;

use App\Exports\ExportAddress;
use App\Imports\ImportAddress;
use App\Models\Address;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AddressController extends Controller
{
    public function index()
    {
        $data = Address::latest()->get();
        return view('index', compact('data'));
    }

    public function uploadExcel(Request $request)
    {
        $request->validate(['excel' => 'required|mimes:xls,xlsx|max:2048']); // Example with size limit

        Excel::import(new ImportAddress, $request->file('excel'));
        return back()->with('success', 'Data imported successfully.');
    }
    
    public function export()
    {
        return Excel::download(new ExportAddress, 'data.xlsx');
    }

    public function bulkDelete()
    {
        $datas = Address::all();
        foreach ($datas as $data) {
            $data->delete();
        }
        return redirect()->back()->with('success', 'All data deleted successfully.');
    }
}


