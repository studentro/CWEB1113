<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <!--container-->
        <div class="container">
            <div class="page-header">
                <h1>Edit Record<h1>
            </div>
        </div>
        <?php 
        $id=issit($_GET['id'])?$_GET['id'] : die("ERROR: Record ID not found.")
        //echo $id;
        try
        {
            //prepare query
            $query="SELECT id,First_Name,Last_Name,Student_Email,Student_Phone From students ORDER by id DESC";
            $stmt=$con->prepare ($query);
            $stmt->bindParam(1,$id);
            //execute query 
            $stmt->execute();
            $row=$stmt->fetch(PDO :: FETCH_ASSOC):

            echo"<pre>";
            echo $row;
            echo "</pre>";

        }
        catch(PDOexception $ER)
        {
            echo "ERROR :".$ER->getMessage();
        }

        ?>

<form action= "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method= "post">
            <table class="table table-hover table-response table-bordered">
                <tr>
                     <td> First Name</td>
                     <td><input type="text" name="fname" class="form-control"></td>
                    
                </tr>
                <tr>
                    <td> Last Name</td>
                    <td><input type="text" name="1name" class="form-control"></td>
                   
                </tr>
                <tr>
                    <td> Student Email</td>
                    <td><input type="text" name="1name" class="form-control"></td>
                   
                </tr>
                <tr>  
                     
                     <td> student phone number</td>
                    <td><input type="text" name="fname" class="form-control"></td>
                   
                </tr>
                <tr>
                <td>
                    <input type="submit" value="Save" class="btn btn-primary">
                    <a href="index.php" class="btn btn-danger">Go back</a>
                </td>

            </table>
        </form>
        <!--end container-->

        
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <script src="" async defer></script>
    </body>
</html>