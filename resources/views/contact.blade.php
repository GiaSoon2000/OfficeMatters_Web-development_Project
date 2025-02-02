@extends('layout')
@section('content')
<style>
    .border-box {
        border: 5px solid white;
        padding: 10px; /* Add some padding to separate content from the border */
        background-color: rgb(240, 239, 239);
      }
      
      .border-box-up{
        border: 5px solid white;
        background-color: rgb(240, 239, 239);
        padding-top: 10px;
      }
</style>

<div style="margin-top: 50px; text-align: center;">
    <h1 style="letter-spacing: 10px;">CONTACT</h1>
  </div>

  <div class="container" style="text-align: center; margin-top: 80px">
    <div class="row" >
      <div class="col-md-4 border-box-up">
        <h5>Our Store</h5>
        <p>No.19, Jalan Impian Emas 3,<br>Taman Impian Emas,<br>81300, Skudai.</p>
      </div>
      <div class="col-md-4 border-box-up">
        <h5>Opening Hours</h5>
        <p>Monday - Sunday: 10am - 8pm</p>
      </div>
      <div class="col-md-4 border-box-up">
        <h5>Customer Service</h5>
        <p>Whatapps  +60 11-5981 3106<br>Email : Info@officematters.online</p>
      </div>
    </div>
  </div>

  <div style="margin-top: 50px; text-align: center;">
    <h3>Stockists</h3>
  </div>


  <div class="container" style="text-align: center; margin-top: 100px; margin-bottom: 20px; ">
    <div class="row">
      <div class="col-md-3 border-box">
        <h5>Kulai</h5>
        <p>No.346 GF, Jalan Kenanga 29/9,<br>Bandar Indahpura, 81000 Kulai, Johor<br>Tel: 07-662 6851</p>
      </div>
      <div class="col-md-3 border-box">
        <h5>Eco Botani</h5>
        <p>No 51, Jalan Eko Botani 3/5,<br>Taman Eko Botani Iskandar Puteri,<br>79100 Johor Bahru, Johor<br>Tel: 07-662 6851</p>
      </div>
      <div class="col-md-3 border-box">
        <h5>Setia Business Park 2</h5>
        <p>Setia Business Park 2,<br>81100 Johor Bahru, Johor<br>Tel: 011-5981 3106</p>
      </div>
      <div class="col-md-3 border-box">
        <h5>Kluang</h5>
        <p>19 & 21, Jalan Duku,<br>Kampung Masjid Lama,<br>86000 Kluang, Johor<br>Tel: 07-778 5194</p>
      </div>
    </div>
  </div>
  @endsection