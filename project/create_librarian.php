<?php
$sqlQuery = "";
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $con = mysqli_connect('localhost', 'root', '', 'db_library');

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // fname, lname, employeeSsn, birthday, address, salary, 

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $employeeSsn = $_POST['employeeSsn'];
    $birthday = $_POST['birthday'];
    $address = $_POST['address'];
    $salary = $_POST['salary'];

    $sqlQuery = "INSERT INTO `librarian` (`Fname`, `Lname`, `EmployeeSSN`, `Bdate`, `Address`, `Salary`) 
    VALUES ('$fname', '$lname', '$employeeSsn', '$birthday', '$address', '$salary')";

    $result = mysqli_query($con, $sqlQuery);

     if ($result) {
        $message = "Librarian has been created successfully.";
    } else {
        $message = "Error creating book: " . mysqli_error($con);
    }
    

    mysqli_close($con);
}

if (true) {
    echo "<a href='librarian.html'><button>Back</button></a>";
} 

if (!empty($sqlQuery)) {
    echo "<p><strong>SQL Query:</strong> " . htmlspecialchars($sqlQuery) . "</p>";
}

if (!empty($message)) {
    echo "<p><strong>Results:</strong><br> " . $message . "</p>";
}
?>
