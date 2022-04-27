@extends('Dashboard.admin')
@section('content')
<div class="card">
  <div class="card-body">
    <h4>Retun Product </h4>
  </div>
</div>
<form action="{{route('return.order',['id'=>$order['id']])}}" method="POST"  class="mt-3">
  @csrf
  @method('PUT')
  <div class="row justify-content-center">
    <div class="col-10">
      <div class="card">
        <div class="card-body">
          <div class="row">
               <input type="hidden" name="product_id" value="{{$order['product_id']}}">
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="" class="font-weight-bold">
                  Product Name</span>
                </label>
                <input type="text" name="product" value="{{$order['product']}}" class="form-control" readonly>
              </div>
            </div>
            
            
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="" class="font-weight-bold">
                  Total Price
                </label>
                <input type="text" name="sub_total" class="form-control" value="{{$order['price']}}" readonly>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="form-group">
              <label for="" class="font-weight-bold">Total </label>
              <input type="text" name="total " class="form-control" value="{{$order['total']}}" readonly>
             </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="" class="font-weight-bold">
                  Discount
                </label>
                <input type="text" name="discount" class="form-control" value="{{$currency['discount']}}" readonly>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="" class="font-weight-bold">
                  Quentity
                </label>
                <input type="text" name="quentity" class="form-control" value="{{$order['quentity']}}" >
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="" class="font-weight-bold">
                  Return Charges <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" name="return_charges"> 
              </div>
            </div>
            <div class="col-12 col-md-12">
              <div class="form-group">
                <label for="" class="font-weight-bold">
                  Return Reason <span class="text-danger">*</span>
                </label>
                <textarea class="form-control" placeholder="Product return reason" name="return_reason" rows="3"></textarea>
              </div>
            </div>
          </div>
          
          
          <div>
            
          </div>
          
          
          
          <div class="row">
            <div class="col-12">
              <button type="submit"  class="btn btn-primary">
                Save
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</form>

@endsection

@section('script')

@parent

<script>


</script>

@endsection