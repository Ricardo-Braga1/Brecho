<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\facades\Auth;

use App\Models\User;

use App\Models\Carrinho;

use App\Models\product;

use App\Models\Order;

use Session;

use Stripe;
class HomeController extends Controller
{


    public function redirect()
    {
        $usertype=Auth::User()->Usertype;

        if($usertype=='0')
        {
            $product=product::paginate(3);
            return view('home.paginausuario',compact('product'));
           
        }
        else if($usertype=='2')
        {
            $id = Auth::User()->id;
            $nome = Auth::User()->name;
            $totalproduct=product::where('loja','=',$id)->get()->count();
         
            return view('loja.home',compact('totalproduct','nome'));

            
           
        }

        else
        {

            return view('admin.home');
        }

        

    }
        public function index()
    {
        $product=product::paginate(3);
        return view('home.paginausuario',compact('product'));
    }

        public function detalhes_produto($id)
        {
            $product=product::find($id);

            return view('home.detalhes_produto',compact('product'));
        }

        public function adicionar_carrinho(request $request,$id)
        {

            if (Auth::check())
            {
                $user_id = Auth::user()->id;
                $user=Auth::user();
                $product=product::find($id);
                $product_exist_id=Carrinho::where('product_id','=',$id)->where('user_id','=',$user_id)->get('id')->first();
                
                if($product_exist_id)
                {
                    return redirect()->back()-> with('mensagem','Produto já está no carrinho');
                }
                else
                {             
                $cart= new Carrinho;

                $cart->name=$user->name;
                $cart->email=$user->email;
                $cart->phone=$user->telefone;
                $cart->adress=$user->endereco;
                $cart->user_id=$user_id;
                $cart->product_title=$product->title;
                $cart->price=$product->price;
                $cart->image=$product->image;
                $cart->product_id=$product->id;
                
                $cart->save();
                return redirect('show_cart');
                }
                
            }

            else
            {
                return redirect('login');
            }
        }

        public function show_cart()
        {

            if(Auth::id())
            {

            $id = Auth::User()->id;
            $Carrinho=Carrinho::where('user_id','=',$id)->get();

            if($Carrinho->Count()==0){
                return view('home.carrinho_vazio',compact('Carrinho'));

            }

            else
            {
            return view('home.show_cart',compact('Carrinho'));   
            }        
            }
            else
            {
                return redirect('login');
            }

            
        }

        public function remove_cart($id)

        {
            $carrinho=Carrinho::find($id);

            $carrinho->delete();
            return redirect()->back();
        }
        
        public function stripe($totalprice)
        {
            
            return view('home.stripe',compact('totalprice'));
        }

        public function stripePost(Request $request,$totalprice)
        {
            
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        
            Stripe\Charge::create ([
                    "amount" => $totalprice * 100,
                    "currency" => "brl",
                    "source" => $request->stripeToken,
                    "description" => "Agradecemos a Preferência" 
            ]);
        
            Session::flash('success', 'Pago com sucesso!');
            
           
            $user=Auth::user();
            $userid=$user->id;
            $data=Carrinho::where('user_id','=',$userid)->get();
            
            
            foreach($data as $data)
            {

                $order = new Order;
                $order->user_id=$userid;
                $order->adress=$user->endereco;
                $order->name=$user->name;
    
                $order->email=$user->email;
                $order->phone=$user->telefone;
                $order->product_title=$data->product_title;
                $order->price=$data->price;
                $order->quantity=$data->quantity;
                $order->image=$data->image;
                $order->product_id=$data->product_id;
                $order->payment_status='pago';
                $order->delivery_status='processando';

                $order->save();

               

                $product_id= $data->product_id;
                $product=product::find($product_id);
                $product->status="vendido";
                $product->delete();
                

                
                $cart_id= $data->id;
                $cart=Carrinho::find($cart_id);

                

                $cart->delete();
                
                
        
            }
            return back();


        }

        public function product_search(Request $request)
        {
            $search_text= $request->search;

    
            $product=product::query()
            ->where('status', 'LIKE', "disponivel") 
            ->Where('title', 'LIKE', "%{$search_text}%") 
            ->paginate(21);
            return view('home.all_product',compact('product'));
       
            
        }

        public function product()    
        {
            
            $product=product::query()
            ->where('status', 'LIKE', 'disponivel')->paginate(21);
            return view('home.all_product',compact('product'));
            

        }

        public function sobre()    
        {
            
            return view('home.sobre');
            

        }

                public function detalhes_compra($id)    
        {
            

                $order=Order::find($id);
    
                return view('home.detalhes_compra',compact('order'));
            

        }
        public function order2()    
        {
            $user=Auth::user();
            $userid=$user->id;
            $order=Order::where('user_id','=',$userid)->get();
           return view('home.order',compact('order'));

        }



        public function search_order_h(Request $request)



        {
    
            $search=$request->search;
            $order=Order::where('product_title','LIKE',"%$search%")->get();
            return view('home.order',compact('order'));
    
        }

        public function all_lojas()
        {
            

    
            $user=User::query()
            ->where('Usertype', 'LIKE', "2") 
            ->paginate(21);
            return view('home.all_loja',compact('user'));
       
            
        }

        public function loja($id)
        {
            
            $user=User::where('id','=',$id)->get();

            $product=product::query()
            ->where('loja', 'LIKE', "$id") ->paginate(21);
            
            return view('home.loja',compact('product','user'));
       
            
        }

  
    }
