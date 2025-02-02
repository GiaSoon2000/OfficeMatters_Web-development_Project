
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <br><br>
        <div class="card border-0">
            <h5 class="card-title">Pens & Pencils</h5>
            <div class="row">
                <?php $__currentLoopData = $pens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="item">
                                <h5><?php echo e($pen->name); ?></h5>
                                <img src="<?php echo e(asset('images/')); ?>/<?php echo e($pen->image); ?>" class="img-fluid" alt="">
                                <span>RM <?php echo e($pen->price); ?></span>
                                <br>
                                <form action="<?php echo e(route('addCart', ['id' => $pen->id])); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <div class="card-heading">
                                        Quantity 
                                        <input type="number" name="quantity" value="1" min="1"> 
                                        Available: <?php echo e($pen->quantity); ?>

                                    </div>
                                    <br>
                                    <button class="btn btn-danger btn-xs" type="submit">Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <div class="col-sm-2"></div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Ricky\Web_Project1\resources\views/pen.blade.php ENDPATH**/ ?>