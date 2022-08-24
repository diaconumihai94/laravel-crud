    @extends('layout')

    @section('content')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-center">Product Management App</h2>
            </div>
            <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
                @if (Auth()->user()->name=='admin')
                            <a class="btn btn-success " href="{{ url('products/create') }}"> Add Product</a>
                @else
                            <!--<a class="btn btn-success " href="{{ url('products/create') }}"> Add Product</a>-->
                @endif
                <!--<a class="btn btn-success " href="{{ url('auth/login') }}"> Login</a>-->
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                Welcome, {{ ucfirst(Auth()->user()->name) }} !
            </div>
            <div class="card-body">
                <a class="small" href="{{url('auth/logout')}}">Logout</a>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif

        <form  class = "form-control input-lg dynamic" action="{{ route('search') }}" method="GET">
            <input class= "cole-lg-12 input-lg" type="text" name="search" placeholder="Search by name" required/>
            <button class = "btn" type="submit">Search</button>
        </form>

        @if(sizeof($products) > 0)
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Product Name</th>
                    <th>Product Description</th>
                    <th>Status</th>
                    <th>Price</th>
                    <th>Reference Code</th>
                    <th width="280px">More</th>
                </tr>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->product_description }}</td>
                        <td>
                            @if (Auth()->user()->name=='admin')
                            <input data-id="{{$product->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $product->product_status=="1" ? 'checked' : '' }}>
                            @else
                            {{ $product->product_status=="1" ? "Active" : "Inactive" }}
                            @endif
                        </td>
                        <td>{{ $product->product_price }}</td>
                        <td>{{ $product->product_code }}</td>
                        <td>
                            @if (Auth()->user()->name=='admin')
                            <form action="{{ url('products/destroy',$product->id) }}" method="POST">
                                <a class="btn btn-info" href="{{ url('products/show',$product->id) }}">Show</a>
                                <a class="btn btn-primary" href="{{ url('products/edit',$product->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            @else
                            <a class="btn btn-info" href="{{ url('products/show',$product->id) }}">Show</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
        @else
            <div class="alert alert-alert">Start Adding to the Database.</div>
        @endif

        {!! $products->links() !!}

      <script>
          $(function() {
            $('.toggle-class').change(function() {
                var status = $(this).prop('checked') == true ? "1" : "0";
                var product_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/products/changeStatus',
                    data: {'status': status, 'id': product_id},
                    success: function(data){
                      console.log(data.success)
                    }
                });
            })
          })
        </script>
    @endsection
