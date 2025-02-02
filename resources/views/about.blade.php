@extends('layout')
@section('content')
<style>
    .border-box{
        /* border: 2px solid black; */
        background-color: black;
        margin-top: 30px; margin-bottom: 30px;
      }

      .english-font{
        font-family: 'Tangerine', serif;
        font-size: 48px;
        color: white;
        text-shadow: 4px 4px 4px #aaa;
      }

      .chinese-font{
        font-size: 28px;
        color: white;
        font-family: 'Noto Sans SC', sans-serif;
        font-family: 'Roboto Mono', monospace;
      }
</style>
<div class="container text-center">
    <div class="row">
      <div class="col-12">
        <img src="{{ asset('images/about1.png') }}" alt="The story of Office Matters" class="img-fluid">
      </div>

      <div class="col-1"></div>
      <div class="col-10 border-box">
        <p class="english-font">
          Office Matters offer various stationery for school and office supplies,
        <br>providing a one stop shop for all your stationeries and printing needs.
        </p>
        <p class="chinese-font">
          他是个能符合所有学校和来自各行各业文具需求的一站式文具中心，
          <br>多样化的文具选择以及各种杂志印刷服务应有尽有，欢迎大家来逛逛哦。
        </p>
      </div>
      <div class="col-1"></div>
    </div>
  </div>  
  @endsection