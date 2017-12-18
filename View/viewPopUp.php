
<div class="popUp">
    <?php 
    if (isset($_GET['filter']))
    {
        if ($_GET['filter'] === 'empty')
        {
            ?>
            <p id="popUp" class="border-orange">
                Votre recherche n'a donné aucun résultat
            </p>
            <?php
        }
        
    }
    elseif(isset($_GET['user']))
    {
        
        if($_GET['user'] === 'add')
        {
            ?>
            <p id="popUp" class="border-green">
                L'utilisateur a bien été ajouté
            </p>
            <?php             
        }
        elseif($_GET['user'] === 'deleted')
        {
            ?>
            <p id="popUp" class="border-red">
                L'utilisateur a bien été supprimé
            </p>
            <?php
        }
    }
    elseif(isset($_GET['users']))
    {
        if($_GET['users'] === 'deleted')
        {
            ?>
            <p id="popUp" class="border-red">
                Les utilisateurs ont bien été supprimés
            </p>
            <?php   
        }
    }
    ?>
</div>
