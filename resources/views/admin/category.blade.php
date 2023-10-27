<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')

    <style type="text/css">
        .div_center
        {
            text-align:center;
            paddding: 40px;
        }
        .categoria_table
        {
            margin: auto;
            width: 80%;
            text-align: center;
            margin-top: 30pcx;
            border: 2px solid white;
        }
        </style>
  </head>
  <body>
    <div class="container-scroller">

      <!-- sidebar -->
        @include('admin.sidebars')
      <!-- sidebar -->

      <div class="container-fluid page-body-wrapper">

        <!-- navbar -->
        @include('admin.navbar')
   
        <div class="main-panel">
            <div class="content-wrapper">
                @if(session()->has('mensagem'))

                    <div class="alert alert-success">
                        {{session()->get('mensagem')}}

                    </div>
                @endif

                <div class = "div_center">
                <h3> Add Category <h3>

                <form action="{{url('/adicionar_category')}}" method="POST">

                @csrf

                <input class="input_color" type="text" name="category" placeholder="Escreva o nome da categoria">

                <input type="submit" class="btn btn-primary" name="submit" value="Adicionar Categoria">
                </div>

                <div>
                  <table class="categoria_table">

                    <tr>
                      <td>Categoria</td>
                      <td>Ação</td>
                    </tr>
                    @foreach($data as $data)

                    <tr>

                      <td>{{$data->category_name}}</td>
                      <td>

                        <a onclick ="return confirm('Tem certeza que deseja deletar?')"class="btn btn-danger" href="{{url('delete_category',$data->id)}}">Delete</a>
                      </td>

                    </tr>
                    @endforeach
                  </table> 
                </div>
            </div>
        </div>
      </div>
    </div>
   
  </body>
</html>