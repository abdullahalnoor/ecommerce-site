@extends('admin.master')



@push('style')


<style>
  .status-label {
 color:#fff;
 display:inline-bolck;
 padding:5px;
 text-align: center;
  line-height:25px;
 min-width: 50px;
 font-weight: 500;
}
.status-label-success{
    background:rgb(0, 46, 0);
}
.status-label-info{
    background:rgb(67, 1, 248);
}
.status-label-danger{
    background:rgb(155, 2, 2);
}
.status-label-warning{
    background:rgb(58, 54, 1);
}
</style>


@endpush


@section('title', 'Products')

@section('content')



<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header"><i class="fa fa-table"></i> Order Detail
        {{-- <a class="btn btn-primary btn-round pull-right" href="{{route('admin.product.create')}}"><i
            class="zmdi zmdi-plus-circle"></i><span>Add New Product</span></a> --}}

      </div>
      <div class="card-body">
        <div class="table-responsive">
          <h4>Customer Info</h4>
          <table id="" class="table table-bordered">
            <tbody>
              <tr>
                <td>
                 <b> First Name :</b>
                </td>
                <td>
                  {{$customer->first_name}}
                </td>
              </tr>
              <tr>
                <td>
                 <b> Last Name :</b>
                </td>
                <td>
                  {{$customer->last_name}}
                </td>
              </tr>
              <tr>
                <td>
                  <b>Email :</b>
                </td>
                <td>
                  {{$order->user->email}}
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <br><br>

        <div class="table-responsive">
          <h4>Customer Contact {{$order->shippingAddress ? '' : '/Shipping'}} Info</h4>
          <table id="" class="table table-bordered">
            <tbody>
              <tr>
                <td>
                  <b>Mobile:</b>
                </td>
                <td>
                  {{$customer->mobile}}
                </td>
              </tr>
              <tr>
                <td>
                 <b> Phone:</b>
                </td>
                <td>
                  {{$customer->phone}}
                </td>
              </tr>
              <tr>
                <td>
                 <b> Address One	 :</b>
                </td>
                <td>
                  {{$customer->address_one	}}
                </td>
              </tr>

              <tr>
                <td>
                 <b> Address Two	 :</b>
                </td>
                <td>
                  {{$customer->address_two	}}
                </td>
              </tr>

              <tr>
                <td>
                 <b> City	 :</b>
                </td>
                <td>
                  {{$customer->city	}}
                </td>
              </tr>

              <tr>
                <td>
                 <b> Post Code	 :</b>
                </td>
                <td>
                  {{$customer->post_code	}}
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <br><br>

<div class="table-responsive">
  <h4>Order Info</h4>
  <table id="" class="table table-bordered">
    <tbody>
      <tr>
        <td>
        <b>  Total Price:</b>
        </td>
        <td>
          Tk. {{$order->total}}
        </td>
      </tr>
      <tr>
        <td>
         <b> Date :</b>
        </td>
        <td>
          {{$order->created_at->diffForHumans()}}
        </td>
      </tr>
      <tr>
        <td><b>Order Status</b></td>
        <td>
          {!!  $order->orderStatus() !!}
        </td>
      </tr>
    </tbody>
  </table>
</div>
<br><br>
@if ($order->shippingAddress)
<div class="table-responsive">
  <h4>Shipping Address</h4>
  <table id="" class="table table-bordered">
    <tbody>
      <tr>
        <td>
          <b>First Name :</b>
        </td>
        <td>
          {{$order->shippingAddress->first_name}}
        </td>
      </tr>
      <tr>
        <td>
          <b>Last Name :</b>
        </td>
        <td>
          {{$order->shippingAddress->last_name}}
        </td>
      </tr>
      <tr>
        <td>
         <b> Email :</b>
        </td>
        <td>
          {{$order->shippingAddress->email}}
        </td>
      </tr>
      <tr>
        <td>
          <b>Address :</b>
        </td>
        <td>
          {{$order->shippingAddress->address}}
        </td>
      </tr>
      <tr>
        <td>
         <b> Mobile :</b>
        </td>
        <td>
          {{$order->shippingAddress->mobile}}
        </td>
      </tr>

      <tr>
        <td>
         <b> Phone :</b>
        </td>
        <td>
          {{$order->shippingAddress->phone}}
        </td>
      </tr>

      <tr>
        <td>
         <b> City :</b>
        </td>
        <td>
          {{$order->shippingAddress->city}}
        </td>
      </tr>

      <tr>
        <td>
         <b> Post Code :</b>
        </td>
        <td>
          {{$order->shippingAddress->post_code}}
        </td>
      </tr>
    </tbody>
  </table>
