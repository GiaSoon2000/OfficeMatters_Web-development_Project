
<?php $__env->startSection('content'); ?>

<script>
    function cal(){
        var names=document.getElementsByName('subtotal[]');
        var subtotal=0;
        var cboxes=document.getElementsByName('cid[]');
        var len=cboxes.length; //get number  of cid[] checkbox inside the page
        for(var i=0;i<len;i++){
            if(cboxes[i].checked){  //calculate if checked
                subtotal=parseFloat(names[i].value)+parseFloat(subtotal);
            }
        }
        document.getElementById('sub').value=subtotal.toFixed(2); //convert 2 decimal place      
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<form action="<?php echo e(route('payment.post')); ?>" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="<?php echo e(env('STRIPE_KEY')); ?>" id="payment-form">    
<?php echo csrf_field(); ?>
<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <br><br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>&nbsp;</td>
                    <td>Name</td>                    
                    <td>Price (RM)</td>
                    <td>Quantity</td>
                    <td>Subtotal (RM)</td> 
                </tr>
            </thead> 
            <tbody>
                <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                    <input type="checkbox" name="cid[]" id="cid[]" value="<?php echo e($product->cid); ?>" onclick="cal()">
                    <input type="hidden" name="subtotal[]" id="subtotal[]" value="<?php echo e($product->price*$product->cartQty); ?>">
                    <img src="<?php echo e(asset('images/')); ?>/<?php echo e($product->image); ?>" alt="" width="100" class="img-fluid"></td>
                    <td><?php echo e($product->name); ?></td>
                    <td><?php echo e($product->price); ?></td>
                    <td><?php echo e($product->cartQty); ?></td> 
                    <td><?php echo e($product->price*$product->cartQty); ?></td>
                    <!-- Add a column for the remove button -->
                    <td>
                        <form action="<?php echo e(route('removeCartItem', ['id' => $product->cid])); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('post'); ?> <!-- Add this line to specify the method -->
                            <button type="submit" class="btn btn-danger">Remove</button>
                        </form>
                    </td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
                
                

                <tr align="left">
                    <td colspan="4">&nbsp;</td>
                    
                    <td>RM<i> </i> <input type="text" value="0" name="sub" id="sub" size="7" readonly /></td>
                </tr>

                
            </tbody>
        </table>
    </div>
    <div class="col-sm-3"></div>
</div>
<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-10"></div>
</div>




<div class="row">  
<div class="col-sm-2"></div>        
            <div class="col-md-6 col-md-offset-3">
               <div class="panel panel-default credit-card-box">
                  <div class="panel-heading" >
                     <div class="row">
                        <h3>Card Payment</h3>                        
                     </div>
                  </div>
                  <div class="panel-body">                    
                     <br>                     
                        <div class='form-row row'>
                           <div class='col-xs-12 col-md-6 form-group required'>
                              <label class='control-label'>Name on Card</label> 
                              <input class='form-control' size='4' type='text'>
                           </div>
                           <div class='col-xs-12 col-md-6 form-group required'>
                              <label class='control-label'>Card Number</label> 
                              <input autocomplete='off' class='form-control card-number' size='20' type='text'>
                           </div>                           
                        </div>                        
                        <div class='form-row row'>
                           <div class='col-xs-12 col-md-4 form-group cvc required'>
                              <label class='control-label'>CVC</label> 
                              <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                           </div>
                           <div class='col-xs-12 col-md-4 form-group expiration required'>
                              <label class='control-label'>Expiration Month</label> 
                              <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                           </div>
                           <div class='col-xs-12 col-md-4 form-group expiration required'>
                              <label class='control-label'>Expiration Year</label> 
                              <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                           </div>
                        </div>
                      
                        <div class="form-row row">
                           <div class="col-xs-12">
                              <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now</button>
                           </div>
                        </div>                     
                  </div>
               </div>
            </div>
			
        </div>            
</form>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
$(function() {
  var $form = $(".require-validation");
  $('form.require-validation').bind('submit', function(e) {
    var $form = $(".require-validation"),
    inputSelector = ['input[type=email]', 'input[type=password]', 'input[type=text]', 'input[type=file]', 'textarea'].join(', '),
    $inputs = $form.find('.required').find(inputSelector),
    $errorMessage = $form.find('div.error'),
    valid = true;
    $errorMessage.addClass('hide');
    $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
        var $input = $(el);
        if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
        }
    });
    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
          number: $('.card-number').val(),
          cvc: $('.card-cvc').val(),
          exp_month: $('.card-expiry-month').val(),
          exp_year: $('.card-expiry-year').val()
      }, stripeResponseHandler);
    }
  });

  function stripeResponseHandler(status, response) {
      if (response.error) {
          $('.error')
              .removeClass('hide')
              .find('.alert')
              .text(response.error.message);
      } else {
          /* token contains id, last4, and card type */
          var token = response['id'];
          $form.find('input[type=text]').empty();
          $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
          $form.get(0).submit();
      }
  }
});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Ricky\Web_Project1\resources\views/myCart.blade.php ENDPATH**/ ?>