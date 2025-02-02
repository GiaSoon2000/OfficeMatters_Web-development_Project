@extends('layout')
@section('content')
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Add New Product</h3>
        <form action="{{route('addProduct.store')}}" method="post" enctype='multipart/form-data' >
            @csrf
            <div class="form-group">
				<label for="productname">Product Name</label>
				<input class="form-control" type="text" id="productName" name="productName" required>
            </div>
            <div class="form-group">
				<label for="productImage">Image</label>
				<input class="form-control" type="file" id="productImage" name="productImage" >
            </div>
            <div class="form-group">
				<label for="productPrice">Price</label>
				<input class="form-control" type="number" id="productPrice" name="productPrice" min="0" step="0.01" required>
            </div>
            <div class="form-group">
				<label for="productQuantity">Quantity</label>
				<input class="form-control" type="number" id="productQuantity" name="productQuantity" min="0" required>
            </div>
            
            <div class="form-group">
				<label for="Category">Category</label>
				<select name="productCategoryID" id="productCategoryID" class="form-control">
               <option value="1">Notebooks</option>
               <option value="2">Pens & Pencils</option>
               <option value="3">Desk Accessories</option>
				</select>  
            </div>
            <button type="submit" class="btn btn-primary">Add New</button>            
        </form>
        <br><br>
    </div>
    <div class="col-sm-3"></div>
</div>
@endsection