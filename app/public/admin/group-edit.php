<?php
require_once "core.php";
require_once "helpers/html.php";
use PauSabe\CBCN\model\classes as c;
use PauSabe\CBCN\service as s;

$id = isset($_GET["id"]) ? $_GET["id"] : null;

$group = $id ? s\GroupService::get($id) : null;
if(!$group) $group = new c\Group(null);

$place = $group->getPlace() ?: new c\Place(null);
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require CBCN_PRIVATE_ROOT."/templates/header.php";?>
        <script src="js/plugins/form-ajax.js"></script>
    </head>
    <body>
        <?php require CBCN_PRIVATE_ROOT."/templates/top.php";?>
        <div class="content">
            <h2>Edició <?=($name = $group->getName()) ? "- ".html($name) : ""?></h2>
            <form class="col-lg-6" action="groups-helper.php?action=save" method="POST" data-toggle="form-ajax">
                <input type="hidden" name="id" value="<?=$group->getId()?>" />
                <div class="form-group">
                    <label>Nom</label>
                    <input required type="text" name="name" class="form-control" value="<?=attr($group->getName()) ?: ""?>"/>
                </div>
                <div class="form-group">
                    <label>Descripció</label>
                    <textarea type="text" name="description" class="form-control"><?=html($group->getDescription()) ?: ""?></textarea>
                </div>
                <div class="form-row">
                    <input type="hidden" name="place_id" value="<?=attr($place->getId())?>" />
                    <input type="hidden" name="place[id]" value="<?=attr($place->getId())?>" />
                    <div class="col">
                        <label>Adreça curta</label>
                        <input type="text" name="place[short_address]" class="form-control" value="<?=attr($place->getShortAddress())?>"/>
                    </div>
                    <div class="col">
                        <label>Adreça completa</label>
                        <input type="text" name="place[address]" class="form-control" value="<?=attr($place->getAddress())?>"/>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label>Latitud</label>
                        <input type="number" name="place[latitude]" class="form-control" value="<?=attr($place->getLatitude())?>"/>
                    </div>
                    <div class="col">
                        <label>Longitud</label>
                        <input type="number" name="place[longitude]" class="form-control" value="<?=attr($place->getLongitude())?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label>URL informativa</label>
                    <input type="text" name="url_info" class="form-control" value="<?=attr($group->getUrlInfo()) ?: ""?>"/>
                </div>
                <div class="form-group">
                    <label>URL de l'imatge</label>
                    <input type="text" name="url_image" class="form-control" value="<?=attr($group->getUrlImage()) ?: ""?>"/>
                </div>
                <div class="form-group">
                    <label>Responsable</label>
                    <input type="text" name="responsible" class="form-control" value="<?=attr($group->getResponsible()) ?: ""?>"/>
                </div>
                <div class="form-group">
                    <label>Correu de contacte</label>
                    <input type="text" name="contact_email" class="form-control" value="<?=attr($group->getContactEmail()) ?: ""?>"/>
                </div>
                <div class="form-group">
                    <label>Telèfon de contacte</label>
                    <input type="text" name="contact_phone" class="form-control" value="<?=attr($group->getContactPhone()) ?: ""?>"/>
                </div>
                <div class="form-group">
                    <label>Districte</label>
                    <input type="text" name="district" class="form-control" value="<?=attr($group->getDistrict()) ?: ""?>"/>
                </div>
                <div class="action-bar">
                    <button type="submit" class="btn btn-success">Guardar</button>
                    <a href="groups.php" class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        </div>
    </body>
</html>
