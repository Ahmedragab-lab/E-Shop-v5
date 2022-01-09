@foreach ($products as $product)
    <tr>
        <td>{{ $product->product_name }}</td>
        <td>{{ $product->pivot->quantity }}</td>
        <td>{{ number_format($product->pivot->quantity * $product->selling_price,2) }}</td>
    </tr>
@endforeach
{{-- <h3>Total <span>{{ number_format($order->total, 2) }}</span></h3> --}}
