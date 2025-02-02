
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-6">
        <br><br>
        <table class="table table-bordered">
            <thead>
                
                <tr>
                    <td>ID</td>
                    <td>Image</td>
                    <td>Name</td>
                    <td>Description</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Category</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($product->id); ?></td>
                    <td><img src="<?php echo e(asset('images/')); ?>/<?php echo e($product->image); ?>" alt="" width="100" class="img-fluid"></td>
                    <td><?php echo e($product->name); ?></td>
                    <td><?php echo e($product->description); ?></td>
                    <td><?php echo e($product->price); ?></td>
                    <td><?php echo e($product->quantity); ?></td>
                    <td><?php echo e($product->categoryID); ?></td>
                    <td><a href="<?php echo e(route('editProduct',['id'=>$product->id])); ?> " class="btn btn-info btn-xs">Edit</a>&nbsp;
                    <a href="<?php echo e(route('deleteProduct',['id'=>$product->id])); ?> " class="btn btn-danger btn-xs" 
                    onClick="return confirm('Are you sure to delete this product?')">Delete</a></td>
                    
                    
                    
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <div class="col-sm-4"></div>
    <div class="col-sm-2"></div>
    <div class="col-sm-6"></div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Ricky\app-name\resources\views/showProduct.blade.php ENDPATH**/ ?>