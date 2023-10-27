 <!-- product section -->
 
 <section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Nossos <span>Produtos</span>
               </h2>
               <br><br>
               <div>
                     <form action="{{url('/product_search')}}" method="GET">

                     @csrf
                        <input style="width:500px;" type="text" name="search"placeholder= "Procure um produto">

                        <input type= "submit" value="Pesquisar">
                     </form>

               </div>
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