</div>
<br><br>
@endif


<div class="table-responsive">
  <h4>Order Detail </h4>
  <table id="" class="table table-bordered">
    <thead>
      <tr>
        <th> Image</th>
        <th> Name </th>
        <th> Quantity</th>
        <th> in Stock</th>
        <th> Price</th>
        <th>Total</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($orderDetail as $orderItem)
          <form action="{{route('admin.update.order.item')}}" method="POST">
            @csrf
            <input type="hidden" name="order_item_id" value="{{$orderItem->id}}">
            <tr>
              <td>
                <img src="{{asset($orderItem->product->thumbnail)}}" width="80" height="100" class="img-fluid" />
              </td>
              <td>
               {{$orderItem->product->name}}
              </td>
              <td style="width: 15%">

                {{-- {{$orderItem->quantity}} --}}
                <input type="number" class="form-control" min="1"  name="item_quantity" value="{{$orderItem->quantity}}" />
            
              </td>

                <td>
                 
                  @foreach ($orderItem->product->productStocks as $productStock)
                      @if ( $productStock->size_id == $orderItem->size_id)
                          {{ $productStock->purchase_qty}}
                      @endif
                  @endforeach
           
                </td>

                <td>
               
                {{$orderItem->price}}
         
              </td>
              <td>
              {{ $orderItem->quantity * $orderItem->price}}
              </td>
              <td>
                @if ($orderDetail->count() > 1)
                <a href="{{route('admin.delete.order.item',$orderItem->id)}}" onclick="return confirm('are you sure?')" class="btn btn-danger wave-effect">
                  <i aria-hidden="true" class="fa fa-trash"></i>
                  </a>
                @endif
               

                  <button type="submit" onclick="return confirm('are you sure?')" class="btn btn-info wave-effect">
                    <i aria-hidden="true" class="fa fa-edit"></i>
                    </button>
              </td>
            </tr>
          </form>
      @endforeach

    </tbody>
  </table>
</div>


<br><br>
<div class="table-responsive">
  <h4>Order Detail </h4>
  <div class="card-body">
    <form action="{{route('admin.update.order.status')}}" method="POST" enctype="multipart/form-data">
          @csrf
     
    <input type="hidden" name="order_id" value="{{$order->id}}">
        
        <div class="form-group row">
        <label for="basic-input" class="col-sm-12 col-md-2 col-form-label">Order Status <i class="text-danger">*</i> </label>
        <div class="col-sm-12 col-md-8">
          
          <select name="order_status" class="form-control">
           
            <option value="0" {{$order->order_status == 0 ? 'selected' : ''}} >Pending</option>
            <option value="1" {{$order->order_status == 1 ? 'selected' : ''}} >Confirm</option>
            <option value="2" {{$order->order_status == 2 ? 'selected' : ''}} >Cancel</option>
            <option value="3" {{$order->order_status == 3 ? 'selected' : ''}} >Return</option>
            <option value="4" {{$order->order_status == 4 ? 'selected' : ''}} >Delivered</option>
          </select>

          @error('order_status')
          <span class="text-danger" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
        </div>
        <div class="col-sm-12 col-md-2">
          <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
        </div>
        </div>
      



        
    
     </form>
     
           </div>
</div>

      </div>
    </div>
  </div>
</div>



@endsection

@push('js')


<script type="text/javascript">
  $(document).ready(function() {
      //Default data table
       $('#default-datatable').DataTable();


       var table = $('#example').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'print', 'colvis' ]
      } );
 
     table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
      
      } );

</script>




@endpush