
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <br><br>
        <div class="card border-0">
            <h5 class="card-title">Desk Accessories</h5>
            <div class="row">
                <?php $__currentLoopData = $deskAccessories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deskAccessorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="item">
                                <h5><?php echo e($deskAccessorie->name); ?></h5>
                                <img src="<?php echo e(asset('images/')); ?>/<?php echo e($deskAccessorie->image); ?>" class="img-fluid" alt="">
                                <span>RM <?php echo e($deskAccessorie->price); ?></span>
                                <br>
                                <form action="<?php echo e(route('addCart', ['id' => $deskAccessorie->id])); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <div class="card-heading">
                                        Quantity 
                                        <input type="number" name="quantity" value="1" min="1"> 
                                        Available: <?php echo e($deskAccessorie->quantity); ?>

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

<script>
     const addToCartButtons = document.querySelectorAll('.btn-add-to-cart');
    const cartCount = document.getElementById('cart-count');
    let cartItems = [];

    addToCartButtons.forEach((button) => {
        button.addEventListener('click', () => {
            const itemName = button.getAttribute('data-item');
            const itemPrice = parseFloat(button.getAttribute('data-price'));
            
            cartItems.push({
                name: itemName,
                price: itemPrice
            });
            
            const itemCount = cartItems.length;
            cartCount.textContent = '(' + itemCount + ')';
            cartCount.style.display = 'inline'; // Display the count
            
            // Store cart items in sessionStorage
            sessionStorage.setItem('cartItems', JSON.stringify(cartItems));
        });
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Ricky\Web_Project1\resources\views/desk.blade.php ENDPATH**/ ?>