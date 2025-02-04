<?php
class layout{
    public function header(){
      ?>

      <!DOCTYPE html>
      <html lang="en">
      <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Edu+AU+VIC+WA+NT+Arrows&family=Jaro:opsz@6..72&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="./styles/style1.css">
        <script src="https://kit.fontawesome.com/333c1941e5.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="crossorigin="anonymous"></script>
        <script> 
        $(document).ready(function() {
           $("#search1").keyup(function() {
             var search = $(this).val(); 
             if (search != "") {
               $.ajax(
                { 
                       url: './includes/search.php', 
                       method: 'POST', 
                       data: {search: search}, 
                      success: function(data) {
                        $("#results thead").html("<tr><th>Name</th><th>Level</th></tr>");
                         $("#results tbody").html(data); 
                        } });
                 } else {
                  $("#results thead").html("<tr><th colspan='2'>Type something to search for hospitals...</th></tr>");
                   $("#results tbody").html("");
                   } 
                  }
                ); 
                  $("#results thead").html("<tr><th colspan='2'>Type something to search for hospitals...</th></tr>");
                }
              );
           </script>
      </head>
      <body>
        <div class="web-skeleton">
      <?php
    }
    public function footer(){
      ?>
      </div>
      </body>
     </html>
     <?php
    }

}
