@extends('admin.index')
@section('title','Pharmacies')
@section('section_title','Pharmacies')
@section('content')

<div class="row my-3">
    <div class="card bg-light col-md-4 m-5" style="width: 18rem;">
        <h3 class="card-header">
        Pharmacy Info
        </h3>
        <div class="card-body">
        <h5 class="card-title text-primary">{{$pharmacy->pharmacy_name}}</h5>
          <p class="card-text">{{$pharmacy->email}}</p>
          <p class="card-text">{{$pharmacy->national_id}}</p>
          <p class="card-text">{{$pharmacy->created_at}}</p>
          
        </div>
        <div class="col-md-12 "> 
                <a class="btn btn-primary"  href="/pharmacies">Back</a>
         </div>
      </div>
      </div>

      @endsection      