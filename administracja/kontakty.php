<?php
    session_start();

    if(!isset($_SESSION['logged']))
    {
        header('Location: zaloguj');
        exit();
    }

    if(isset($_POST['tkid']))    
    {

        $everything_OK=true;

        $tkid = $_POST['tkid'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];

        require_once "redirects/connect.php";
        mysqli_report(MYSQLI_REPORT_STRICT);

        try
        {
            $connection = new mysqli($host, $db_user, $db_password, $db_name);
            if($connection->connect_errno!=0)
            {
                throw new Exception(mysqli_connect_errno());
            }
            else
            {
                //czy numer sluzbowy juz isnieje?
                $result = $connection->query("SELECT id FROM contacts WHERE tkid='$tkid'");
                if(!$result) throw new Exception($connection->error);

                $how_many_tkids = $result->num_rows;
                if($how_many_tkids>0)
                {
                    $everything_OK=false;
                    $_SESSION['e_tkid']="Podany numer służbowy jest już w bazie!";
                }

                //czy numer telefonu juz isnieje?
                $result = $connection->query("SELECT id FROM contacts WHERE phone='$phone'");
                if(!$result) throw new Exception($connection->error);
            
                $how_many_phones = $result->num_rows;
                if($how_many_phones>0)
                {
                    $everything_OK=false;
                    $_SESSION['e_phone']="Podany numer telefonu jest już w bazie!";
                }

                if($everything_OK==true)
                {
                    //Hurra, wszystkie testy zaliczone!
                    #sql query to insert into database
                    $sql = "INSERT INTO contacts VALUES(NULL, '$tkid', '$name', '$phone')";

                    if(mysqli_query($connection,$sql))
                    {
                        $_SESSION['sent']=true;
                        header('Location: kontakty');
                    }
                    else
                    {
                        throw new Exception($connection->error);
                    }
                }        
                $connection->close();
            }
        }
        catch(Exception $e)
        {
            echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
            echo '<br>Informacja developerska: '.$e;
        }
    }

?>

<?php
    include_once 'redirects/connect.php';
    $conn=mysqli_connect($host, $db_user, $db_password, $db_name);
    if(!$conn) die('Could not Connect My Sql:');
    $result = mysqli_query($conn,"SELECT * FROM contacts");
 ?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
</head>
<body>
    <?php
        echo "<p>Witaj ".$_SESSION['login'].'!</p>';
        echo "<a href='redirects/logout.php'>Wyloguj się!</a><br><br>";
        include "crud/create.php";
    ?>
<br>
<table border= "1px, solid, black">
	<tr>
        <td>Numer służbowy</td>
        <td>Imię</td>
        <td>Numer telefonu</td>
        <?php if($_SESSION['login'] == $admin) echo "<td>Akcja</td>"; ?>
	</tr>
	<?php
        $i=0;
        while($row = mysqli_fetch_array($result)) {
	?>
	<tr>
        <td><?php echo $row["tkid"]; ?></td>
        <td><?php echo $row["name"]; ?></td>
        <td><?php echo $row["phone"]; ?></td>
        <?php if($_SESSION['login'] == $admin) echo '<td><a href="crud/delete.php?id='.$row["id"].'">Usuń</a></td>'; ?>
	</tr>
	<?php
        $i++;
        }
	?>
</table>
</body>