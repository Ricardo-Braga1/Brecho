 <!-- header section strats -->
 <header class="header_section">
            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <a class="navbar-brand" href="{{url('/')}}"><img width="250" src="/images/logo.png" alt="#" /></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                        </li>
                       
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('products')}}">Produtos</a>
                        </li>

                        <li class="nav-item">
                           <a class="nav-link" href="{{url('all_lojas')}}">Lojas</a>
                        </li>

                       
               
                      

                        <li class="nav-item">
                           <a class="nav-link" href="{{url('show_cart')}}">Carrinho</a>
                        </li>

                        

                        
                        
                        @if (Route::has('login'))
                            @auth
                            <li class="nav-item">
                           <a class="nav-link" href="{{url('order2')}}">Seus Pedidos</a>
                        </li>
                        
                        @endauth
                        @endif

                        
                        @if (Route::has('login'))
                            @auth
                            <li class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                                    <form method="POST" action="{{ route('logout') }}" class="inline">
                                        @csrf
                                        <button type="submit" id="logincss" class="btn btn-primary">
                                                {{ __('Log Out') }}
                                        </button>
                                    </form>
                            </li>
                        @else
                        <!-- logout-->
                        
                        <!-- login-->
                        <li class="nav-item">
                           <a class="btn btn-primary" id="logincss" href="{{ route('login') }}">Login</a>
                        </li>
                        <!-- login-->

                        <!-- Registrar-->
                        <li class="nav-item">
                           <a class="btn btn-primary" href="{{ route('register') }}">Registrar</a>
                        </li>
                        <!-- fim Registrar-->
                        @endauth
                        @endif

                      
                     </ul>
                  </div>
               </nav>
            </div>
         </header>


         <!-- end header section -->