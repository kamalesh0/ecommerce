@extend('products.layout')
@section('content')
<div class="pull-left">
          <h2>Product CRUD DETAILS</h2>
</div>
    <div class="row">
        <div class="col-lg-12 margin-tb">

            <div class="pull-right">
              <a class="btn btn-success" href="{{ route('products.create') }}">Create a New Product</a>
            </div>
        </div>
    </div>
    
    @if($message = Session::get('success'))
        <div class="alert alert-success">
           <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table-bordered">
        <tr>
            <th>Product_Id</th>
            <th>Product_Name</th>
            <th>Product_Price</th>
            <th>Product_Quantity</th>
            <th width="280px">Action</th>
        </tr>
        @foreach($products as $product)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $product->Product_Name }}</td>
            <td>{{ $product->Product_price }}</td>
            <td>{{ $product->Product_Quantity }}</td>
            <td>
                <form action="{{route('products.destroy',$product->id)}}" method="POST">
                    <a class ="btn btn-info" href="{{route('products.destroy',$product->id)}}">Show</a>
                    <a class ="btn btn-primary" href="{{route('products.edit',$product->id)}}">Edit</a>

                    @csrf
                    @method('Delete')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
