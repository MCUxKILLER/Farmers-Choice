<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true)
{
  header("location : home.html");
  exit;
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" />

    <!-- Lightbox CSS & Script -->
    <script src="resources/lightbox/ekko-lightbox.js"></script>
    <link rel="stylesheet" href="resources/lightbox/ekko-lightbox.css" />

    <!-- AOS css and JS -->
    <link rel="stylesheet" href="resources/aos/aos.css">
    <script src="resources/aos/aos.js"></script>
    <!-- AOS css and JS END-->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"
        integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Display Data In the Table Using PHP</title>
</head>

<body style="background:grey;">
    <div style="padding: 50px;" class="body">
        <div class="card">
            <div class="card-header">
                RECORDS OF PRIVATE PRICE
            </div>

            <div class="card-body">
                <table class="table table-hover table-dark">
                    <thead>
                        <tr>
                            <th>SNo.</th>
                            <th>Crop Name</th>
                            <th>Price</th>
                            <th>Company Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
             $conn = new mysqli('db', 'root', 'root_password', 'farmerschoice');

             if($conn->connect_error){
                 die('Connection Failed: '.$conn->connect_error);
             }
             $sql = "SELECT *FROM private";
             $results = $conn->query($sql);
             
             if(!$results) {
             die('No Record:' .$conn->connect_error);
                }
            while($row = $results->fetch_assoc())
                {
                    echo "
                    <tr>
                        <td scope=\"col\">".$row["SNo."]."</td>
                        <td scope=\"col\">".$row["Crop_Name"]."</td>
                        <td scope=\"col\">".$row["Price"]."</td>
                        <td scope=\"col\">".$row["Company_Name"]."</td>
                    </tr>";
                } 
             ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <p>Select the crop which you want to sell</p>
    <form action="private_calculation.php" method="POST">

        <div>Crop: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<select name="crop">
                <option value="Rice">Rice</option>
                <option value="Wheat">Wheat</option>
                <option value="Barley">Barley</option>
                <option value="Bajra">Potato</option>
            </select><br><br></div>

        <div>Company: &nbsp; &nbsp; &nbsp; &nbsp;<select name="company">
                <option value="TATA">TATA</option>
                <option value="ITC">ITC</option>
                <option value="Nestle">Nestle</option>
                <option value="Kissan">Kissan</option>
            </select><br><br></div>

        Quantity: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="text" name="quantity"
            placeholder="(In Quintals)" /></label>

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
    </div>
</body>

</html>