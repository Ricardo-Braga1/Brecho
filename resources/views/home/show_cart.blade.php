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
      <title>Carrinho</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />
      <!-- font awesome style -->
      <link href="{{asset('home/css/font-awesome.min.css')}}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />

      <style type="text/css">
        .center
        {
            margin:auto;
            width: 80%;
            text-align:center;
        }

        table, th, td {
            border:1px solid grey;
        }

        .th_deg
        {
            font-size: 18px;
            padding: 10px;

        }

        .img_dez
        {
            height:200px;
            width:200px;
        }
        .table
        {
            margin:auto;
            width: 50%;
            text-align:center;
        }
        </style>
   </head>
   <body>
      <div class="hero_area">

      <!--cabeçalho chamado-->
        @include('home.cabecalio')
      <!--cabeçalho fechado-->

      <div class="center">
      
            <table class="table">
                <tr>

                    <th class="th_deg">Produto</th>
                    <th class="th_deg">Preço</th>            
                    <th class="th_deg">quantity</th>
                    <th class="th_deg">Imagem</th>
                    <th class="th_deg">Ação</th>
                </tr>

                <?php $totalprice=0; ?>

                @foreach($Carrinho as $Carrinho)
                <tr>
                    <td>{{$Carrinho->product_title}}</td>
                    <td>${{$Carrinho->price}}</td>
                    <td>{{$Carrinho->quantity}}</td>
                    <td><img class="img_dez" src="/product/{{$Carrinho->image}}" ></td>
                    <td><div class= "mt-4">
                    <a class = "btn btn-danger" onclick="return confirm('Tem certeza que deseja remover esse produto do carrinho??')" href="{{url('remove_cart',$Carrinho->id)}}">Deletar</a>

                    
                   
    </div> <td>

              
                <?php $totalprice= $totalprice+$Carrinho->price ?>
                @endforeach
            </table>

            
            <div>
            <h1 style="font-size: 25px; padding-top:30px; padding-bottom:15px;">Finalizar Compra</h1>

            <a href="{{url('stripe',$totalprice)}}" class= "btn btn-danger"> Pagar com cartão</a>
    </div>


        </div>

        
    </div>
      <!-- footer start -->
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