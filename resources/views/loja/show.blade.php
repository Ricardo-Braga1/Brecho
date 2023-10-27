<!DOCTYPE html>
<html lang="en">
  <head>
    @include('loja.css')
    <style type="text/css">

        .div_center{

            text-align:center;
            padding-top:40px;
            color: black;
        }

        .text_color
        {
            color:black !important;
            
        }

        label{
            display:inline-block;
            width:300px;
            color: black;
        }
        .div_design{
            padding-bottom:10px;
            color: black;
        }
        .center{
            margin:auto;
            width: 75%;
            text-align:center;
            margin-top:40px;
            color: black;
        }
        .img_size
        {
            width: 150px;
            height: 150px;
            color: black;
        }


    </style>
  </head>
  <body>
    <div class="container-scroller">

      <!-- sidebar -->
        @include('loja.sidebars')
      <!-- sidebar -->

      <div class="container-fluid page-body-wrapper">

        <!-- navbar -->
        @include('loja.navbar')

        <!-- corpo -->
        <div class="main-panel">
            <div class="content-wrapper">

            @if(session()->has('mensagem'))

            <div class="alert alert-success">
                {{session()->get('mensagem')}}

            </div>
            @endif

             <div class= "div_center">
                <h1>Produtos</h1>
            <table class="center">
                <tr>
                
                    <th>Foto</th>
                    <th>Nome do Produto</th>
                    <th>Descrição</th>
                    <th>Categoria</th>
                    <th>Preço</th>
                    <th>Editar</th>
                    <th>Deletar</th>
                    
                </tr>
                @foreach($product as $product)
                <tr>
                    <td>

                    <img class= "img_size" src="/product/{{$product->image}}">

                    </td>
                    <td>{{$product->title}}</td>
                    <td>{{$product->description}}</td>

                    <td>{{$product->category}}</td>
                    <td>{{$product->price}}</td>

                    <td>

                        <a class = "btn btn-success" href="{{url('update_product',$product->id)}}">Editar</a>

                    </td>

                    <td>

                        <a class = "btn btn-danger" onclick="return confirm('Tem certeza que deseja deletar esse produto?')" href="{{url('delete_product',$product->id)}}">Deletar</a>

                    </td>
                    
                </tr>
                @endforeach
                </table>
            </div>
        </div>
        <!-- corpo -->


  </body>
</html>