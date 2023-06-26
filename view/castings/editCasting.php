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




var_dump($db_castingList->fetchAll());

function addCast($castingList, $id)
    {
        
        $_SESSION['message'] = "<p>check</p>";
        $newline =  [
                        "actor" => "required",
                        "role"  => "required"
                    ];

        $castingList[] = $newline;
                    
        header("Location:index.php?action=editCasting&id=".$id);
        
    }

if(isset($_POST['addCast']))
    {
        addCast($castingList, $id);
    }



?>

<div id="Edit Casting Film <?=$filmDetail['title_film']?>">
    <h2>Cinema_BDD</h2>
    <p>Edit Casting Film "<?=$filmDetail['title_film']?>"</p>
</div>

<div class="p-2">
    <form class="row w-50 g-3 p-6 m-3 border" action="index.php?action=editCasting&id=<?= $filmDetail['id_film'] ?>" method="post" enctype="multipart/form-data" autocomplete="off">
        <label class="form-label">Casting Film "<?= $filmDetail['title_film']?>":
            <div class="d-flex flex-column">
                <div class= 'p-5'>
                    <form action="editCasting.php">
                        <input type="submit" name="addCast" class="button" value="addCast" />
                    </form>   
                </div>
            </div>
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