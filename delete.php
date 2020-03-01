<?php

// connect to the database
include('connection.php');

// confirm that the 'id' variable has been set
if (isset($_GET['id']) && is_numeric($_GET['id']))
{
// get the 'id' variable from the URL
$id = $_GET['id'];

// delete transaction from database
if ($stmt = $mysql->prepare("DELETE FROM transactions WHERE idTransaction = ? LIMIT 1"))
{
$stmt->bind_param("i",$id);
$stmt->execute();
$stmt->close();
}
else
{
echo "ERROR: could not prepare SQL statement.";
}
$mysql->close();

// redirect user after delete is successful
header("Location: addtransaction.php");
}

?>