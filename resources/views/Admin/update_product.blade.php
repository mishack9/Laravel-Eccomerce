<!DOCTYPE html>
<html>
  <head> 
<style type="text/css">
    input[type="text"]
{
    color: white;
    border-radius: 8px 7px 8px;
}

select[id="catergoryadd"]
{
    border-radius: 8px 7px 8px;
}

textarea[id="inputArea"]
{
    color: white;
    border-radius: 8px 7px 8px;
}

input[type="number"]
{
    color: white;
    border-radius: 8px 7px 8px;
}

input[type="file"]
{
    color: white;
    border-radius: 8px 7px 8px;
}

.img
{
    width:40px;
    border-radius: 7px 5px 2px;
}
</style>
   @include('Admin.includes.css')

  </head>
  <body>

   @include('Admin.includes.header')

    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
    
   @include('Admin.includes.sidebar')

      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Dashboard</h2>
          </div>
        </div>
        

        <div class="container">
          <div class="card ">
            <div class="ml-3 mr-3 mx-3 my-3 card-header">
                <div class="card-tools">
                  <a href="{{route('productView')}}" class = "btn btn-secondary ml-5 mr-5">Back</a>
                </div>
                <h3><em>Update Product :</em></h3>
            </div>
            <div class="card-body">
              <form class="row g-3" action="{{route('Update_Product', $products->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                 <input type="hidden" name="_method" value="put" id="">
                <div class="col-md-6 mt-3">
                  <label for="productadd" class="form-label fw-bold">Product_title</label>
                  <input type="text" name = "product_title" class="form-control" id="productadd" value="{{$products->product_title}}">
                
                </div>

                <div class="col-md-6 mt-3">
                  <label for="catergoryadd" class="form-label fw-bold">Catergory</label>
                  <select name="catergory" id="catergoryadd" class="form-control">
                    <option value="">--Select Catergory--</option>
                    <option value="{{$products->catergory}}">{{ $products->catergory }}</option>
                      @foreach ($catergorys as $items)
                      <option value="{{$items->catergory_title}}">{{$items->catergory_title}}</option>
                      @endforeach
                  </select>
                </div>

                <div class="col-12 mt-3">
                  <label for="inputArea" class="form-label">Description</label>
                  <textarea class="form-control" rows="8" name = "description" placeholder="Leave a Description here" id="inputArea">{{$products->description}}</textarea>
                </div>

                <div class="col-6 mt-3">
                  <label for="inputPrice" class="form-label">Price 2</label>
                  <input type="number" class="form-control" id="inputPrice" value="{{$products->price}}" name = "price">
                </div>

                <div class="col-md-6 mt-3">
                  <label for="inputFile" class="form-label">Image</label>
                  <input type="file" name = "image" class="form-control" id="inputFile">
                </div>              
            
                <div class="col-12 mt-3">
                  <div class="form-check">
                    <input class="form-check-input" name = "status" type="checkbox" id="gridCheck" {{$products->status == 1 ? "checked" : ""}} >
                    <label class="form-check-label" for="gridCheck">
                     Status
                    </label>
                  </div>
                </div>

                <div class="col-12 mt-3">
                  <button type="submit" class="btn btn-primary mx-3 my-3 ml-3 mr-3">Update product</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        
       



        @include('Admin.includes.footer')
  </body>
</html>