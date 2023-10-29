<?php
$con = mysqli_connect("localhost", "root", "", "loginsystem");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Function to get all trainer details
function get_all_trainers() {
    global $con;
    $query = "SELECT * FROM Trainer";
    $result = mysqli_query($con, $query);
    $trainers = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $trainers[] = $row;
    }

    return $trainers;
}

// Function to update trainer details
function update_trainer_details($Trainer_id, $Name, $phone) {
    global $con;
    $query = "UPDATE Trainer SET Name = '$Name', phone = '$phone' WHERE Trainer_id = $Trainer_id";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>alert('Trainer details updated.')</script>";
        echo "<script>window.open('trainer.php','_self')</script>";
    } else {
        echo "<script>alert('Error updating trainer details')</script>";
    }
}

// Function to delete a trainer
function delete_trainer($Trainer_id) {
    global $con;
    $query = "DELETE FROM Trainer WHERE Trainer_id = $Trainer_id";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>alert('Trainer deleted.')</script>";
        echo "<script>window.open('trainer.php','_self')</script>";
    } else {
        echo "<script>alert('Error deleting trainer')</script>";
    }
}

// Existing functions to retrieve doctor and package information
function get_doctor_details() {
    global $con;
    $query = "SELECT * FROM doctorapp";
    $result = mysqli_query($con, $query);

    while ($row = mysqli_fetch_array($result)) {
        $fname = $row['fname'];
        $lname = $row['lname'];
        $email = $row['email'];
        $contact = $row['contact'];
        $docapp = $row['docapp'];

        echo "<tr>
            <td>$fname</td>
            <td>$lname</td>
            <td>$email</td>
            <td>$contact</td>
            <td>$docapp</td>
        </tr>";
    }
}

function get_package() {
    global $con;
    $query = "SELECT * FROM Package";
    $result = mysqli_query($con, $query);

    while ($row = mysqli_fetch_array($result)) {
        $Package_id = $row['Package_id'];
        $Package_name = $row['Package_name'];
        $Amount = $row['Amount'];

        echo "<tr>
            <td>$Package_id</td>
            <td>$Package_name</td>
            <td>$Amount</td>
        </tr>";
    }
}
// Function to get payment details
function get_payment() {
    global $con;
    $query = "SELECT * FROM Payment";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_array($result)) {
        $Payment_id = $row['Payment_id'];
        $Amount = $row['Amount'];
        $payment_type = $row['payment_type'];
        $customer_id = $row['customer_id'];
        $customer_name = $row['customer_name'];
        echo "<tr>
            <td>$Payment_id</td>
            <td>$Amount</td>
            <td>$payment_type</td>
            <td>$customer_id</td>
            <td>$customer_name</td>
        </tr>";
    }
}

?>
