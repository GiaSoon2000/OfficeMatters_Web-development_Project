
<?php $__env->startSection('content'); ?>
    <div class="row">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
            <div class="card-body">
            <form action="<?php echo e(route('addCart')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
            <div class="row">
                <div class="col-md-3">
                    <h5 class="card-title"><?php echo e($product->name); ?></h5>
                    <img src="<?php echo e(asset('images')); ?>/<?php echo e($product->image); ?>" alt="" class="img-fluid">
                </div>
                <div class="col-md-9">
                    <br><br>
                    <div class="card-heading">Quantity <input type="number" name="quantity" value="1" min="1"> Available: <?php echo e($product->quantity); ?></div>
                    <br><br>
                    <div class="card-heading">RM <?php echo e($product->price); ?></div>
                    <br>
                    <button class="btn btn-danger btn-xs" type="submit">Add to Cart</button>
                </div>
            </form>
            </div>                
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Ricky\Web_Project1\resources\views/showProductDetail.blade.php ENDPATH**/ ?>