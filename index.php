<?php

      include 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">

</head>
<body>
    <div class="container">
        <div class="text">
           Asset Entry Form
        </div>
        <form action="assert_insert.php" method="POST">
           <div class="form-row">
              <div class="input-data">
              <input type="text" required name="aname">
                 <div class="underline"></div>
                 <label for="">Asset Name</label>
              </div>
              <div class="input-data">
                 <input type="text" required name="dop">
                 <div class="underline"></div>
                 <label for="">Date of purchase</label>
              </div>
           </div>
           <div class="form-row">
              <div class="input-data">
              <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
              <select class="asset_list" name="aloc" >
               <option value="">Select the Location</option>
               <?php

               $sql = "SELECT val_loc, asset_loc FROM location";
               $result = $conn->query($sql);
   
               
               if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                      echo '<option value="' . $row['val_loc'] . '">' . $row['asset_loc'] . '</option>';
                  }
              } else {
                  echo '<option value="">No Location Found</option>';
              }
              ?>
              </select>
              <script>
               jQuery('.asset_list').chosen();
              </script>
              </div>
              <div class="input-data">
               <input type="text" required name="cost" >
               <div class="underline"></div>
               <label for="">Cost</label>
            </div>
           </div>

           
           <div class="form-row">
            <div class="input-data">
               <input type="text" required name="remarks" >
               <div class="underline"></div>
               <label for="">Remarks</label>
            </div>
           

         </div>

         
           <div class="form-row">
            <div class="input-data">
              <!-- <textarea rows="8" cols="80" required></textarea>
              <br />
              <div class="underline"></div>
              <label for="">Write your message</label> -->
              <br />
              <div class="form-row submit-btn">
              <div class="input-data">
         <div class="inner"></div>
         <input type="submit" value="submit">
      </div>
      
              </div>
              
              
        </form>
        
        
        </div>
</body>
</html>