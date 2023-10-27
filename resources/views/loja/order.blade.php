<!DOCTYPE html>
<html lang="en">
  <head>
    @include('loja.css')

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
            width:80%;
            margin:auto;
            padding-top:30px;
            text-align: center;
        }

        .img_size
        {
          width: 100px;
          height: 100px;
        }
        .color_conteudo
        {
            color: black;
        }

      
        .color_tabela
        {
            color: black;
            font-weight:bold;
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
            <h1 class= "title_deg">Pedidos</h1>

          <div style= " padding-bottom: 30px;">

          <form action = "{{url('search')}}" method="get">

            @csrf

            
            <input type="text" style="color: black;" name="search" placeholder="Pesquisar">

            <input type="submit" value = "Pesquisar" class="btn btn-outline-primary">


            </form>
            <table class="table_deg">
                <tr class ="color_tabela">>
                    <th>Foto</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Endereço</th>
                    <th>Telefone</th>
                    <th>Produto</th>
                    <th>Preço</th>
                    <th>Pagamento</th> 
                    <th>Entrega</th>

                </tr>

                @forelse ($order as $order)
                <tr class ="color_conteudo">
                <td>
                      <img class="img_size" src="/product/{{$order->image}}"></td>
                    <td>{{$order->name}}</td>
                    <td>{{$order->email}}</td>
                    <td>{{$order->adress}}</td>
                    <td>{{$order->phone}}</td>
                    <td>{{$order->product_title}}</td>
                    <td>{{$order->price}}</td>
                    <td>{{$order->payment_status}}</td>
                    

                    <td>
                      @if($order->delivery_status=='processando')
                      <a href="{{url('enviado', $order->id)}}" onclick="return confirm('Tem certeza que esse produto foi enviado?')" class="btn btn-primary ">  Enviado</a>
                      @else
                      <p style="color:green">Enviado</p>
                      
                      @endif
                      </td>
                    @empty
                  <p>Nenhuma ordem encontrada<p>
                  
                    </tr>
                
              

                @endforelse
            </table>
            </div>
        </div>

        <!-- corpo -->


  </body>
</html>