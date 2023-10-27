<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    @include('loja.css')
    <style type="text/css">

        .div_center{

            text-align:center;
            padding-top:40px;
            color: black;
            
        }

        .text_colorh1
        {
            color: black !important;
            
            
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
                <h1>Editar Produto</h1>

                <form action="{{url('/editar_perfil')}}" method="POST"enctype="multipart/form-data">
                @csrf
                <div class="div_design">
                    <label> Nome </label>
                    <input class="text_colorh1" type="text" name= "name" placeholder="" required="" value="{{$id->name}}">
                </div>
            
                
  
                <div class="div_design">
                    <label> Telefone</label>
                    <input class="text_colorh1" type="number" min="0" name= "telefone" placeholder=""required=""value="{{$id->telefone}}">
                </div>

                <div class="div_design">
                    <label> Endereço</label>
                    <input class="text_colorh1" type="text" name= "endereco" placeholder=""required="" value="{{$id->endereco}}">
                </div>

       
                <div class="div_design">
                   
                    <img style="margin:auto" height= "150" width="150" src="/product/{{$id->image}}">
                </div>

           

                <div class="div_design">
                    <label> Mudar Imagem </label>
                    <input type="file" name= "image" placeholder="">
                </div>

                <input type=submit value="Salvar edição" class="btn btn-primary">
                
            </div>
        </div>
        <!-- corpo -->


  </body>
</html>