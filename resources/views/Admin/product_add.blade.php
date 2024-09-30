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
                <div class="card-header">
                  <a href="{{url('admin/dashboard')}}" class = "btn btn-secondary">Back</a>
                </div>
                <h3><em>Add Product :</em></h3>
            </div>
            <div class="card-body">
              <form class="row g-3" action="{{route('AddProduct')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="col-md-6 mt-3">
                  <label for="productadd" class="form-label fw-bold">Product_title</label>
                  <input type="text" name = "product_title" class="form-control" id="productadd" style="@error('product_title')
                        border-color:red; border:2px solid;
                  @enderror">
                  <span style="color:red; font-width:14px;">
                    @error('product_title')
                          {{ $message }}
                    @enderror
                  </span>
                </div>

                <div class="col-md-6 mt-3">
                  <label for="catergoryadd" class="form-label fw-bold">Catergory</label>
                  <select name="catergory" id="catergoryadd" class="form-control">
                    <option value="">--Select Catergory--</option>
                    @foreach ($catergory as $data)
                      <option value="{{$data->catergory_title}}">{{$data->catergory_title}}</option>
                    @endforeach
                  </select>
                  <span style="color:red; font-width:14px;">
                    @error('catergory')
                          {{ $message }}
                    @enderror
                  </span>
                </div>

                <div class="col-12 mt-3">
                  <label for="inputArea" class="form-label">Description</label>
                  <textarea class="form-control" id="summernote" rows="8" name = "description" placeholder="Leave a Description here" id="inputArea"></textarea>
                </div>

                <div class="col-6 mt-3">
                  <label for="inputPrice" class="form-label">Price 2</label>
                  <input type="number" class="form-control" id="inputPrice" name = "price">
                  <span style="color:red; font-width:14px;">
                    @error('price')
                          {{ $message }}
                    @enderror
                  </span>
                </div>

                <div class="col-md-6 mt-3">
                  <label for="inputFile" class="form-label">Image</label>
                  <input type="file" name = "image" class="form-control" id="inputFile">
                  <span style="color:red; font-width:14px;">
                    @error('image')
                          {{ $message }}
                    @enderror
                  </span>
                </div>
              
            
                <div class="col-12 mt-3">
                  <div class="form-check">
                    <input class="form-check-input" name = "status" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                     Status
                    </label>
                  </div>
                </div>

                <div class="col-12 mt-3">
                  <button type="submit" class="btn btn-primary mx-3 my-3 ml-3 mr-3">Add product</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        
       



        @include('Admin.includes.footer')
  </body>
</html>