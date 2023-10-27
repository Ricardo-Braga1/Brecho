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

        <section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                   <span>{{$user->first()->name}}</span>
               </h2>
               <br><br>
              
            </div>
                @if(session()->has('mensagem'))

                    <div class="alert alert-danger">
                        {{session()->get('mensagem')}}

                    </div>
                @endif

               @if(session()->has('mensagem2'))

              <div class="alert alert-success">
               {{session()->get('mensagem2')}}

               </div>
               @endif
            <div class="row"> 

              @foreach($product as $product_pag)
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">


                     <div class="option_container">
                        <div class="options">

                      
                           <form action="{{url('adicionar_carrinho',$product_pag->id)}}"  method="Post">
                           @csrf            
                           <div class="col-md-4">
                           <input type="submit" value="Adicionar ao Carrinho">              
                           </div>
                           
                           </form>
                                                  
                           <a href="{{url('detalhes_produto',$product_pag->id)}}" class="option2">
                           Ver Detalhes
                           </a>
                        </div>
                     </div>


                     <div class="img-box">
                        <img src="product/{{$product_pag->image}}" alt="">
                     </div>


                     <div class="detail-box">
                        <h5>
                           {{$product_pag->title}}
                        </h5>
                        @if($product_pag->discount!=null)

                        <h6 style="text-decoration:line-through;">
                          ${{$product_pag->price}}
                        </h6>
                        @else
                        <h6>
                          ${{$product_pag->price}}
                        </h6>
                        @endif
      
                     </div>

                  </div>
               </div>
           
               
               @endforeach
            </div>
            <span style="padding-top": 20px>

               {!!$product->withQueryString()->links('pagination::bootstrap-5')!!}
            </span>
          
            </div>
            
         </div>
      </section>
      <!-- end product section -->
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