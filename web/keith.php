<DOCTYPE html>
<html>
   <head>
      <title>Keith's Page</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1">
   </head>
   <body>
      <div class="container">
        <h1>Class Schedule</h1>
        <table class="table-hover">
            <tr>
                <th>Class</th>
                <th>Time</th>
            </tr>
            <tr>
                <td>CS313 Web Development II</td>
                <td>Online</td>
            </tr>
        </table>

        <br/>
        
        <img src="keithnchelsey.jpg" class="img-rounded" alt="Picture">
        <button type="button" onclick="clicked()">Click Me!!!</button>
        <div id="button" class="well"></div>
      </div>
   </body>

<?php

    function clicked() {
        document.getElementById("button").innerhtml = "Ha you did";
    }
?>
</html>
