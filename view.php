<?php 
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css_final.css">
    
    <script src="filter.js"></script>
    
    <!-- <link rel="stylesheet" href="./css-1.css"> -->
    <title>Fixed table</title>
    <style>
         input[type="text"] {
      margin: 20px;
      position: absolute;
      right: 0;
    }

    /* Responsive styles using media query */
    @media only screen and (max-width: 600px) {
      input[type="text"] {
        width: 100%;
        position: center;
        margin: 20px 0;
      }
    }

    .search{
        width: 250px;
        height: 20px;
        border-radius: 3%;
    }
    </style>
</head>

<body>
    <div class="heading">
    <h1>Asset View</h1>
    <!-- <button id="get-unique-values" onclick="getUniqueValuesFromColumn()">Get unique column values</button> -->
    <input type="text" placeholder="Search Here" id="searchInput" class="search" >

</div>
    <div class="outer-wrapper">
    <div class="table-wrapper">
    <table id="emp-table">
        <thead>
            <th col-index = 1>id</th>
            <th col-index = 2>Asset ID
                <select class="table-filter" onchange="filter_rows()">
                    <option value="all"></option>
                </select>
            </th>

            <th col-index = 3>Asset Location
                <select class="table-filter" onchange="filter_rows()">
                    <option value="all"></option>
                </select>
            </th>
            <th col-index = 4>Date of Purchase
                <select class="table-filter" onchange="filter_rows()">
                    <option value="all"></option>
                </select>
            </th>
            <th col-index = 5>Remarks
                <select class="table-filter" onchange="filter_rows()">
                    <option value="all"></option>
                </select>
            </th>
            
        </thead>
        <tbody id="tableBody" >
            <?php 
                $query = "SELECT * FROM asset_entry";
                $result = mysqli_query($conn, $query);

                // Close the database connection when done
                mysqli_close($conn);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['asset_name'] . "</td>";
                    echo "<td>" . $row['asset_loc'] . "</td>";
                    echo "<td>" . $row['dop'] . "</td>";
                    echo "<td>" . $row['remarks'] . "</td>";
                    echo "</tr>";
                }
            ?>

        </tbody>
    </table>
    <script>
        $(document).ready(function(){
            $('#emp-table').DataTable()
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    
    <script>
        // JavaScript for live search with Ajax
        $(document).ready(function() {
            $("#searchInput").on("input", function() {
                var searchText = $(this).val();
                $.ajax({
                    url: "search.php",
                    method: "POST",
                    data: { search: searchText },
                    success: function(data) {
                        $("#tableBody").html(data);
                    }
                });
            });
        });
    </script>
    <!-- <script>getUniqueValuesFromColumn()
    </script> -->
    <script>
        window.onload = () => {
            console.log(document.querySelector("#emp-table > tbody > tr:nth-child(1) > td:nth-child(2) ").innerHTML);
        };

        getUniqueValuesFromColumn()
        
    </script>
</div>
</div>

</body>

</html>