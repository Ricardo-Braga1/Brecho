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
            color:black;
            
        }

        label{
            display:inline-block;
            width:300px;
        }
        .div_design{
            padding-bottom:10px;
            color: black;
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

             <div class= "div_center">
                <h1>Adicionar Produto</h1>

                <form action="{{url('/adicionar_produto')}}" method="POST"enctype="multipart/form-data">
                @csrf
                <div class="div_design">
                    <label> Nome do Produto</label>
                    <input class="text_color" type="text" name= "title" placeholder="" required="">
                </div>
         

            
                <div class="div_design">
                    <label> Descrição do Produto</label>
                    <input class="text_color" type="text" name= "desc" placeholder=""required="">
                </div>
  

  
                <div class="div_design">
                    <label> Preço do Produto</label>
                    <input class="text_color" type="number" min="0" name= "preco" placeholder=""required="">
                </div>
         

                <div class="div_design">
                    <label> Categoria </label>
                    <select class=text_color name="categoria" required="">
                        @foreach($category as $category)
                   <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                        @endforeach
                    </select>
                </div>
           

                <div class="div_design">
                    <label> Imagem </label>
                    <input type="file" name= "image" placeholder="" required="">
                </div>

                <input type=submit value="Adicionar Produto" class="btn btn-primary">
                
            </div>
        </div>
        <!-- corpo -->


  </body>
</html>