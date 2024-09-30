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

th{
  background-color: skyblue;
  padding: 15px;
  font-size: 20px;
  font-weight: bold;
  color: white;
}

td{
  color: white;
  padding: 10px;
  border: 1px solid skyblue;
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
           
            <div class="text-white text-center"><h3><em>Add Catergory</em></h3></div>

             <div class="div_deg">
              
                <form action="{{ route('Add_catergory') }}" method="post">
                  @csrf
                    <div class="">

                        <input type="text" name="catergory" id="" placeholder="Catergory_title" value="" 
                        style="@error('catergory')
                          border-color:red; border:2px solid;
                        @enderror">
                        <div class="">
                          <span style="font-with:14px; color:red">
                            @error('catergory')
                              {{ $message }}
                            @enderror
                          </span>
                        </div>

                        <div class="mb-2 mt-2">
                          <input type="checkbox" name="status" id="publish">
                          <label for="publish" class="fw-bold">Status</label>
                        </div>
                        <input type="submit" value="Add Catergory" id="" class="btn btn-primary">

                    </div>
                </form>

             </div>

          </div>
        </div>   
        
     
       <div class=" container table-responsive mb-5">
        <table class="table table-sm px-2 py-2">
          <thead>
            <tr>
              <th class="" scope="col">#</th>
              <th class="" scope="col">Catergory title</th>
              <th class="" scope="col">Status</th>
              <th class="text-center" colspan = "2" scope="col">Operation</th>
            </tr>
          </thead>
          <tbody>
        
              @foreach ($view as $catergories)
              <tr>
              <th scope="row">{{ $catergories->id }}</th>
              <td>{{ $catergories->catergory_title }}</td>
              <td>{{ $catergories->status == 1 ? 'Vissible' : 'Hidden' }}</td>
              <td class="text-center"><a href="{{ route('updatecatergory', $catergories->slug) }}" class="btn btn-warning"> <i class="fa fa-pencil mr-4 ml-4"></i> </a></td>
              <td class="text-center"><a href="{{ route('catergoryDelete', $catergories->id) }}" onclick="confirmation(event)" class = "btn btn-danger "> <i class="fa fa-trash mr-4 ml-4"></i> </a></td>
              </tr>
              @endforeach
           
          </tbody>
        </table>
       </div>
        
     

      </div>




  

<footer class="footer">
  <div class="footer__block block no-margin-bottom">
    <div class="container-fluid text-center">
      <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
       <p class="no-margin-bottom">2024 &copy; Your Umbrella . Download From <a target="_blank" href="https://templateshub.net">Templates Hub</a>.</p>
    </div>
  </div>
</footer>
</div>
</div>


   <!-- sweet alert cdn link -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" 
   integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" 
   crossorigin="anonymous" referrerpolicy="no-referrer"></script>       

               
<!-- sweet alert script -->
<script type="text/javascript">

  function confirmation(ev)
  {

    ev.preventDefault();
    var urlToRedirect = ev.currentTarget.getAttribute('href');
    console.log(urlToRedirect);

    swal({
     
          title: "Are You Sure You Want To Delete This Record ?",
          text: "This Data Will Permanently Delete",
          icon: "warning",
          buttons: true,
          dnagerMode: true,

    })

              .then((willCancel)=>{

                  if(willCancel)
                    {
                      window.location.href=urlToRedirect;
                    }

              });

  }

</script>



    


<!-- JavaScript files-->
<script src="{{ asset('/admincss/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('/admincss/vendor/popper.js/umd/popper.min.js') }}"> </script>
<script src="{{ asset('/admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/admincss/vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
<script src="{{ asset('/admincss/vendor/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('/admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('/admincss/js/charts-home.js') }}"></script>
<script src="{{ asset('/admincss/js/front.js') }}"></script>
 
  </body>
</html>