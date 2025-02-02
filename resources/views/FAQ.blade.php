@extends('layout')
@section('content')
<div class="container mt-5">
    <h1 class="text-center">FAQ</h1>
    <h3 class="text-center">ANSWERS? WE'VE GOT THEM.</h3>

    <div class="row mt-5">
      <div class="col-md-10 offset-md-1">
        <h4>SHIPPING</h4>
        <p><strong>Do you ship internationally?</strong></p>
        <p>Please contact our admin if you need us to ship internationally. <a href="{{route('contact')}}">Contact Us.</a></p>
        
        <p><strong>How long does shipping take?</strong></p>
        <p>Generally, it takes 3-5 days.</p>
        
        <p><strong>Will customers be charged for taxes?</strong></p>
        <p>Customers will be charged 6% GST as per Malaysia's Sales & Service Tax Act. Unless otherwise stated in Terms & Conditions.</p>

        <h4 class="mt-4">PAYMENT & WARRANTY</h4>
        <p><strong>What forms of payments do we accept?</strong></p>
        <p>Stapler.Com.MY prefers to use Paypal as our main payment processor. The different methods of payments are described:</p>
        <ul>
          <li>Paypal: You can use your Paypal account during checkout to make payment.</li>
          <li>Credit Card</li>
          <li>Cash/Cheque On Delivery or Collection: You can make payment direct to us via Online Banking Transfer</li>
        </ul>
        <p>Payee: LCM Marketing Sdn Bhd</p>
        <p>Bank: HLBB 005 003 14368</p>
        
        <h4 class="mt-4">RETURNS</h4>
        <p><strong>Are all items returnable?</strong></p>
        <p>All items are non-returnable once sold. Unless it’s a damaged/low-quality item, but need to be reported to customer service within 3 days after receiving. <a href="{{route('contact')}}">Contact Us</a>. All returned items must be in original condition.</p>
        
        <p><strong>What's the policy for cancelling an order?</strong></p>
        <p>An order (or part of the order) cannot be cancelled once your credit card payment is verified and authorised. You cannot cancel your order after having read and accepted the Terms & Conditions.</p>
        
        <p><strong>Still got questions?<a href="{{route('contact')}}">Contact Us.</a></strong> </p> 
    </div>
    </div>
  </div>
  @endsection