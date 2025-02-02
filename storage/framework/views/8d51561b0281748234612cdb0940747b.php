
<?php $__env->startSection('content'); ?>
    <style>
        .product-card {
        border: 1px solid #ccc;
        padding: 20px;
        margin: 20px; /* Add margin to create space around each product card */
        width: calc(33.33% - 40px); /* Adjust width to fit three cards in a row with margins */
        float: left; /* Allow cards to float next to each other */
        box-sizing: border-box;  /*Include padding and border in the element's total width and height */
        border: none;
    }

    .product-card img {
        width: 100%;
        height: auto;
        margin-bottom: 10px;
    }

    .product-details {
        text-align: left;
    }

    .product-details h2 {
        margin-bottom: 10px;
    }

    .product-details p {
        margin-bottom: 5px;
    }

    .add-to-cart-btn {
        background-color: red;
        color: white;
        padding: 10px 20px;
        text-align: left;
        text-decoration: none;
        display: inline-block;
        border-radius: 5px;
        transition-duration: 0.4s;
        cursor: pointer;
    }

    .add-to-cart-btn:hover {
        background-color: #45a049;
    }
    </style>
    <h1>Search Results</h1>

    <?php if(count($results) > 0): ?>
        <div class="row clearfix">
            <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="product-card">
                    <div class="product-details">
                        <h2><?php echo e($result->name); ?></h2>
                        <img src="<?php echo e(asset('images/' . $result->image)); ?>" alt="<?php echo e($result->name); ?>">
                        <p>RM <?php echo e($result->price); ?></p>
                        <a href="#" class="add-to-cart-btn">Add to Cart</a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php else: ?>
        <p>No results found.</p>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Ricky\app-name\resources\views/search.blade.php ENDPATH**/ ?>