<?php

namespace App\Http\Controllers;

use App\Models\Catergory;
use App\Models\Product;
use Illuminate\Http\Request;

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
            toastr()->timeout(2000)->closeButton(true)->addSuccess('Product deleted successfully');
            return redirect()->back();
          }

      }
}
