<!DOCTYPE html>
<html>
<head>
  <title>jQuery Form Example</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
</head>
<body>

<div class="containerOfInfo">
  <div class="randomParentDiv">
    <div class="elHere">GETTHTUTHUTHUTHTHTUTHISTHIS</div>
    <div class="elHereAgain">We should see this</div>
    <div class="newParent">
      <h4 class="infoone">Data 1 is Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quis quos itaque at minima fugiat enim, beatae veritatis quasi explicabo ad, dolor asperiores qui harum a eius! Inventore, quas nostrum possimus.</h4>

      <h4 class="infotwo">Data 2 is Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos at, earum sed. Velit voluptatibus harum accusantium tempora nulla eaque mollitia veritatis est nisi minima nesciunt, necessitatibus, officiis eius. Expedita, sed.</h4>

      <img src="https://images.unsplash.com/photo-1731877818770-820faabe2d4c?q=80&w=1964&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" width="300" height="300" class="imgFromCont">

      <button type="button" class="btn btn-primary showModal" data-toggle="modal" data-target="#exampleModal">
        Launch demo modal
      </button>  

      <button type="button" class="btn btn-info newShowModal" data-toggle="modal" data-target="#newModal">Launch new modal</button>
    </div>
  </div>
</div>

<div class="containerOfInfo">
  
  <h4 class="infoone">Data 1 anotha is Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quis quos itaque at minima fugiat enim, beatae veritatis quasi explicabo ad, dolor asperiores qui harum a eius! Inventore, quas nostrum possimus.</h4>
  
  <h4 class="infotwo">Data 2 is anotha Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos at, earum sed. Velit voluptatibus harum accusantium tempora nulla eaque mollitia veritatis est nisi minima nesciunt, necessitatibus, officiis eius. Expedita, sed.</h4>
  
  <img src="https://images.unsplash.com/photo-1731877818770-820faabe2d4c?q=80&w=1964&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" width="300" height="300" class="imgFromCont">

  <button type="button" class="btn btn-primary showModal" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
  </button>  
</div>

<div class="containerOfInfo">
  <h4 class="infoone">Data 1 is yesanota Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quis quos itaque at minima fugiat enim, beatae veritatis quasi explicabo ad, dolor asperiores qui harum a eius! Inventore, quas nostrum possimus.</h4>
  <h4 class="infotwo">Data 2 is yesanota Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos at, earum sed. Velit voluptatibus harum accusantium tempora nulla eaque mollitia veritatis est nisi minima nesciunt, necessitatibus, officiis eius. Expedita, sed.</h4>

  <img src="https://images.unsplash.com/photo-1731877818770-820faabe2d4c?q=80&w=1964&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" width="300" height="300" class="imgFromCont">


  <button type="button" class="btn btn-primary showModal" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
  </button>  
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal tidddddtle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="infoonehere"></p>
        <p class="infotwohere"></p>
        <h2 class="fromtheparent"></h2>
        <h2 class="fromtheparentagain"></h2>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="newModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="" alt="" width="40" height="40" class="imgHere">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script>
  $('.showModal').on('click', function (e) {
    $('#exampleModal').find('.infoonehere').text($(this).siblings('.infoone').text());
    $('#exampleModal').find('.infotwohere').text($(this).siblings('.infotwo').text());
    $('#exampleModal').find('.fromtheparent').text($(this).closest('.randomParentDiv').find('.elHere').text());
    $('#exampleModal').find('.fromtheparentagain').text($(this).closest('.randomParentDiv').find('.elHereAgain').text());
  })

  $('.newShowModal').on('click', function (e) {
    $('#newModal').find('.imgHere').attr("src", $(this).siblings('.imgFromCont').attr('src'));
  })
</script>


</body>
</html>