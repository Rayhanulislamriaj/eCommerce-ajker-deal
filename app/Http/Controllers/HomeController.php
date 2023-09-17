<?php

namespace App\Http\Controllers;


use App\Models\Address;
use App\Models\Invoice;
use App\Models\Invoice_detail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class HomeController extends Controller
{
    public function dashboard()
    {
        if (auth()->user()->role == 'admin') {
            $applied_vendors = User::onlyTrashed()->where('role', 'vendor')->get();
            $users = User::withTrashed()->get();
            return view('dashboard.admin', compact('applied_vendors', 'users'));
        } else if (auth()->user()->role == 'vendor') {
            return view('dashboard.vendor');
        } else {
            $addresses = Address::where('customer_id', auth()->id())->get();
            $invoices = Invoice::where('customer_id', auth()->id())->get();
            return view('dashboard.customer', compact('addresses', 'invoices'));
        }

    }
    public function download_invoice($id)
    {
        $invoices = Invoice::find($id);
        $invoice_details = Invoice_detail::where('invoice_id', $id)->get();
        $pdf = Pdf::loadView('pdf.invoice', compact('invoices', 'invoice_details'));
        return $pdf->download(Carbon::now()->format('Y_m_d') . '.pdf');
    }
    public function add_address(Request $request)
    {
        $request->validate([
            '*' => 'required'
        ]);
        Address::create($request->except('_token') + [
            'customer_id' => auth()->id()
        ]);
        return back();
    }
    public function add_address_edit(Address $address)
    {
        return view('add.address.edit', compact('address'));
    }
    public function vendor_approve($id)
    {
        User::onlyTrashed()->where('id', $id)->restore();
        return back();
    }

}