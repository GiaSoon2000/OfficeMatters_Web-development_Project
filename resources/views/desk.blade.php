@extends('layout')
@section('content')
<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <br><br>
        <div class="card border-0">
            <h5 class="card-title">Desk Accessories</h5>
            <div class="row">
                @foreach($deskAccessories as $deskAccessorie)
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="item">
                                <h5>{{ $deskAccessorie->name }}</h5>
                                <img src="{{ asset('images/') }}/{{ $deskAccessorie->image }}" class="img-fluid" alt="">
                                <span>RM {{ $deskAccessorie->price }}</span>
                                <br>
                                <form action="{{ route('addCart', ['id' => $deskAccessorie->id]) }}" method="POST">
                                    @csrf
                                    <div class="card-heading">
                                        Quantity 
                                        <input type="number" name="quantity" value="1" min="1"> 
                                        Available: {{ $deskAccessorie->quantity }}
                                    </div>
                                    <br>
                                    <button class="btn btn-danger btn-xs" type="submit">Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-sm-2"></div>
</div>

<script>
     const addToCartButtons = document.querySelectorAll('.btn-add-to-cart');
    const cartCount = document.getElementById('cart-count');
    let cartItems = [];

    addToCartButtons.forEach((button) => {
        button.addEventListener('click', () => {
            const itemName = button.getAttribute('data-item');
            const itemPrice = parseFloat(button.getAttribute('data-price'));
            
            cartItems.push({
                name: itemName,
                price: itemPrice
            });
            
            const itemCount = cartItems.length;
            cartCount.textContent = '(' + itemCount + ')';
            cartCount.style.display = 'inline'; // Display the count
            
            // Store cart items in sessionStorage
            sessionStorage.setItem('cartItems', JSON.stringify(cartItems));
        });
    });
</script>

@endsection
