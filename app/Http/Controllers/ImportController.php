<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StudentsImport;
use App\Imports\AppliedsImport;
use App\Imports\RefreshersImport;

class ImportController extends Controller
{
    public function showForm()
    {
        return view('import');
    }

    public function importExcel(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        Excel::import(new StudentsImport, $request->file('file'));

        return back()->with('success', 'Excel imported successfully!');
    }

    public function importAppliedExcel(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        Excel::import(new AppliedsImport, $request->file('file'));

        return back()->with('success', 'Excel imported successfully!');
    }

        public function importRefresherExcel(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        Excel::import(new RefreshersImport, $request->file('file'));

        return back()->with('success', 'Excel imported successfully!');
    }
}
