<?php
//  echo rand(199999,899999);
function codec()
{
    return sprintf(rand(199999,899999));
}
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    include ('../partials/dbcon.php');
    $name=$_POST["name"];
    $email=$_POST["email"];
    $date=$_POST["date"];
    $time=$_POST["time"];
    $location=$_POST["location"];
    $ticket=$_POST["ticket"];
    $id=codec();
 require("../fpdf/fpdf.php");
 $pdf=new FPDF();
 $pdf->AddPage();

 $pdf-> SetFont("Arial","B",15);
 $pdf-> Cell(0,10,"Details About Your event",0,1,'C');
 
 $pdf-> SetFont("Arial","B",14);
 $pdf ->Cell(40,10,"Event Name:",0,0);
 $pdf ->Cell(0,10,"$name",0,1);
 
 $pdf ->Cell(20,10,"Email:",0,0);
 $pdf ->Cell(0,10,"$email",0,1);

 $pdf ->Cell(15,10,"Code:",0,0);
 $pdf ->Cell(0,10,"$id",0,1);
 
 $pdf ->Cell(15,10,"Date",0,0);
 $pdf ->Cell(0,10,"$date",0,1);

 $pdf ->Cell(15,10,"Time:",0,0);
 $pdf ->Cell(0,10,"$time",0,1);

 $pdf ->Cell(25,10,"Location:",0,0);
 $pdf ->Cell(0,10,"$location",0,1);

 $pdf ->Cell(45,10,"Number of Tickets:",0,0);
 $pdf ->Cell(0,10,"$ticket",0,1);

 $pdf ->Cell(65,10,"Cost of  Each Ticket:",0,0);
 $pdf ->Cell(0,10,"Rs.300",0,1);

 $pdf ->Cell(45,10,"Total Cost",0,0);
 $pdf ->Cell(0,10,"Rs.".($ticket*300),0,1);
 

 $pdf -> output();

 $sql="INSERT INTO `invoice` (`id`, `name`, `email`, `date`, `time`, `location`, `ticket`) VALUES ('$id', '$name', '$email', '$date', '$time', '$location', '$ticket')";
 $result=mysqli_query($con,$sql);

}
 
?>