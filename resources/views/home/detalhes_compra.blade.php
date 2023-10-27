<!DOCTYPE html>
<html>
   <head>
   <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="{{asset('home/images/favicon.png')}}" type="">
      <title>Trocar.se</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />
      <!-- font awesome style -->
      <link href="{{asset('home/css/font-awesome.min.css')}}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />

      <style type="text/css">
        .title_deg
        {
            text-align:center;
            font-size: 25px;
            font-weight:bold;
            padding-bottom:25px;
        }

        .table_deg
        {
      
            border: 2px solid black;
            width:100%;
            margin:auto;
            margin-top:30px;
            text-align: center;
        }

        .img_size
        {
          width: 200px;
          height: 200px;
        }

        *{
    margin: 0;
    padding: 0;
        }
 
            </style>


        
   </head>
   <body>
      <div class="hero_area">

      <!--cabeçalho chamado-->
        @include('home.cabecalio')
      <!--cabeçalho fechado-->

<div class="main-panel">
            <div class="content-wrapper">
            <h1 class= "title_deg">Pedidos</h1>

          <div style= " padding-bottom: 30px; width: 80%; margin:auto;">

            <table class="table_deg">
                <tr>
                    <th>Nome</th>
                    <th>Produto</th>
                    <th>Preço</th>
                    <th>Pagamento</th>
                    <th>Foto</th>

                </tr>


                <tr>
                  
                    <td>{{$order->name}}</td>
                    <td>{{$order->product_title}}</td>
                    <td>{{$order->price}}</td>
                    <td>{{$order->payment_status}}</td>
                 
                    <td>
                      <img class="img_size" src="/product/{{$order->image}}">
    </td>
    <td>
      
  
    <body> 
              <div class="rate">

            </div>
              </body>

    </td>    
                    


                      </td>
                    </tr>
                

            </table>
            </div>
        </div>

        @include('home.rodape')
      <!-- footer end -->
 
      <!-- jQery -->
      <script src="{{asset('home/js/jquery-3.4.1.min.js')}}"></script>
      <!-- popper js -->
      <script src="{{asset('home/js/popper.min.js')}}"></script>
      <!-- bootstrap js -->
      <script src="{{asset('home/js/bootstrap.js')}}"></script>
      <!-- custom js -->
      <script src="{{asset('home/js/custom.js')}}"></script>
   </body>
</html>