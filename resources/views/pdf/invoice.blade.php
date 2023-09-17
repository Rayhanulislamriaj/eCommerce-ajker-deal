<style>
    table,
    td,
    th {
        border: 1px solid black;
        border-collapse: collapse;
    }

    table {
        width: 700px;
        margin-left: auto;
        margin-right: auto;
    }

    td,
    caption {
        padding: 16px;
    }

    th {
        padding: 16px;
        background-color: lightblue;
        text-align: left;
    }
</style>


<table>
    <caption><b> Invoice </b></caption>
    <tr>
        <th colspan="3">Invoice #{{ $invoices->id }}</th>
        <th>{{ $invoices->created_at->format('d F Y') }}</th>
    </tr>
    <tr>
        <td colspan="2">
            <strong>Pay To:</strong> <br>
            {{ $vendor = App\Models\User::where('id', $invoices->vendor_id)->first()->name }} <br>
            {{ App\Models\User::where('id', $invoices->vendor_id)->first()->email }} <br>
        </td>
        <td colspan="2">
            <strong>Customer:</strong> <br>
            {{ $invoices->address->name }} <br>
            {{ $invoices->address->house }},
            {{ $invoices->address->road }} <br>
            {{ $invoices->address->post_office }} - {{ $invoices->address->post_code }} <br>
            {{ $invoices->address->country }}
        </td>
    </tr>
    <tr>
        <th>Name/Description</th>
        <th>Qty.</th>
        <th>MRP</th>
        <th>Amount</th>
    </tr>
    @foreach ($invoice_details as $invoice_detail)
        <tr>
            <td>{{ $invoice_detail->product->product_name }}</td>
            {{-- <td>{{ $invoice_detail->color->color_name }}</td> --}}
            <td>{{ $invoice_detail->user_input }}</td>
            <td>
                {{ $product_price = App\Models\Inventory::where([
                    'product_id' => $invoice_detail->product_id,
                    'color_id' => $invoice_detail->color_id,
                    'size_id' => $invoice_detail->size_id,
                ])->first()->product_price }}
            </td>
            <td>{{ $invoice_detail->user_input * $product_price }} </td>
        </tr>
    @endforeach
    <tr>
        <th colspan="3">Subtotal:</th>
        <td>{{ $invoices->subtotal }}</td>
    </tr>
    <tr>
        <th colspan="3">Coupon Name:</th>
        <td>{{ $invoices->coupon_name ? $invoices->coupon_name : 'N/A' }}</td>
    </tr>
    <tr>
        <th colspan="2">Coupon Discount Amount</th>
        <td>{{ $invoices->coupon_discount }}%</td>
        <td>{{ $invoices->coupon_discount_amount }}</td>
    </tr>
    <tr>
        <th colspan="3">Delivery Charge:</th>
        <td>{{ $invoices->delivery_charge }}</td>
    </tr>
    <tr>
        <th colspan="3">Grand Total: (BDT)</th>
        <td>{{ $invoices->total + $invoices->delivery_charge }}</td>
    </tr>
    <tr>
        <th colspan="3">Invoice Status:</th>
        <td>
            @if ($invoices->payment_status == 'paid')
                <h2>
                    <b>PAID</b>
                </h2>
            @else
                <h2>
                    <b>UNPAID</b>
                </h2>
            @endif
        </td>
    </tr>
</table>
