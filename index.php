<!doctype html>
<html lang="en">

<head>
  <title>Insert Multiple PHP, Bootstrap, Jquery, Ajax</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body class="bg-dark">
  
<div class="container">
   <div class="row my-4">
       <div class="col-lg-10 mx-auto">
           <div class="card shadow">
              <div class="card-header">
                <h4>Add Items</h4>
            </div>
              <div class="card-body p-4">
                <div id="show_alert"></div>
                  <form action="" method="POST" id="add_form">
                    <div id="show_item">
                         <div class="row">
<!--
                             <div class="col-md-4 mb-3">
                                <input type="text" name="product_name[]" id="" class="form-control" placeholder="Item Name" required>  
                             </div>

                             <div class="col-md-3 mb-3">
                                <input type="number" name="product_price[]" id="" class="form-control" placeholder="Item Price" required>  
                             </div>

                             <div class="col-md-3 mb-3">
                                <input type="number" name="product_qty[]" id="" class="form-control" placeholder="Item Quantity" required>  
                             </div>
                              -->

                            <div class="col-md-2 mb-3 d-grid">
                                <button class="btn btn-success add_item_btn">Add More</button>
                            </div>
   
                         </div>
                     
                    </div>

                   <div>
                        <input type="submit" value="Add" class="btn btn-primary w-25" id="add_btn">
                   </div>

                  </form>
              </div>
           </div>
       </div>
   </div>
</div>


<!-- Jquery CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function(){
         $(".add_item_btn").click(function(e){
            e.preventDefault();
            $("#show_item").prepend(`<div class="row append_item">

<div class="col-md-4 mb-3">
   <input type="text" name="product_name[]" id="" class="form-control" placeholder="Item Name" required>  
</div>

<div class="col-md-3 mb-3">
   <input type="number" name="product_price[]" id="" class="form-control" placeholder="Item Price" required>  
</div>

<div class="col-md-3 mb-3">
   <input type="number" name="product_qty[]" id="" class="form-control" placeholder="Item Quantity" required>  
</div>

<div class="col-md-2 mb-3 d-grid">
   <button class="btn btn-danger remove_item_btn">Remove</button>
</div>

</div>`);
         });

    $(document).on('click', '.remove_item_btn', function(e){
       e.preventDefault();
       let row_item = $(this).parent().parent();
       $(row_item).remove();
    });

//// AJAX REQUEST INSERT
  $('#add_form').submit(function(e){
    e.preventDefault();
    $("#add_btn").val('Adding....');
    $.ajax({
        url: 'action.php',
        method:'POST',
        data: $(this).serialize(),
        success:function(response){
            $("#add_btn").val('Add');
            $("#add_form")[0].reset();
            $(".append_item").remove();
            $("#show_alert").html(`<div class="alert alert-success" role="alert">${response}</div>`);
        }
    });
  });
});
</script>

  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>