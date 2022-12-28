</div>
</div>
</div>
</div>


@yield('script')
<!-- custom script-->
<script type="text/javascript">
  function confirmDelete(url){
         
        event.preventDefault();
        $('#deletemodal').modal('show');
        $('#confirmdelete').val(url);
      }

      $('#confirmdelete').click(function(){
       
        var url = $(this).val();
      
      document.location.href=url;  
     
      }); 
</script>
<script type="text/javascript">
  $("#rowAdder").click(function () { 
     newRowAdd =
     '<div id="row"> <div class="input-group m-3">' +
     '<div class="input-group-prepend">' +
     ' <label class="text-dark">New Feature: </label>'+
     '<button class="btn btn-danger" id="DeleteRow" type="button">' +
     '<i class="bi bi-trash"></i> Delete</button> </div>' +
     '<input type="text" name="feature[] value="{{old("feature[]")}}"></div> </div> ';
     $('#newinput').append(newRowAdd);   
 });

 $("body").on("click", "#DeleteRow", function ()
 {   $(this).parents("#row").remove();
 })
</script>


</body>

</html>