@extends('layouts.admin')

@section('title', 'View Order')

@section('content')

    <div class="text-center mt-4">
        <span class="fs-2 p-2 fw-semibold"
            style="font-family:'Times New Roman', Times, serif; border-radius: 5px; background-color:#eaeaea">User
            Orders</span>
    </div>

    @if ($user)
        <div class="fw-semibold text-center fs-4 mt-4" style="text-transform: uppercase;">
            Name: {{ $user->first_name }} {{ $user->last_name }}
        </div>

        @php
            $groupedOrders = $user->order_books->groupBy('order_no'); // Group orders by order_no
            $i = 1;
        @endphp

        <div class="container mt-4">
            <div class="row">
                @foreach ($groupedOrders as $orderNo => $orders)
                    <div class="col-md-4 mb-4">
                        <a href="/admin/viewdetail/{{ $orderNo }}" style="text-decoration: none">
                            <div class="card m-3" style="border: 1px solid #dadada; width:90%">
                                <div class="card-header text-center fw-bold" style="border: 1px solid #dadada">
                                    @php echo "[".$i."]" @endphp Order Number: {{ $orderNo }} </div>
                                {{-- <div class="text-center fw-bold fs-5 mt-4">Order Number: {{ $orderNo }}</div> --}}

                                @php $i++ @endphp
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

@endsection
