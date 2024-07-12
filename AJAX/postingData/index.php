 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Jquery Post Form Data using Ajax serialize() method</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>   
           <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:600px;">  
                <h3>Jquery Post Form Data using Ajax serialize() method</h3><br />  
                <form id="submit_form">  
                     <label>Title</label>  
                     <input type="text" name="title" id="title" class="form-control" />  
                     <br />  
                     <label>Description</label>  
                     <textarea name="description" id="description" class="form-control"></textarea>  
                     <br />  
                     <input type="submit" name="submitBtn" id="submit" class="btn btn-info" value="Submit" />  
                </form>  
                <div id="response"></div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#submit').click(function(e){ 
          e.preventDefault();
          var title = $('#title').val();  
          var description = $('#description').val();  

          console.log(title);
          console.log(description);
          if(title == '' || description == '') {
               $('#response').html('<span class="text-danger">All Fields are required</span>');  
          }  
          else {  
               $.ajax({  
                url:"dbcon.php",  
                method:"POST",  
                data:$('#submit_form').serialize(),  
                beforeSend:function(){  
                     $('#response').html('<span class="text-info">Loading response...</span>');  
                },  
                success:function(data){  
                     $('form').trigger("reset");  
                     $('#response').fadeIn().html(data);  
                     setTimeout(function(){  
                          $('#response').fadeOut("slow");  
                     }, 5000);  
                }  
               });  
           }  
      });  
 });  
 </script>  

