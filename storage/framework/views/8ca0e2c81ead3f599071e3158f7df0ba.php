
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-6">
        <br><br>
        <div class="mb-2">
            <a href="<?php echo e(route('addProduct')); ?>" class="btn btn-primary">Add Product</a>
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
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($product->id); ?></td>
                    <td><img src="<?php echo e(asset('images/')); ?>/<?php echo e($product->image); ?>" alt="" width="100" class="img-fluid"></td>
                    <td><?php echo e($product->name); ?></td>
                    <td><?php echo e($product->price); ?></td>
                    <td><?php echo e($product->quantity); ?></td>
                    <!-- <td><?php echo e($product->categoryID); ?></td> -->
                    <td>
                        <?php
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
                        ?>
                    </td>
                    <td><a href="<?php echo e(route('editProduct',['id'=>$product->id])); ?> " class="btn btn-info btn-xs">Edit</a>&nbsp;
                    </td>
                    <td>
                        <form action="<?php echo e(route('deleteProduct',['id'=>$product->id])); ?>" method="POST" onsubmit="return confirm('Are you sure to delete this product?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                        </form>
                    </td>
                    
                    
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


<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Ricky\Web_Project1\resources\views/showProduct.blade.php ENDPATH**/ ?>