@extends('layout')
@section('content')
<!-- Carousel Section -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="margin-top: 25px; margin-bottom: 25px;">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="{{ asset('images/Logo.jpg') }}" class="d-block" alt="Image 1">
        </div>
        <div class="carousel-item">
          <img src="{{ asset('images/img2.jpg') }}" class="d-block" alt="Image 2">
        </div>
        <div class="carousel-item">
          <img src="{{ asset('images/img1.jpg') }}" class="d-block" alt="Image 3">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <!--After carousel-->
<div style="width: 100%;">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <a href="{{route('deskAccessories')}}"><img src="{{ asset('images/img11.png') }}" alt="Tape" class="img-fluid"></a>
      </div>
      <div class="col-md-6">
        <a href="{{route('pens')}}"><img src="{{ asset('images/img22.jpg') }}" alt="Pencil" class="img-fluid"></a>
      </div>
    </div>
  </div>
</div>

    <!--Three middle photo and the text below-->
<div style="width: 100%; margin-top: 2%;">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div style="text-align: center;">
          <img src="{{ asset('images/pencilBox.jpg') }}" alt="Pencil Box" class="img-fluid">
          <a href="{{route('deskAccessories')}}"><button class="btn btn-custom">Desk Accessories</button>
          <div style="margin-top: 10px; color: #000; font-weight: 400; font-size: 25px;">Back to School<br> With Style</div>
        </div>
      </div>
      <div class="col-md-4">
        <div style="text-align: center;">
          <img src="{{ asset('images/pen.jpg') }}" alt="Pen" class="img-fluid">
          <a href="{{route('pens')}}"><button class="btn btn-custom">Pens & Pencils</button>
          <div style="margin-top: 10px; color: #000; font-weight: 400; font-size: 25px;">Our New<br> Writing Collection</div>
        </div>
      </div>
      <div class="col-md-4">
        <div style="text-align: center;">
          <img src="{{ asset('images/notebooks11.jpg') }}" alt="Notebooks" class="img-fluid">
          <a href="{{route('notebooks')}}"><button class="btn btn-custom">Notebooks</button>
          <div style="margin-top: 10px; color: #000; font-weight: 400; font-size: 25px;">Your Ideas.<br> Our Beautiful Notebooks</div>
        </div>
      </div>
    </div>
  </div>
</div>
  @endsection