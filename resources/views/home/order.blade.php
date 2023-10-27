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
      <title>Famms - Fashion HTML Template</title>
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

          <form action = "{{url('search_order_h')}}" method="get">

            @csrf

            
            <input type="text" style="color: black;" name="search" placeholder="Pesquisar">

            <input type="submit" value = "Pesquisar" class="btn btn-outline-primary">


            </form>
            <table class="table_deg">
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Endereço</th>
                    <th>Telefone</th>
                    <th>Produto</th>
                    <th>Preço</th>
                    <th>Pagamento</th>
                    <th>Foto</th>
                    <th>Avalie a entrega</th>

                </tr>

                @forelse ($order as $order2)
                <tr>
                  
                    <td>{{$order2->name}}</td>
                    <td>{{$order2->email}}</td>
                    <td>{{$order2->adress}}</td>
                    <td>{{$order2->phone}}</td>
                    <td>{{$order2->product_title}}</td>
                    <td>{{$order2->price}}</td>
                    <td>{{$order2->payment_status}}</td>
                 
                    <td>
                      <img class="img_size" src="/product/{{$order2->image}}">
    </td>
    <td>
                      <a href="{{url('detalhes_compra',$order2->id)}}" class="option2">
                           Ver Detalhes
                           </a>
                      </td>    
                    

                    @empty
                  <p>Nenhuma ordem encontrada<p>
                      </td>
                    </tr>
                
              

                @endforelse
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