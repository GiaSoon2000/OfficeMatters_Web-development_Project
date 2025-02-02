
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Edit Product</h3>
        <form action="<?php echo e(route('updateProduct')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="form-group">
                <img src="" alt="" width="100" class="img-fluid"><br>
            <label for="productname">Product Name</label>
            <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
            <input class="form-control" type="text" id="productName" name="productName" required value="<?php echo e($product->name); ?>"> 
            
            </div>
            <div class="form-group">
            <label for="productDescription">Description</label>
            <input class="form-control" type="text" id="productDescription" name="productDescription" required value="<?php echo e($product->description); ?>">
            </div>
            <div class="form-group">
            <label for="productPrice">Price</label>
            <input class="form-control" type="number" id="productPrice" name="productPrice" min="0" required value="<?php echo e($product->price); ?>">
            </div>
            <div class="form-group">
            <label for="productQuantity">Quantity</label>
            <input class="form-control" type="number" id="productQuantity" name="productQuantity" min="0" required value="<?php echo e($product->quantity); ?>">
            </div>
            <div class="form-group">
            <label for="productImage">Image</label>
            <input class="form-control" type="file" id="productImage" name="productImage" >
            </div>
            <div class="form-group">
            <label for="Category">Category</label>
            <select name="CategoryID" id="CategoryID" class="form-control">                    
                        <option value="<?php echo e($product->categoryID); ?>">                        
                        </option>                    
                </select>  
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>          
        </form>
        <br><br>
    </div>
    <div class="col-sm-3"></div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Ricky\app-name\resources\views/editProduct.blade.php ENDPATH**/ ?>