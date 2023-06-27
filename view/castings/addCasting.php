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




?>

<div id="Add Casting Film">
    <h2>Cinema_BDD</h2>
    <p>Add Casting Film "<?=$filmDetail['title_film']?>"</p>
</div>

<div class="p-2">
    <form class="row w-50 g-3 p-6 m-3 border" action="index.php?action=addCasting&id=<?= $filmDetail['id_film'] ?>" method="post" enctype="multipart/form-data" autocomplete="off">
        <label class="form-label">Casting Film "<?= $filmDetail['title_film']?>":
                <table>
                    <tr>
                        <th>Actors : </th>
                        <th>Roles : </th>
                    </tr>
                <tbody>
                    <tr>
                        <th>
                            <select name="actor" id="actor">
                                <?php 
                                foreach($actorList as $index => $actors)
                                    {
                                        if($actors['actor'] == "required")
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
                            <input type="text" class="form-control" name="role" id="role" value="required">
                        </th>
                    </tr>
                </tbody>
            </table> 
        </label>
        <div class="col-12">
            <button type="submit" name="submit" class="btn btn-primary">Ajouter</button>
        </div>
    </form>
</div>



<?php
$title = "Add Casting Film ".$filmDetail['title_film'];
$content = ob_get_clean();
require "view/template.php";
?>