<!DOCTYPE html>
<html>
  <head> 
<style type="text/css">
input[type="text"]
{
    width: 400px;
    height: 40px;
    color: black;
    border-radius: 8px 5px 5px;
}

.div_deg
{
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 10px;
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
           
            <div class="text-white text-center"><h3><em>Update Catergory</em></h3></div>
           <a href="" class="btn btn-primary">Back</a>
             <div class="div_deg">
              
                <form action="{{ route('catergoryEdith',$update->id) }}" method="post">
                  @csrf
                    <div class="">
                         <input type="hidden" name="_method" value="put" id="">
                        <input type="text" name="catergory" id="" placeholder="Catergory_title" value="{{ $update->catergory_title }}" >
                    
                        <div class="mb-2 mt-2">
                          <input type="checkbox" name="status" id="publish" {{ $update->status == 1 ? 'checked' : '' }}>
                          <label for="publish" class="fw-bold">Status</label>
                        </div>
                        <input type="submit" value="Update Catergory" id="" class="btn btn-primary">

                    </div>
                </form>

             </div>

          </div>
        </div>   

      </div>
        

        
       



        @include('Admin.includes.footer')
  </body>
</html>