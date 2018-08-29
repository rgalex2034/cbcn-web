<?php
require_once "core.php";
use PauSabe\CBCN\service as s;

$groups = s\GroupService::getAll();
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require CBCN_PRIVATE_ROOT."/templates/header.php";?>
        <script src="js/groups.js"></script>
    </head>
    <body>
        <?php require CBCN_PRIVATE_ROOT."/templates/top.php";?>
        <div class="content">
            <h2>Llistat de grups</h2>
            <div class="action-bar">
                <a href="group-edit.php" class="btn btn-success">Afegir</a>
            </div>
            <table id="groups-table" class="table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Responsble</th>
                        <th>Contacte</th>
                        <th>
                        </th>
                    </tr>
                </thead>
                </tbody>
                    <?php foreach($groups as $group):?>
                        <tr data-id="<?=$group->getId()?>">
                            <td><?=$group->getName()?></td>
                            <td><?=$group->getResponsible()?></td>
                            <td><?=$group->getContactEmail()?><br /><?=$group->getContactPhone()?></td>
                            <td>
                                <a href="group-edit.php?id=<?=$group->getId()?>" class="btn btn-warning">Editar</a>
                                <button class="btn btn-danger btn-del">Eliminar</button>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </body>
</html>

