<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "lcm enterprises";

    //Create connection
    $connection = new mysqli($servername, $username, $password, $database);


    $id = "";
    $create_at = "";
    $capital_budget = "";
    $transactions = "";
    $day_cycle = "";
    $collection_day = "";
    $capital_deploy = "";
    $collected_fund = "";
    $earning = "";
    $total_collection = "";
    $balance = "";
    $status = "";

    $errorMessage = "";
    $successMessage = "";

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        //GET method: Show the date of the records

        if (!isset($_GET['id'])) {
            header("location: record.php");
            exit;
        }

        $id = $_GET['id'];

        //read the row of the selected record from database table
        $sql = "SELECT * FROM records WHERE id=$id";
        $result = $connection->query($sql);
        $row = $result->fetch_assoc();

        if(!$row) {
            header("location: record.php");
            exit;
        }

        $capital_budget = $row["capital_budget"];
        $transactions = $row["transactions"];
        $capital_deploy = $row["capital_deploy"];
        $day_cycle = $row["day_cycle"];
        $collection_day = $row["collection_day"];
        $collected_fund = $row["collected_fund"];
        $earning = $row["earning"];
        $total_collection = $row["total_collection"];
        $balance = $row["balance"];
        $status = $row["status"];

    }else{
        //POST method: Update the data of the records
        $id = $_POST["id"];
        $capital_budget = $_POST["capital_budget"];
        $transactions = $_POST["transactions"];
        $capital_deploy = $_POST["capital_deploy"];
        $day_cycle = $_POST["day_cycle"];
        $collection_day = $_POST["collection_day"];
        $collected_fund = $_POST["collected_fund"];
        $earning = $_POST["earning"];
        $total_collection = $_POST["total_collection"];
        $balance = $_POST["balance"];
        $status = $_POST["status"];

        do {
            if ( empty($id) || empty($capital_budget) || empty($transactions) || empty($capital_deploy) || empty($day_cycle) || empty($collection_day) || empty($collected_fund) || empty($earning) || empty($total_collection) || empty($balance) || empty($status)) {
                $errorMessage = "All the Fields are Required.";
                break;

            }

            $sql = "UPDATE records SET capital_budget = '$capital_budget', transactions = '$transactions', capital_deploy = '$capital_deploy', day_cycle = '$day_cycle', collection_day = '$collection_day',  collected_fund = '$collected_fund', earning = '$earning', total_collection = '$total_collection', balance = '$balance', status = '$status' 
            WHERE id = $id";
            
            $result = $connection->query($sql);

            if (!$result) {
                $errorMessage  = "Invalid Query: " . $connection->error;
                break;
            }

            $successMessage = "Record Updated Successfully!";
            header("location: record.php");
            exit;


        } while(true);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="x-icon" href="LCM.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Transaction</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
</head>
<body>
    <div class="container">
      <div class="box form-box">
        <h2>Update Record</h2>

        <?php
        
        if( !empty($errorMessage)){
            echo "
            <div class='alert alert-warning alert-dismissable fade show' role='alert'>
            <strong>$errorMessage</strong>
            <button type='button' clas='btn-close' data-bs-dismiss='alert' arial-label='Close' ></button>
            </div>
        
            ";
        }
        ?>
        
        <form action="" method="post">
            <input type="hidden" name= "id" value="<?php echo $id; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Capital Budget</label>
                <div class="col-sm-6">
                    <input type="text" id="capital_budget" class="form-control" name="capital_budget" min="0" value="<?php echo $capital_budget; ?>" step="any" readonly >
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Transaction</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="transactions" value="<?php echo $transactions; ?>" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Capital Deploy</label>
                <div class="col-sm-6">
                        <select name="capital_deploy" id="capital_deploy" class="form-control" readonly>
                        <option><?php echo $capital_deploy; ?></option>
                        </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Day Cycle</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="day_cycle" value="<?php echo '3 days'; ?>" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Collection Day</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="collection_day" value="<?php echo $collection_day; ?>" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <h2>Collection Record</h2>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Collected Fund</label>
                <div class="col-sm-6">
                    <select name="collected_fund" id="collected_fund" class="form-control">
                        <option>----</option>
                        <option value="15,000">15,000</option>
                        <option value="30,000">30,000</option>
                        <option value="45,000">45,000</option>
                        <option value="60,000">60,000</option>
                        <option value="75,000">75,000</option>
                        <option value="90,000">90,000</option>
                        <option value="105,000">105,000</option>
                        <option value="120,000">120,000</option>
                        <option value="135,000">135,000</option>
                        <option value="150,000">150,000</option>
                        <option value="165,000">165,000</option>
                        <option value="180,000">180,000</option>
                        <option value="195,000">195,000</option>
                        <option value="210,000">210,000</option>
                        <option value="225,000">225,000</option>
                        <option value="240,000">240,000</option>
                        <option value="255,000">255,000</option>
                        <option value="270,000">270,000</option>
                        <option value="285,000">285,000</option>
                        <option value="300,000">300,000</option>
                        <option value="315,000">315,000</option>
                        <option value="330,000">330,000</option>
                        <option value="345,000">345,000</option>
                        <option value="360,000">360,000</option>
                        <option value="375,000">375,000</option>
                        <option value="390,000">390,000</option>
                        <option value="405,000">405,000</option>
                        <option value="420,000">420,000</option>
                        <option value="435,000">435,000</option>
                        <option value="450,000">450,000</option>
                        <option value="465,000">465,000</option>
                        <option value="480,000">480,000</option>
                        <option value="495,000">495,000</option>
                        <option value="510,000">510,000</option>
                        <option value="525,000">525,000</option>
                        <option value="540,000">540,000</option>
                        <option value="555,000">555,000</option>
                        <option value="570,000">570,000</option>
                        <option value="585,000">585,000</option>
                        <option value="600,000">600,000</option>

                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Earning</label>
                <div class="col-sm-6">
                <select name="earning" id="earning" class="form-control">
                        <option>---</option>
                        <option value="10,000">10,000</option>
                        <option value="20,000">20,000</option>
                        <option value="30,000">30,000</option>
                        <option value="40,000">40,000</option>
                        <option value="50,000">50,000</option>
                        <option value="60,000">60,000</option>
                        <option value="70,000">70,000</option>
                        <option value="80,000">80,000</option>
                        <option value="90,000">90,000</option>
                        <option value="100,000">100,000</option>
                        <option value="110,000">110,000</option>
                        <option value="120,000">120,000</option>
                        <option value="130,000">130,000</option>
                        <option value="140,000">140,000</option>
                        <option value="150,000">150,000</option>
                        <option value="160,000">160,000</option>
                        <option value="170,000">170,000</option>
                        <option value="180,000">180,000</option>
                        <option value="190,000">190,000</option>
                        <option value="200,000">200,000</option>
                        <option value="210,000">210,000</option>
                        <option value="220,000">220,000</option>
                        <option value="230,000">230,000</option>
                        <option value="240,000">240,000</option>
                        <option value="250,000">250,000</option>
                        <option value="260,000">260,000</option>
                        <option value="270,000">270,000</option>
                        <option value="280,000">280,000</option>
                        <option value="290,000">290,000</option>
                        <option value="300,000">300,000</option>
                        <option value="310,000">310,000</option>
                        <option value="320,000">320,000</option>
                        <option value="330,000">330,000</option>
                        <option value="340,000">340,000</option>
                        <option value="350,000">350,000</option>
                        <option value="360,000">360,000</option>
                        <option value="370,000">370,000</option>
                        <option value="380,000">380,000</option>
                        <option value="390,000">390,000</option>
                        <option value="400,000">400,000</option>
                        <option value="410,000">410,000</option>
                        <option value="420,000">420,000</option>
                        <option value="430,000">430,000</option>
                        <option value="440,000">440,000</option>
                        <option value="450,000">450,000</option>
                        <option value="460,000">460,000</option>
                        <option value="470,000">470,000</option>
                        <option value="480,000">480,000</option>
                        <option value="490,000">490,000</option>
                        <option value="500,000">500,000</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Total Collection</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" name="total_collection" id="result" min="0" value="<?php echo $total_collection; ?>">
                    </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Balance</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" id="balance" name="balance" value="<?php echo $balance; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Status</label>
                <div class="col-sm-6">
                    <select class="form-control" name="status">
                        <option >-UPDATE STATUS-</option>
                        <option value="COLLECTED">COLLECTED</option>
                        <option value="NOTCOLLECTED">NOT COLLECTED</option>
                    </select>
                </div>
            </div>

            <?php
        
            if( !empty($successMessage)){
                echo "
                <div class='row mb-3'>
                    <div clas='offset-sm-3 col-cm-6'>
                        <div class='alert alert-warning alert-dismissable fade show' role='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' clas='btn-close' data-bs-dismiss='alert' arial-label='Close' ></button>
                        </div>
                    </div>
                </div>
                ";
            }
            ?>


            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="offset-sm-3 col-sm-3 d-grid">
                <a href="record.php" class="btn btn-danger" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>  
    </div>
    
</body>
</html>