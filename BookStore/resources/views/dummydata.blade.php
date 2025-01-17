<div>

    {{-- @foreach ($userdata as $users)
        {{ $users->id }}
        <br>
        {{ $users->first_name }}
        <br>
        {{ $users->last_name }}
        <br>
        {{ $users->email }}
        <br>
        {{ $users->carts->quantity }}
        <br>
        {{ $users->carts->book_id }}
        <br><br>
    @endforeach --}}

    {{-- For single book use if and multiple use foreach --}}
    @if ($userdata)
        <?php $i = 1; ?>
        <h3>UserDetails</h3>
        id {{ $userdata->id }}
        <br>
        name: {{ $userdata->first_name }} {{ $userdata->last_name }}
        <br>
        email: {{ $userdata->email }}
        <br>

        @foreach ($userdata->carts as $carts)
            <h3>Cart</h3>
            id: {{ $carts->id }}
            <br>
            book_id: {{ $carts->book_id }}
            <br>
            quantity: {{ $carts->quantity }}
            <br>
            user id: {{ $carts->userdetail_id }}
            <br>
            cart_id: {{ $carts->id }}
            <br>

            @foreach ($carts->books as $books)
                <h3>Book <?php echo $i; ?></h3>
                book_id: {{ $books->id }}
                <br>
                name: {{ $books->name }}
                <br>
                price: {{ $books->price }}
                <br>
                category: {{ $books->category }}
                <br>

                @foreach ($userdata->order_books as $orders)
                    <h3>Order_book</h3>
                    user id: {{ $orders->userdetail_id }}
                    <br>
                    book_id: {{ $orders->book_id }}
                    <br>
                    Order no: {{ $orders->order_no }}
                    <br>
                @endforeach
                <?php $i++; ?>
            @endforeach
            <br><br><br>
        @endforeach
    @endif
</div>
