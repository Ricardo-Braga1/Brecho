<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="{{asset('home/images/favicon.png')}}" type="">
      <title>Loja</title>
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
            border:1px solid white;
            
        }

        .th_deg
        {
            font-size: 18px;
            padding: 10px;
        }

        .img_dez
        {
            height:60;
            width:60;
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


        <div class="center">
      
      <table class="table">
          <tr>

                <th class="th_deg">Logo</th>
              <th class="th_deg">Nossas Lojas</th>
              <th class="th_deg">Ação</th>
     
            </tr>



          @foreach($user as $user)
          <tr>
            
       
                <td><div class="div_design">
                   
                    <img style="margin:auto" height= "150" width="150" src="/product/{{$user->image}}">
                </div>
    </td>
              <td>{{$user->name}}</td>

              <td>
              <a class = "btn btn-primary" href="{{url('loja',$user->id)}}">Ver Produtos</a>          
                </td>  

        
          
          @endforeach
      </table>

      
     

      </div>


         @include('home.rodape')
      <!-- footer end -->

      </div>
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