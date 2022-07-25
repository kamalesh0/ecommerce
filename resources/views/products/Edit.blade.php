@extend('products.layout')
@section('content')
     <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
              <h2>Edit products</h2>
            </div>
            <div class="pull-right">
              <a class ="btn btn-primary" href="{{route('products.index')}}">Back</a>
            </div>
        </div>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops</strong>There were some problem in your input.<br><br>
            <ul>
                @foreach($errors->all() as $error)
                  <li>{{ $error }} </li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('products.store')}}" method="POST">
        @csrf
        @method('PUT')
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="from-group">
                   <strong>Product_Name</strong>
                   <input type="text" name="Product_Name" value="{{ $product->Product_Name }}" class="from-control" placeholder="Product_Name"> 
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="from-group">
                   <strong>Product_price</strong>
                   <input type="text" name="Product_price" value="{{ $product->Product_price }}" class="from-control" placeholder="Product_price"> 
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="from-group">
                   <strong>Product_Quantity</strong>
                   <input type="text" name="Product_Quantity" value="{{ $product->Product_Quantity }}" class="from-control" placeholder="Product_Quantity"> 
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
               <button type="submit" class="btn btn-primary">Submit</button>
            </div>
         </div>
    </form>
@endsection