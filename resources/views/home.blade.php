@extends('layouts.app')

<style type="text/css">
    .image-size {
        max-width: 100px !important;
    }
</style>
@section('content')

        @if (Session::has('status'))
            <div class="alert alert-warning"> {!! Session::get('status') !!}</div>
        @endif

    <section id="portfolio" class="bg-faded" style="background-color:  #333333;">
        <div class="container">
            <div class="row">
               
                @foreach($products as $product)
           
            <div class="col-md-4 portfolio-item">
                   <form action="/add" method="post"> {{CSRF_field()}}

                        <img src="img/{{ $product -> imagePath }}" class="img-fluid" width="100%">
                    
                    <div class="portfolio-caption">
                        <h4><strong> {{ $product -> product_name }} </strong></h4><br>
                        <p class="text-muted"> Lorem ipsum dolor sit amet, consectetur dipisicing elit. </p><br>
                    <p class="clearfix">
                        <strong style="font-size:20px;"> ${{$product -> product_price}} </strong>
                        <input type="hidden" name="product_id" value="{{ $product -> product_id }}">
                        <input type="hidden" name="customer_id" value="{{ Auth::user() -> id }}">
                        <input type="hidden" name="product_name" value="{{ $product -> product_name }}">
                        <input type="hidden" name="product_quantity" value=" {{ $product -> product_quantity }}">
                        <input type="hidden" name="product_price" value="{{ $product -> product_price }}">
                        <input type="hidden" name="imagePath" value="{{ $product -> imagePath }}">
                        <button class="btn btn-success pull-right" type="submit" style="font-family: Montserrat Light; font-size:15px;"> Purchase  <i class="fa fa-cart-plus" aria-hidden="true"></i></button>
                    </p>
                    </div> 
                     </form>
                </div>
        @endforeach
    </div>   
</div>
</section>

@endsection
