
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Add New Product</h3>
        <form action="<?php echo e(route('addProduct')); ?>" method="post" enctype='multipart/form-data' >
            <?php echo csrf_field(); ?>
            <div class="form-group">
				<label for="productname">Product Name</label>
				<input class="form-control" type="text" id="productName" name="productName" required>
            </div>
            <div class="form-group">
				<label for="productDescription">Description</label>
				<input class="form-control" type="text" id="productDescription" name="productDescription" required>
            </div>
            <div class="form-group">
				<label for="productPrice">Price</label>
				<input class="form-control" type="number" id="productPrice" name="productPrice" min="0" required>
            </div>
            <div class="form-group">
				<label for="productQuantity">Quantity</label>
				<input class="form-control" type="number" id="productQuantity" name="productQuantity" min="0" required>
            </div>
            <div class="form-group">
				<label for="productImage">Image</label>
				<input class="form-control" type="file" id="productImage" name="productImage" >
            </div>
            <div class="form-group">
				<label for="Category">Category</label>
				<select name="CategoryID" id="CategoryID" class="form-control">
                    
				</select>  
            </div>
            <button type="submit" class="btn btn-primary">Add New</button>            
        </form>
        <br><br>
    </div>
    <div class="col-sm-3"></div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Ricky\app-name\resources\views/addProduct.blade.php ENDPATH**/ ?>