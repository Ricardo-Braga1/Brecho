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
      <title>Trocar.se</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />
      <!-- font awesome style -->
      <link href="{{asset('home/css/font-awesome.min.css')}}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />
   </head>
   <body>
      <div class="hero_area">

      <!--cabeçalho chamado-->
        @include('home.cabecalio')
      <!--cabeçalho fechado-->

      @if(session()->has('mensagem'))

<div class="alert alert-danger">
   {{session()->get('mensagem')}}

</div>
@endif
      <div class="col-sm-6 col-md-4 col-lg-4" style="margin: auto; width 50%; padding:30px">

                          
                  <div class="box">
                     <div class="img-box">
                        <img src="/product/{{$product->image}}"  style="width: 320px;padding:30px"alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           {{$product->title}}
                        </h5>
                        @if($product->discount!=null)
                        <h6 style="color:red">
                          ${{$product->discount}}
                        </h6>
                        <h6 style="text-decoration:line-through;">
                          ${{$product->price}}
                        </h6>
                        @else
                        <h6>
                          ${{$product->price}}
                        </h6>
                        @endif

                        <h6>Categoria: {{$product->category}}</h6>
                        <h6>Detalhes: {{$product->description}}</h6>
                        
                        <h6>loja: {{$product->loja}}</h6>
                        
                        <form action="{{url('adicionar_carrinho',$product->id)}}"  method="Post">
                           @csrf 
                           <div class="col-md-4">
                           <input type="submit" value="Adicionar ao Carrinho">
                        
                           </div>
                           
                           </form>         
                           
            
                           
                            
                             
                          
                     </div>
                   
                  </div>
                  
               </div>
      <!-- footer start -->
         @include('home.rodape')
      <!-- footer end -->
   
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>