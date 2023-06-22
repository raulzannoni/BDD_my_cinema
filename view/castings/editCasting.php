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

?>

<div id="Edit Casting Film <?=$filmDetail['title_film']?>">
    <h2>Cinema_BDD</h2>
    <p>Edit Casting Film "<?=$filmDetail['title_film']?>"</p>
</div>

<div class="p-2">
    <form class="row w-50 g-3 p-6 m-3 border" action="index.php?action=editCasting&id=<?= $filmDetail['id_film'] ?>" method="post" enctype="multipart/form-data" autocomplete="off">
        <label class="form-label">Casting Film "<?= $filmDetail['title_film']?>":
            <div class="d-flex flex-column">
                <div class="d-flex flex-row">
                    <div class= 'p-5'></div>
                    <div class= 'p-5'>Actors : </div>
                    <div class= 'p-5'>Roles : </div>
                </div>                
            <?php
                foreach($castingList as $key => $cast)
                    {?>
                        <div class="d-flex flex-row">
                            <div class= 'p-3'><?= $key + 1?></div>
                            <div class= 'p-3'>
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
                                </select>
                            </div>
                            <div class= 'p-3'>
                                <input type="text" class="form-control" name="role<?=$key?>" id="role<?=$key?>" value="<?= $cast['role']?>">
                            </div>
                        </div>
            <?php   } ?>
            </div>
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