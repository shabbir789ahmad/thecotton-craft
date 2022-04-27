<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Invoice</title>
    
    <style type="text/css">
  .clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #5D6975;
  text-decoration: underline;
}

body {
  position: relative;
  width: 21cm;  
  height: 29.7cm; 
  margin: 0 auto; 
  color: #001028;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 12px; 
  font-family: Arial;
}

header {
  padding: 10px 0;
  margin-bottom: 30px;
}

#logo {
  text-align: center;
  margin-bottom: 10px;
}

#logo img {
  width: 90px;
}

h1 {
  border-top: 1px solid  #5D6975;
  border-bottom: 1px solid  #5D6975;
  color: #5D6975;
  font-size: 2.4em;
  line-height: 1.4em;
  font-weight: normal;
  text-align: center;
  margin: 0 0 20px 0;
 
}

#project {
  float: left;
}

span {
  color: #5D6975;
  text-align: right;
  /*width: 52px;*/
  padding-right: 20%;
  margin-right: 10px;
  display: inline-block;
  font-size: 0.8em;
}

#company {
  float: right;
  text-align: right;
}

#project div,
#company div {
  white-space: nowrap;        
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table tr:nth-child(2n-1) td {
  background: #F5F5F5;
}

table th,
table td {

}

table th {
  padding: 5px 20px;
  color: #5D6975;
  border-bottom: 1px solid #C1CED9;
  white-space: nowrap;        
  font-weight: normal;
}

table .service,
table .desc {
  text-align: left;
}

table td {
  padding: 20px;
  text-align: ;
}

table td.service,
table td.desc {
  vertical-align: top;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table tr {

  border-top: 1px solid  #5D6975;
  border-bottom: 1px solid  #5D6975;
}

#notices .notice {
  color: #5D6975;
  font-size: 1.2em;
}

footer {
  color: #5D6975;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #C1CED9;
  padding: 8px 0;
  text-align: center;
}
.btn_color{
   background-color: #580631; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  float: right;
  cursor: pointer;
}

.prints{
  background-color: #580631; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: block;
  font-size: 16px;

}
.print {
  margin-top: 4%;
}
  @media print{
  .prints {
   
    display: none;
  }
 
}
</style>
  </head>
  <body>
    <button class=" prints " >Print</button><br>
    <div class="print" >
    <header class="clearfix">
      <div id="logo">
        @foreach($logo as $log)
        <img src="{{asset('uploads/img/' .$log['logo'])}}">
        @endforeach
      </div>
      <h1>INVOICE </h1>
      <div id="company" class="clearfix">
        <div>The Cotton&Craft</div>
        <div>LAHORE, PAKISTAN</div>
        <div>923204303734</div>
        <div>thecottonandcraft79@gmail.com</div>
      </div>
      <div id="project">
        
        <div><span>CLIENT</span>{{ucfirst($order['name'])}}</div>
        <div><span>ADDRESS</span>{{ucfirst($order['address'])}}</div>
        <div><span>EMAIL</span> {{ucfirst($order['email'])}}</div>
        <div><span>PHONE</span>{{ucfirst($order['phone'])}}</div>
        <div><span>DATE</span> {{date('d-m-Y', strtotime($order['created_at']))}} </div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr >
            <th  >IMAGE</th>
            <th >NAME</th>
            <th >CITY</th>
            <th >PRICE</th>
            <th >QTY</th>
            <th >TOTAL</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td  style="width:15%"><img src="{{asset('uploads/img/'.$order['image'])}}" width="100%"></td>
            <td >{{$order['product']}}</td>
            <td >{{$order['city']}}</td>
            <td >{{$order['price']}}</td>
            <td >{{$order['quentity']}}</td>
            <td >{{$currency['currency']}}{{$order['total']}}</td>
          </tr>
          
          <tr>
            <td colspan="8" class="grand total" style="font-weight: bold;">GRAND TOTAL</td>
            <td class="grand total " style="font-weight: bold;">{{$currency['currency']}}{{$order['total']}}</td>
          </tr>
        </tbody>
      </table>
  
    </main>
    <header class="clearfix">
      <div id="logo">
        @foreach($logo as $log)
        <img src="{{asset('uploads/img/' .$log['logo'])}}">
        @endforeach
      </div>
      <h1>INVOICE </h1>
      <div id="company" class="clearfix">
        <div>The Cotton&Craft</div>
        <div>LAHORE, PAKISTAN</div>
        <div>923204303734</div>
        <div>thecottonandcraft79@gmail.com</div>
      </div>
      <div id="project">
        
        <div><span>CLIENT</span>{{ucfirst($order['name'])}}</div>
        <div><span>ADDRESS</span>{{ucfirst($order['address'])}}</div>
        <div><span>EMAIL</span> {{ucfirst($order['email'])}}</div>
        <div><span>PHONE</span>{{ucfirst($order['phone'])}}</div>
        <div><span>DATE</span> {{date('d-m-Y', strtotime($order['created_at']))}} </div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">IMAGE</th>
            <th class="desc">NAME</th>
            <th class="desc">CITY</th>
            <th>PRICE</th>
            <th>QTY</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="service " style="width:15%"><img src="{{asset('uploads/img/'.$order['image'])}}" width="100%"></td>
            <td class="unit">{{$order['product']}}</td>
            <td class="unit">{{$order['city']}}</td>
            <td class="unit">{{$order['price']}}</td>
            <td class="unit">{{$order['quentity']}}</td>
            <td class="unit">{{$currency['currency']}}{{$order['total']}}</td>
          </tr>
          
          <tr>
            <td colspan="8" class="grand total" style="font-weight: bold;">GRAND TOTAL</td>
            <td class="grand total " style="font-weight: bold;">{{$currency['currency']}}{{$order['total']}}</td>
          </tr>
        </tbody>
      </table>
     
    </main>
   </div>
   

   <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
   <script type="text/javascript">
     $('.prints').click(function(){

  window.print();
     });
   </script>
  </body>
</html>