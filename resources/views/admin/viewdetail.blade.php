@extends('layouts.admin')

@section('title', 'View Details')

@section('content')

    <div class="text-center mt-4">
        <span class="fs-2 p-2 fw-semibold"
            style="font-family:'Times New Roman', Times, serif; border-radius: 5px; background-color:#eaeaea">User Order
            Details</span>
    </div>

    @if ($user)
        <div class="fw-semibold text-center fs-4 mt-4" style="text-transform: uppercase;">
            Name: {{ $user->first()->first_name }} {{ $user->first()->last_name }}
        </div>


        <div class="text-center fw-bold m-auto mt-4 p-2" style="border: 1px solid #dadada; width:60%">
            Order Number: {{ $user->first()->order_no }} </div>

        <table class="table m-auto" style="border: 1px solid #dadada ; width:60%">
            <thead class="table-light">
                <tr class="text-center">
                    <th>Book Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>SubTotal</th>
                </tr>
            </thead>

            <tbody>
                @php $totalPrice = 0; @endphp

                @foreach ($user as $userdata)
                    <tr class="text-center">

                        <td class="p-3">{{ $userdata->book_name }}</td>
                        <td class="p-3">{{ number_format($userdata->price, 2) }}</td>
                        <td class="p-3">{{ $userdata->quantity }}</td>
                        <td class="p-3">
                            {{ number_format($userdata->quantity * $userdata->price, 2) }}
                        </td>
                        @php $totalPrice += $userdata->quantity * $userdata->price; @endphp

                    </tr>
                @endforeach
                <tr>
                    <td colspan="1" class="fw-bold text-center">
                        <span class="dropdown">
                            <form class="m-0" action="/admin/updatestatus/{{ $user->first()->order_no }}" method="POST">
                                @csrf
                                @if ($user->first()->status == 'pending')
                                    Status: <select name="status" id="subject" onchange="orderstatus(this.value,{{ $user->first()->order_no }})">
                                        <option> {{ ucfirst($user->first()->status) }}</option>
                                        <option value="processing">Processing</option>
                                        <option value="completed">Completed</option>
                                    @elseif ($user->first()->status == 'processing')
                                        Status: <select name="status" id="subject" onchange="orderstatus(this.value,{{ $user->first()->order_no }})">
                                            <option> {{ ucfirst($user->first()->status) }} </option>
                                            <option value="completed">Completed</option>
                                        @elseif ($user->first()->status == 'completed')
                                            Status: <span class="badge bg-success text-white"> {{ ucfirst($user->first()->status) }} </span>
                                        </select>
                                @endif
                            </form>
                        </span>
                    </td>
                    <td colspan="2" class="fw-bold text-center">Total Amount</td>
                    <td colspan="2" class="fw-bold text-center">₹
                        {{ number_format($totalPrice, 2) }}/-</td>
                </tr>
            </tbody>
        </table>
    @endif

    @push('scripts')
        <script>
            function orderstatus(order_status,order_no) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '/admin/updatestatus',
                    method: "POST",
                    data: {
                        status: order_status,
                        order_no: order_no
                    },
                    success: function(data) {
                        console.log('Status updated:', data);
                    },
                    error: function(error) {
                        console.error('Error updating status:', error);
                    }
                });
            }
        </script>
    @endpush

@endsection




{{-- @if ($user)
    <div class="fw-semibold text-center fs-4 mt-4" style="text-transform: uppercase;">
        Name: {{ $user->first_name }} {{ $user->last_name }}
    </div>

    @php
        $groupedOrders = $user->order_books->groupBy('order_no'); // Group orders by order_no
        $i = 1;
    @endphp

    @foreach ($groupedOrders as $orderNo => $orders)
        <div class="container card p-0 mt-4 mb-5" style="border: 1px solid #dadada; width:60%">
            <div class="container card-header text-center fw-bold" style="border: 1px solid #dadada">@php echo "[".$i."]" @endphp
                Order Number: {{ $orderNo }} </div>

            <table class="container table m-0" style="border: 1px solid #dadada">
                <thead class="table-light">
                    <tr class="text-center">
                        <th>Book Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>SubTotal</th>
                    </tr>
                </thead>

                <tbody>
                    @php $totalPrice = 0; @endphp
                    @foreach ($orders as $order)
                        <tr class="text-center">
                            @if ($order->books)
                                <td class="p-3">{{ $order->books->name }}</td>
                                <td class="p-3">{{ number_format($order->books->price, 2) }}</td>
                                <td class="p-3">{{ $order->quantity }}</td>
                                <td class="p-3">
                                    {{ number_format($order->quantity * $order->books->price, 2) }}
                                </td>
                                @php $totalPrice += $order->quantity * $order->books->price; @endphp
                            @endif
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="2" class="fw-bold text-center">Total Amount</td>
                        <td colspan="2" class="fw-bold text-center">₹
                            {{ number_format($totalPrice, 2) }}/-</td>
                    </tr>
                </tbody>
            </table>
            @php $i++ @endphp
        </div>
    @endforeach
@endif --}}
