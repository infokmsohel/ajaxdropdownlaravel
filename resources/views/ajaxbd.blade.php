<!DOCTYPE html>
<html>
<head>
    <title>test</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    {{-- <script src="http://www.codermen.com/js/jquery.js"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>

        <div class="container">

                <form>
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputPassword4">Password</label>
                            <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                          </div>
                        </div>
                        
                        <div class="form-row">
                                <div class="form-group col-md-4">
                                        <label for="inputDivision">Division</label>
                                        <select id="inputDivision" name="division_id" class="form-control">
                                                <option value="" selected disabled>Select</option>
                                            {{-- <option value="">Choose...</option> --}}

                                          @foreach ($divisions as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                                                     </select>
                                      </div>
                          <div class="form-group col-md-4">
                            <label for="inputDistrict">District</label>
                            <select id="inputDistrict" name="district_id" class="form-control">
                                    {{-- <option  value="">Choose...</option>
                                    <option value="">narayangonj</option>
                                    <option value="">gazipur</option> --}}
                             </select>
                          </div>
                          <div class="form-group col-md-4">
                                <label for="inputUpazila">Upazila</label>
                                <select id="inputUpazila" name="upazila_id" class="form-control">
                                  {{-- <option value="">Choose...</option>
                                  <option value="">tongi</option>
                                  <option value="">vedorgonj</option> --}}
                                </select>
                              </div>
                        </div>


                        <div class="form-row">
                          <div class="form-group col-md-4">
                                  <label for="title">Title</label>
                                  <select id="title" name="title_id" class="form-control">
                                          <option value="" selected disabled>Select</option>
                                      {{-- <option value="">Choose...</option> --}}

                                    @foreach ($posts as $key => $value)
                              <option value="{{ $key }}">{{ $value }}</option>
                          @endforeach
                                               </select>
                                </div>
                                <div class="form-group col-md-4">
                                  <label for="des">Description</label>
                                  <input type="text"  id="des" name="description" class="form-control"  >
                                </div>

                                <div class="form-group col-md-4">
                                  <label for="con">Content</label>
                                  <input type="text" name="content" class="form-control" id="con"  >
                                </div>
                    
                  </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
              </div>

              <script type="text/javascript">
                $('#inputDivision').change(function(){
                var divisionID = $(this).val();    
                if(divisionID){
                    $.ajax({
                       type:"GET",
                       url:"{{url('get-district-list')}}?division_id="+divisionID,
                       success:function(res){               
                        if(res){
                            $("#inputDistrict").empty();
                            $("#inputDistrict").append('<option>Select</option>');
                            $.each(res,function(key,value){
                                $("#inputDistrict").append('<option value="'+key+'">'+value+'</option>');
                            });
                       
                        }else{
                           $("#inputDistrict").empty();
                        }
                       }
                    });
                }else{
                    $("#inputDistrict").empty();
                    $("#inputUpazila").empty();
                }      
               });
                $('#inputDistrict').on('change',function(){
                var districtID = $(this).val();    
                if(districtID){
                    $.ajax({
                       type:"GET",
                       url:"{{url('get-upazila-list')}}?district_id="+districtID,
                       success:function(res){               
                        if(res){
                            $("#inputUpazila").empty();
                            $.each(res,function(key,value){
                                $("#inputUpazila").append('<option value="'+key+'">'+value+'</option>');
                            });
                       
                        }else{
                           $("#inputUpazila").empty();
                        }
                       }
                    });
                }else{
                    $("#inputUpazila").empty();
                }
                    
               });




               $('#title').change(function(){
                var titleID = $(this).val();    
                if(titleID){
                    $.ajax({
                       type:"GET",
                       url:"{{url('get-post-list')}}?post_id="+titleID,
                       success:function(res){               
                        if(res){
                           
                               $('#des').val(res.description);
                              $('#con').val(res.content);
                       
                        }else{
                           $("#title").empty();
                        }
                       }
                    });
                }else{
                    $("#des").empty();
                    $("#con").empty();
                }      
               });
            </script>


  

   
</body>
</html>











