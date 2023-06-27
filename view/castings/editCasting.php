<?php 

ob_start(); 

if(isset($_SESSION['message'])) 
    {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
$filmDetail = $db_filmDetail->fetch();
$castingList = $db_castingList->fetchAll();
$actorList = $db_actorList->fetchAll();
$roleList = $db_roleList->fetchAll();

$actorDummy =  [
                "id_actor"  => 10000000,
                10000000    => 10000000,
                "id_person" => 10000000,
                10000001    => 10000000,
                "actor"     => "required",
                10000002    => "required"
                ];

$actorList[] = $actorDummy;

var_dump($roleList[0]);

if(count($castingList) == 0)
    {
        $newline =  [
            "actor" => "required",
            0       => "required",
            "role"  => "required",
            1       => "required"
                    ];

        $castingList[] = $newline;
    }

//var_dump($castingList);


if(isset($_POST['addCast']))
    {
        
        $newline =  [
            "actor" => "required",
            0       => "required",
            "role"  => "required",
            1       => "required"
                    ];

        $castingList[] = $newline;

        var_dump($castingList);
        

        $_SESSION['message'] = '<p>check<p>';

        header("Location:index.php?action=editCasting&id=".$filmDetail["id_film"]);
    
        //unset($_POST['addCast']);
    }

//var_dump($_POST['addCast']);
?>

<div id="Edit Casting Film">
    <h2>Cinema_BDD</h2>
    <p>Edit Casting Film "<?=$filmDetail['title_film']?>"</p>
</div>

<div class="p-2">
    <form class="row w-50 g-3 p-6 m-3 border" action="index.php?action=editCasting&id=<?= $filmDetail['id_film'] ?>" method="post" enctype="multipart/form-data" autocomplete="off">
        <label class="form-label">Casting Film "<?= $filmDetail['title_film']?>":
                <table>
                    <tr>
                        <th>#</th>
                        <th>Actors : </th>
                        <th>Roles : </th>
                    </tr>
                <tbody>
                    <?php
                        foreach($castingList as $key => $cast)
                            { ?>
                                <tr>
                                    <th><?= $key + 1?></th>
                                    <th>
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
                                    </th>
                                    <th>
                                        <input type="text" class="form-control" name="role<?=$key?>" id="role<?=$key?>" value="<?= $cast['role']?>">
                                    </th>
                                    <th>
                                        <form action="editCasting.php">
                                            <input type='submit' name="deleteCast" class="button" value="delete">
                                        </form>
                                    </th>
                                </div>
                    <?php   } ?>
                </tbody>
            </table> 
        </label>
        <div class="col-12">
            <button type="submit" name="submit" class="btn btn-primary">Modifier</button>
        </div>
    </form>
</div>



<?php
$title = "Edit Casting Film ".$filmDetail['title_film'];
$content = ob_get_clean();
require "view/template.php";
?>