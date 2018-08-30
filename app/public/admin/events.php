<?php
require_once "core.php";
use PauSabe\CBCN\service as s;

$events = s\EventService::getAll();
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require CBCN_PRIVATE_ROOT."/templates/header.php";?>
        <script src="js/events.js"></script>
    </head>
    <body>
        <?php require CBCN_PRIVATE_ROOT."/templates/top.php";?>
        <div class="content">
            <h2>Llistat d'events</h2>
            <div class="action-bar">
                <a href="event-edit.php" class="btn btn-success">Afegir</a>
            </div>
            <table id="events-table" class="table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Lloc</th>
                        <th>Data</th>
                        <th>Data final</th>
                        <th>
                        </th>
                    </tr>
                </thead>
                </tbody>
                    <?php foreach($events as $event):?>
                        <tr data-id="<?=$event->getId()?>">
                            <td><?=$event->getName()?></td>
                            <td><?=$event->getPlace()->getAddress()?></td>
                            <td><?=$event->getDate()?></td>
                            <td><?=$event->getDateEnd()?></td>
                            <td>
                                <a href="event-edit.php?id=<?=$event->getId()?>" class="btn btn-warning">Editar</a>
                                <button class="btn btn-danger btn-del">Eliminar</button>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </body>
</html>


