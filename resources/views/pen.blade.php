@extends('layout')
@section('content')
<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <br><br>
        <div class="card border-0">
            <h5 class="card-title">Pens & Pencils</h5>
            <div class="row">
                @foreach($pens as $pen)
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="item">
                                <h5>{{ $pen->name }}</h5>
                                <img src="{{ asset('images/') }}/{{ $pen->image }}" class="img-fluid" alt="">
                                <span>RM {{ $pen->price }}</span>
                                <br>
                                <form action="{{ route('addCart', ['id' => $pen->id]) }}" method="POST">
                                    @csrf
                                    <div class="card-heading">
                                        Quantity 
                                        <input type="number" name="quantity" value="1" min="1"> 
                                        Available: {{ $pen->quantity }}
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


@endsection
