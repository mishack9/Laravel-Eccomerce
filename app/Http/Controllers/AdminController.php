<?php

namespace App\Http\Controllers;

use App\Models\Catergory;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{
    //Catergory view 
    public function view_catergory()
      {
     
        $view_catergory = Catergory::all();

        return view('Admin.view_catergory', ['view' => $view_catergory]);

      }

      //Adding catergory
      public function CatergoryAdd(Request $request)
      {

       /*  dd($request); */
         $request->validate([
          'catergory' => ['required'],
          'status' => ['nullable']
        ]);

        $Catergory = new Catergory();

        $Catergory->catergory_title = $request->catergory;
        $Catergory->status = $request->status == true ? 1 : 0 ;

        $Catergory->save(); 
        toastr()->timeout(2000)->closeButton(true)->addSuccess('Catergory added successfully');
        return redirect()->back();

      }


      //Update catergory view
      public function CatergoryUpdate($slug)
      {
        $update_catergory = Catergory::where('slug', $slug)->get()->first();
        return view('Admin.update_catergory', ['update' => $update_catergory]);
      }

      
      //update catergory controller
      public function update(Request $request, $id)
      {
           $update = Catergory::find($id);

           
        $update->catergory_title = $request->catergory;
        $update->status = $request->status == true ? 1 : 0 ;
 
         $update->save();
         if($update)
         {
          toastr()->timeout(2000)->closeButton(true)->addSuccess('Catergory updated successfully');
          return redirect()->route('view_catergory');
         }


      }


      //Delete catergory
      public function delete($id)
      {
        $delete = Catergory::destroy($id);
        if($delete)
        {
          toastr()->timeout(2000)->closeButton(true)->addSuccess('Catergory deleted successfully');
          return redirect()->back();
        }

      }


      //product form view add
      public function Formproduct()
      {
         
        $catergory = Catergory::all();

        return view('Admin.product_add', compact('catergory'));
      }

      
      //Add product to database
      public function productadd(Request $request)
      {
          $request->validate([
                 'product_title' => ['required'],
                 'catergory' => ['required'],
                 'description' => ['nullable'],
                 'price' => ['required'],
                 'image' => ['required'], 
          ]);

         

          $product = new Product();

          $product->product_title = $request->product_title;
          $product->catergory = $request->catergory;
          $product->description = $request->description;
          $product->price = $request->price;
          $image = $request->image;
          
          if($image){
            $image_name  = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products_images', $image_name);
          $product->image = $image_name;
          }
          $product->status = $request->status == true ? 1 : 0;

          $product->save();

          if($product)
          {
            toastr()->timeout(2000)->closeButton(true)->addSuccess('Product added successfully');
            return redirect()->back();
          }

      }


      //View product
      public function productview()
      {
          
        $product_view = Product::paginate(7);

        return view('Admin.view_product', ['products' => $product_view]);
      }


      //product update form view
      public function productupdate($slug)
      {

       $product = Product::where('slug', $slug)->get()->first();
       $catergory = Catergory::all();

        return view('Admin.update_product', ['products' => $product, 'catergorys' => $catergory]);

      }


      //Update via 
      public function product_update(Request $request, $id)
      {
         $update_product = Product::find($id);

         $update_product->product_title = $request->product_title;
         $update_product->catergory = $request->catergory;
         $update_product->description = $request->description;
         $update_product->price = $request->price;
         $image = $request->image;
         $update_product->status = $request->status == true ? 1 : 0;

         if($image)
         {
          $image_name = time().'.'.$image->getClientOriginalExtension();
          $request->image->move('products_images', $image_name);
          $update_product->image = $image_name;
         }

         $update_product->save();

         if($update_product)
         {
          toastr()->timeout(2000)->closeButton(true)->addSuccess('Product updated successfully');
          return redirect()->route('productView');
         } 

      }


      public function product_delete($id)
      {
        $delete_product = Product::find($id);

        $image_path = public_path('products_images/'.$delete_product->image);

        if(file_exists($image_path))
        {
          unlink($image_path);
        }

        $delete_product->delete();

        if($delete_product)
        {
          toastr()->timeout(2000)->closeButton(true)->addSuccess('Product deleted successfully');
          return redirect()->back();
        }
      }


      //Search for products
      public function SearchProduct(Request $request)
      {
         $search = $request->search;

         $product_view = Product::where('catergory', 'like', '%'.$search.'%')->orWhere('product_title', 'like', '%'.$search.'%')->paginate(2);

         return view('Admin.view_product', ['products' => $product_view]);

      }


      //view user orders
      public function ViewOrder()
      {

        $view_order = Order::paginate(10);

        return view('Admin.view_order', ['order' => $view_order]);
      }


      //deliver order handler
      public function DeliverOrder($id)
      {
        $deliver = Order::find($id);
        $deliver->status = "Sent";

        $deliver->save();
        return redirect()->back();
      }


       //inprogress order handler
       public function InProgressOrder($id)
       {
         $deliver = Order::find($id);
         $deliver->status = "Processing";
 
         $deliver->save();
         return redirect()->back();
       }


       //Search order
       public function searchOrder(Request $request)
       {
        $search = $request->search;

   
        $view_order = Order::where('name', 'like', '%'. $search. '%')->paginate(3);

        return view('Admin.view_order', ['order' => $view_order]);
       }


       //print pdf
       public function PDF($id)
       {
        $pdf = Order::find($id);
        $pdf = Pdf::loadView('Admin.invoice', ['pdf' => $pdf]);
        return $pdf->download('invoice.pdf');
       }


       //View user
       public function User_View()
       {

        $user_view = User::where('userType', 'user')->paginate(10);
        return view('Admin.view_user', ['user_view' => $user_view]);

       }


       //Admin search user
       public function search_User(Request $request)
       {

        $search = $request->search;
        $user_view = User::where('name', 'like', '%' . $search . '%')->orWhere('email', 'like', '%' . $search . '%')->paginate(2);
        return view('Admin.view_user', ['user_view' => $user_view]);


       }
}
