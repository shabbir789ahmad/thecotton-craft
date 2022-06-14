@extends('Dashboard.admin')
@section('content')

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper" style="background-color:#F0F0F0">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            
          </div>

          <div class="row mb-3">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Earnings (Monthly)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$earn}}</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-success mr-2"> {{ceil($en)}}%</span>
                        <span>Since last month</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Sales</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$sale}}</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-success mr-2"></i> {{ceil($sl)}}%</span>
                        <span>Since last Month</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-shopping-cart fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- New User Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">New User</div>
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$user}}</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-success mr-2"> {{ceil($pr)}}%</span>
                        <span>Since last month</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Order</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$order}}</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-success mr-2"> {{ceil($or)}}%</span>
                        <span>Since yesterday</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-warning"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
 <!-- Area Chart -->
            <div class="row mb-5">
            <div class="col-xl-6 col-lg-6">
              <div class="card shadow mb-4">
                <div class="border header_color border-bottom  py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-light ml-3">Top Selling Product</h6>
                  
                </div>
                <div class="card-body">
                  
                    <div id="piechart" style="width: 550px; height: 300px;"></div>
                
                </div>
              </div>
            </div>
            <!-- Pie Chart -->
            <div class="col-xl-6 col-lg-6">
              <div class="card shadow">
                <div class="border border-bottom py-3 header_color d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-light ml-2">Today Orders</h6>
                  <a class="m-0 float-right btn header_color btn-sm mr-3" href="{{route('all.review')}}">View More <i
                      class="fas fa-chevron-right"></i></a>
                </div>
                <div >
                  <div class="table-responsive">
                  <table class="table align-items-center table-flush table-hover  table-bordered table-striped">
                    <thead class="thead-light">
                      <tr>
                        <th>Name</th>
                        <th>Review </th>
                        <th>Rating</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      @foreach($user_review as $order)

                      <tr>
                        <td>{{ucfirst($order['uname'])}}</td>
                        <td>{{ucfirst($order['message'])}}</td>
                        <td>{{$order['rating']}} <span class="fa fa-star checked"></span></td>
                        
                      </tr>
                     @endforeach
                     
                    </tbody>
                  </table>
                </div>
                  
                  
                </div>
              </div>
            </div>
            <!-- Invoice Example -->
            <div class="col-xl-6 col-lg-6 mb-4">
              <div class="card">
                <div class="border border-bottom py-3 d-flex flex-row align-items-center header_color justify-content-between">
                  <h6 class="m-0 font-weight-bold text-light ml-3">Today Orders</h6>
                  <a class="m-0 float-right btn header_color btn-sm mr-3" href="{{url('/orders')}}">View More <i
                      class="fas fa-chevron-right"></i></a>
                </div>
                <div class="table-responsive" style="height:20rem;overflow:auto;">
                  <table class="table align-items-center table-hover  table-bordered table-striped table-flush">
                    <thead class="thead-light">
                      <tr>
                       
                        <th>Customer</th>
                        <th>Product</th>
                        <th>Quentity</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      @foreach($today as $order)

                      <tr>
                        <td>{{$order['name']}}</td>
                        <td>{{$order['product']}}</td>
                        <td>{{$order['quentity']}}</td>
                        <td><span class="badge badge-success">{{$order['order_status']}}</span></td>
                        <td><a href="{{route('admin.show-order',['id'=>$order['id']])}}" class="btn btn-sm btn-primary">Detail</a></td>
                      </tr>
                     @endforeach
                     
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
            <div class="col-xl-6 col-lg-6">
              <div class="card shadow">
                <div class="border border-bottom py-3 header_color d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-light ml-2">Product With Low Stock</h6>
                  <a class="m-0 float-right btn header_color btn-sm mr-3" href="{{route('all.review')}}">View More <i
                      class="fas fa-chevron-right"></i></a>
                </div>
                <div >
                  <div class="table-responsive" style="height:20rem;overflow:auto;">
                  <table class="table align-items-center table-flush table-hover  table-bordered table-striped">
                    <thead class="thead-light">
                      <tr>
                        <th>Name</th>
                        <th>Stock </th>
                        <th>Price</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      @foreach($products as $product)

                      <tr >
                        <td>{{ucfirst($product['name'])}}</td>
                        <td>{{$product['total']}}</td>
                        <td>{{$product['price']}} </td>
                        <td><a href="{{'update-product/'.$product['id']}}" class="border shadow  py-2 px-3"><i class="fas fa-edit text-success"></i>
                         </a> </td>
                        
                      </tr>
                     @endforeach
                     
                    </tbody>
                  </table>
                </div>
                  
                  
                </div>
              </div>
            </div>
            <!-- Message From Customer-->
            <div class="col-xl-4 col-lg-5 ">
              
            </div>
          </div>
          <!--Row-->
         

        </div>
        <!---Container Fluid-->
      </div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'product pr sell'],
          <?php echo $chartdata2 ?>
        ]);

        var options = {
          title: 'Top Selling Products'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>


@endsection