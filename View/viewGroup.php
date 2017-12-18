<?php

include_once('viewPopUp.php');

?>
<!-- search bar and button above table -->
<form method="post" action="index.php">
    <div class="input-group">
        <input type="text" name="filter" class="form-control affiner-recherche" placeholder="Affinez votre recherche en tapant le nom du groupe ou de l'utilisateur recherché">
        <span class="input-group-btn">
            <button class="btn btn-form" type="submit">Valider</button>
            <a href="index.php">
                <button class="btn btn-form" type="button">Annuler la recherche</button>
            </a>
            <button data-toggle="modal" href="#addUser" class="btn btn-form" type="button">Créer un nouvel utilisateur</button>
        </span>
    </div>
</form>

<!-- modal create new user -->
<div class="modal fade" id="addUser">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">x</button>
                <h2 class="modal-title">Ajouter un utilisateur</h2>
            </div>
            <div class="modal-body">
                <form action="index.php" method="post">
                    <div class="form-group">
                        <label for="nom" class="Pleft">Saisissez votre nom</label> 
                        <input type="text" id="nom" class="form-control" name="nom" placeholder="Votre nom" required>
                    </div>
                    <div class="form-group">
                        <label for="prenom" class="Pleft">Saisissez votre prénom</label> 
                        <input type="text" id="prenom" class="form-control" name="prenom" placeholder="Votre prénom" required>
                    </div>
                    <div class="form-group">
                        <label for="email" class="Pleft">Saisissez votre email</label> 
                        <input type="text" id="email" class="form-control" name="email" placeholder="Votre email" required>
                        <p id="bad-email">
                            Votre adresse mail doit être sous un format valide. ex:laurent@gmail.com
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="birth_date" class="Pleft">Saisissez votre date de naissance</label> 
                        <input type="text" class="form-control" name="birth_date" id="birth-date" placeholder="jj/mm/aaaa" required>
                        <p id="bad-date">
                            Merci de saisir votre date de naissance sous le format jj/mm/aaaa
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="group" class="Pleft">Sélectionnez votre groupe</label> 
                        <select id="group" class="form-control" name="group">
                            <option>Groupe un</option>
                            <option>Groupe deux</option>
                            <option>Groupe trois</option>
                        </select>
                    </div>
                    <input type="submit" class="btn button-orange" value="Valider">
                </form>
            </div>
        </div>
    </div>
</div>

<table id="table">
    <tr>
        <th>Sélectionner utilisateurs</th>
        <th>Groupe</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Email</th>
        <th>Plus d'infos</th>
        <th>Supprimer utilisateur</th>
    </tr>
    <?php

    // each checkboxes id is: 'id' + $i
    $i = 0;
    foreach($groupsNUsers AS $group)
    {
        
        $birth = new DateTime($group['birth_date']); // Birthday user to datetime format
        $today = new DateTime(date('Y-m-d'));        // Today datetime format
        $age = $birth->diff($today);                 // Age user = today-birth
        ?>
        
        <tr> 
            <td><input type="checkbox" value="<?=$group['nom']?>,<?=$group['email']?>" id="id<?=$i?>">
            <td><?= $group['groupe'] ?></td>
            <td><?= $group['nom'] ?></td>
            <td><?= $group['prenom'] ?></td>
            <td><?= $group['email'] ?></td>
            <td>
                <button data-toggle="modal" href="#<?=$group['nom']?>" class="btn btn-details">détails</button>
                <div class="modal fade" id="<?=$group['nom']?>">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <?= $group['nom'] ?> a <?= $age->format('%Y'); ?>ans
                            </div>
                        </div>
                    </div>
                </div>
            </td>
            <td>
                <button data-toggle="modal" href="#sup<?=$group['nom']?>" class="btn">Supprimer</button>
                <div class="modal fade" id="sup<?=$group['nom']?>">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <form action="index.php?delete=<?= $group['email']?>" method="post">
                                    <p>Supprimer <?=$group['nom']?> ?</p>
                                    <input type="submit" class="btn button-orange" value="Valider">
                                    <button class="btn" data-dismiss="modal">Annuler</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        <?php
        $i++;
    }
    ?>
</table>

<!-- user delete button --> 
<button data-toggle="modal" id="buttonDelSelectedUser" href="#delDiversUser" class="btn">Supprimer les utilisateurs sélectionnés</button>
<div class="modal fade" id="delDiversUser">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form action="index.php" method="post">
                    <p>
                        Supprimer le(s) utilisateur(s): 
                        <ul id="userToDel"></ul>
                    </p>
                    <div id="formUserToDel"></div>
                    <input type="submit" class="btn button-orange" value="Supprimer">
                    <button id="annulerUserToDel" class="btn" data-dismiss="modal">Annuler</button>
                </form>
            </div>
        </div>
    </div>
</div>




  
