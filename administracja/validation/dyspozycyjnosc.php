<?php
    session_start();
    if(!isset($_SESSION['logged']))
    {
        header('Location: zaloguj');
        exit();
    }

    $shifts = array("monday1", "monday2",
    "tuesday1", "tuesday2",
    "wednesday1", "wednesday2",
    "thursday1", "thursday2",
    "friday1", "friday2",
    "saturday1", "saturday2",
    "sunday1", "sunday2");

    $days = array("Poniedziałek", "Wtorek", "Środa", "Czwartek", "Piątek", "Sobota", "Niedziela");
    $daysEn = array("monday", "tuesday", "wednesday", "thursday", "friday", "saturday", "sunday");

    // pobieranie uprawnienia oraz id zalogowanego użytkownika
    include_once 'redirects/db-management.php';
    $managementCon = mysqli_connect($host, $db_user, $db_password, $db_name);
    if(!$managementCon) die('Nie można połączyć się z bazą danych!');

    $login = $_SESSION['login'];
    $currentIdRole = mysqli_query($managementCon, "SELECT * FROM users WHERE login='$login'");
    if ($currentIdRole->num_rows > 0) 
    {
        while($row = $currentIdRole->fetch_assoc()) 
        {
            $currentRole = $row["role"];
            $currentTkid = $row["tkid"];
        }
    }
    // aktualizacja tabeli
    if(isset($_POST['dateStartUpdate']) && isset($_POST['dateEndUpdate']))
    {
        $everything_OK=true;
        require_once "redirects/db-availability.php";
        mysqli_report(MYSQLI_REPORT_STRICT);

        try
        {
            $availabilityCon = new mysqli($host, $db_user, $db_password, $db_name);
            if($availabilityCon->connect_errno!=0) throw new Exception(mysqli_connect_errno());
            else
            {
                if($everything_OK==true)
                {
                    $dateStartUpdate = $_POST['dateStartUpdate'];
                    $dateEndUpdate = $_POST['dateEndUpdate'];
                    $tmpTableName = $dateStartUpdate."_".$dateEndUpdate;
                    $tableName = str_replace("-","",$tmpTableName);
                    $tkid = $_POST['tkid'];
                    $shift = $_POST['day'].$_POST['hour'];
                    $availability = $_POST['availability'];
                    
                    if(mysqli_query($availabilityCon, "UPDATE $tableName SET $shift = '$availability' WHERE tkid = '$tkid'"))
                    {
                        $_SESSION['sent']=true;
                        $query = "SELECT * FROM $tableName";
                        $result = mysqli_query($availabilityCon, $query);    
                    }
                    else throw new Exception($availabilityCon->error);
                }
            }
        }
        catch(Exception $e)
        {
            echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
            echo '<br>Informacja developerska: '.$e;
        }
    }



    // wyświetlanie tabeli
    if(isset($_POST['dateStart']) && isset($_POST['dateEnd']))
    {
        $everything_OK=true;
        require_once "redirects/db-availability.php";
        mysqli_report(MYSQLI_REPORT_STRICT);

        try
        {
            $availabilityCon = new mysqli($host, $db_user, $db_password, $db_name);
            if($availabilityCon->connect_errno!=0)
            {
                throw new Exception(mysqli_connect_errno());
            }
            else
            {
                $dateStart = $_POST['dateStart'];
                $dateEnd = $_POST['dateEnd'];
                $tmpTableName = $dateStart."_".$dateEnd;
                $tableName = str_replace("-","",$tmpTableName);

                // $result = $connection->query("SELECT tkid from $tableName");
                // $rowsCounter = $result->num_rows;
        
                //sprawdzanie istnienia grafiku
                $result = $availabilityCon->query("SELECT Table_name from information_schema.tables WHERE Table_name = '$tableName'");
                if(!$result) throw new Exception($availabilityCon->error);

                $how_many_tables = $result->num_rows;
                if($how_many_tables==0)
                {
                    $everything_OK=false;
                    $_SESSION['e_read']="Grafik z wybranego przedziału nie istnieje!";
                }

                if($everything_OK==true) $display = mysqli_query($availabilityCon, "SELECT * FROM $tableName");
            }
        }
        catch(Exception $e)
        {
            echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
            echo '<br>Informacja developerska: '.$e;
        }
    }
    else
    {
        if(isset($dateStartUpdate) && isset($dateEndUpdate))
        {
            $dateStart = $dateStartUpdate;
            $dateEnd = $dateEndUpdate;
        }
        else
        {
            include_once 'redirects/show-tables.php';
            $newestTable = mysql_tablename($showAvailability, (mysql_num_rows($showAvailability)-1));
        
            include_once 'redirects/db-availability.php';
            $availabilityCon = mysqli_connect($host, $db_user, $db_password, $db_name);
            if(!$availabilityCon) die('Could not Connect My Sql:');
        
            $query = "SELECT * FROM $newestTable";
            $display = mysqli_query($availabilityCon, $query);
            mysql_free_result($showAvailability);
        }


        // include_once 'redirects/show-tables.php';
        // $newestTable = mysql_tablename($showAvailability, (mysql_num_rows($showAvailability)-1));

        // include_once 'redirects/db-availability.php';
        // $connection=mysqli_connect($host, $db_user, $db_password, $db_name);
        // if(!$connection) die('Nie można połączyć się z bazą danych!');

        // if(isset($tableName)) $result = $connection->query("SELECT tkid from $tableName");
        // else $result = $connection->query("SELECT tkid from $newestTable");
        // $rowsCounter = $result->num_rows;

        // if($currentRole == "admin") $query = "SELECT * FROM $newestTable";
        // else $query = "SELECT * FROM $newestTable WHERE tkid = '$currentTkid'";
        // $display = mysqli_query($availabilityCon, $query);
    }
?>