@extends('layout')
@section('content')
<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-6">
        <br><br>
        <div class="mb-2">
            <a href="{{ route('addProduct') }}" class="btn btn-primary">Add Product</a>
        </div>
        <table class="table table-bordered">
            <thead>
                
                <tr>
                    <td>ID</td>
                    <td>Image</td>
                    <td>Name</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Category</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td><img src="{{asset('images/')}}/{{$product->image}}" alt="" width="100" class="img-fluid"></td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->quantity}}</td>
                    <!-- <td>{{$product->categoryID}}</td> -->
                    <td>
                        @php
                        $categoryName = '';
                        switch ($product->categoryID) {
                            case 1:
                                $categoryName = 'Notebooks';
                                break;
                            case 2:
                                $categoryName = 'Pens & Pencils';
                                break;
                            case 3:
                                $categoryName = 'Desk Accessories';
                                break;
                            default:
                                $categoryName = 'Other';
                                break;
                        }
                        echo $categoryName;
                        @endphp
                    </td>
                    <td><a href="{{route('editProduct',['id'=>$product->id])}} " class="btn btn-info btn-xs">Edit</a>&nbsp;
                    </td>
                    <td>
                        <form action="{{route('deleteProduct',['id'=>$product->id])}}" method="POST" onsubmit="return confirm('Are you sure to delete this product?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                        </form>
                    </td>
                    
                    
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-sm-4"></div>
    <div class="col-sm-2"></div>
    <div class="col-sm-6"></div>
</div>
@endsection

