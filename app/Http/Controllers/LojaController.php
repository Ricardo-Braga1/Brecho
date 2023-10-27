<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use App\Models\product;

use App\Models\User;

use App\Models\Order;

use Illuminate\Support\facades\Auth;

class LojaController extends Controller
{
    
    public function view_product()
    {
        $nome = Auth::User()->name;
        $category=Category::all();
        
        return view('loja.products',compact('category','nome'));
    }
    public function adicionar_produto(Request $request)
    {
       
        
        $product=new product;
            $loja=Auth::user()->id;
            $product->title=$request->title;
            $product->description=$request->desc;
            $product->image=$request->image;
            $product->category=$request->categoria;

            $product->price=$request->preco;

            $product->loja=$loja;
            $product->status="disponivel";
            
            $image=$request->image;

            $imagename=time().'.'.$image->getClientOriginalExtension();

            $request->image->move('product',$imagename);

            $product->image=$imagename;
            $product->save();

            return redirect('/show');;
    }

    public function show()
    {
        $id = Auth::User()->id;
            $product=product::where('loja','=',$id)->get();
            $nome = Auth::User()->name;
        
        return view('loja.show',compact('product','nome'));
    }

    public function delete_product($id)
    {
        $product=product::find($id);
        $product->delete();

        return redirect()->back()->with('message','Product Deleted Successfully');
    }

    public function update_product($id)
    {
        $product=product::find($id);

        $category= category::all();
        return view('loja.update_product',compact('product','category'));
    }

    public function editar_produto_confirmar(Request $request,$id)
    {
       
        
            $product=product::find($id);
           
            $product->title=$request->title;
            $product->description=$request->desc;
            
            $product->category=$request->categoria;
            $product->quantity=$request->quantidade;
            $product->price=$request->preco;
            $product->discount=$request->desconto;
            
            
            $image=$request->image;
            if($image)
            {
                $imagename=time().'.'.$image->getClientOriginalExtension();
                $request->image->move('product',$imagename);

                $product->image=$imagename;
                
            }
            
            $product->save();
            

    
            return redirect('/show');;
    }


    public function order()

    {   $order=Order::all();
        $nome = Auth::User()->name;
        return view('loja.order',compact('order','nome'));

    }

    public function enviado($id)
    {   
        $order = Order::find($id);
        $order=Order::where('id','LIKE',"%$id%")->get();;
        $order->save();
        
        return view('loja.order',compact('order'));

    }

    public function search_order(Request $request)

    {
        $search_ord=$request->search;
        $nome = Auth::User()->name;
        $order=Order::where('product_title','LIKE',"%$search_ord%")->get();

        return view('loja.order',compact('order'));
    }

    public function perfil()
    {
        $id = Auth::User();
        $nome = Auth::User()->name;
        return view('loja.perfil',compact('id','nome'));
    }

    public function editar_perfil(Request $request)
    {
           $perfil = Auth::User();
        
           
            $perfil->name=$request->name;
            $perfil->endereco=$request->endereco;  
            $perfil->telefone=$request->telefone;
              
            $image=$request->image;
            if($image)
            {
                $imagename=time().'.'.$image->getClientOriginalExtension();
                $request->image->move('product',$imagename);

                $perfil->image=$imagename;
                
            }
            
            $perfil->save();
            

    
            return redirect('/redirect');;
    }
}
