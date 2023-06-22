<?php

$dsn = "mysql:host=localhost:3306;dbname=script_cinema_rz";
$username = "root";
$password = "";

try{
    $db = new PDO($dsn, $username, $password);
    echo "Connection!!!<br>";
}
catch(PDOException $e){
    $error = $e->getMessage();
    echo $error;
    exit();
}

$sql = "INSERT INTO type_film (name_type_film)
        VALUES (?)";

$d = $db->prepare($sql);
$d->execute(["Comique"]);



?>
<select name="actor<?=$key?>" id="actor<?=$key?>">
                                <?php
                                foreach($actorList as $index => $actors)
                                    {
                                        if($actors['actor'] == $cast['actor'])
                                            { ?>
                                                <option value="<?= $actors['actor']?>" selected><?= $actors['actor']?></option>
                                    <?php   }
                                        else
                                            {   ?>
                                                <option value="<?= $actors['actor']?>"><?= $actors['actor']?></option>
                                    <?php   }
                                    }?>


<select name="role<?=$key?>" id="role<?=$key?>">
                                <?php
                                foreach($roleList as $roles)
                                    {
                                        if($roles['role'] == $cast['role'])
                                            { ?>
                                                <option value="<?= $roles['role']?>" selected><?= $roles['role']?></option>
                                    <?php   }
                                        else
                                            {   ?>
                                                <option value="<?= $roles['role']?>"><?= $roles['role']?></option>
                                    <?php   }
                                    }?>

