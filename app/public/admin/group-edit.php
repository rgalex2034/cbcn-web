<?php
require_once "core.php";
require_once "helpers/html.php";
use PauSabe\CBCN\model\classes as c;
use PauSabe\CBCN\service as s;
use PauSabe\CBCN\utils as u;

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
        <script src="js/plugins/modal.js"></script>
        <script src="js/plugins/imagepreview.js"></script>
        <script src="js/utils.js"></script>
        <script src="js/group-edit.js"></script>
    </head>
    <body>
        <?php require CBCN_PRIVATE_ROOT."/templates/top.php";?>
        <div class="content">
            <h2>Edició grup <?=($name = $group->getName()) ? "- ".html($name) : ""?></h2>
            <p class="text-muted">Els camps marcats amb un asterisc (*) són obligatoris</p>
            <form name="group-form" class="col-lg-6" action="groups-helper.php?action=save" method="POST" data-toggle="form-ajax">
                <input type="hidden" name="id" value="<?=$group->getId()?>" />
                <div class="form-group">
                    <label data-required>Nom</label>
                    <input required type="text" name="name" class="form-control" value="<?=attr($group->getName()) ?: ""?>"/>
                </div>
                <div class="form-group">
                    <label data-required>Descripció</label>
                    <textarea required type="text" name="description" class="form-control"><?=html($group->getDescription()) ?: ""?></textarea>
                </div>
                <!--div class="form-row">
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
                </div-->
                <div class="form-row">
                    <div class="col">
                        <label data-required>Latitud</label>
                        <input required type="number" name="place[latitude]" class="form-control" value="<?=attr($place->getLatitude())?>"/>
                    </div>
                    <div class="col">
                        <label data-required>Longitud</label>
                        <input required type="number" name="place[longitude]" class="form-control" value="<?=attr($place->getLongitude())?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label data-required>URL informativa</label>
                    <input required type="text" name="url_info" title="L'URL ha de començar amb 'http://' o 'https://'"
                        pattern="^https?://.+" placeholder="http://..." class="form-control" value="<?=attr($group->getUrlInfo()) ?: ""?>"/>
                </div>
                <div class="form-group">
                    <label data-required>Imatge</label>
                    <input <?=$id ? "" : "required"?> type="file" accept="image/*" name="image" data-toggle="imagepreview" data-target="#preview-event" />
                    <input type="hidden" name="url_image" value="<?=$group->getUrlImage()?>" />
                </div>
                <div class="form-group">
                    <img id="preview-event" style="width: 350px;" src="<?=attr(($image = $group->getUrlImage()) ? u\ImageFile::getImageUrl($image) : "") ?: ""?>"/>
                </div>
                <!--div class="form-group">
                    <label>Responsable</label>
                    <input type="text" name="responsible" class="form-control" value="<?=attr($group->getResponsible()) ?: ""?>"/>
                </div-->
                <div class="form-group">
                    <label data-required>Correu de contacte</label>
                    <input required type="text" name="contact_email" title="El correu electrònic ha de contenir només un @ que separi el nom del correu i el su proveïdor"
                        pattern="[^@]+@[^@]+" placeholder="exemple@email.com" class="form-control" value="<?=attr($group->getContactEmail()) ?: ""?>"/>
                </div>
                <!--div class="form-group">
                    <label>Telèfon de contacte</label>
                    <input type="text" name="contact_phone" title="En format numèric, amb prefix internacional opcional"
                        pattern="\+?[\d ]+" placeholder="(+)123 456 789" class="form-control" value="<?=attr($group->getContactPhone()) ?: ""?>"/>
                </div-->
                <!--div class="form-group">
                    <label>Districte</label>
                    <input type="text" name="district" class="form-control" value="<?=attr($group->getDistrict()) ?: ""?>"/>
                </div-->
                <div class="action-bar">
                    <button type="submit" class="btn btn-success">Guardar</button>
                    <a href="groups.php" class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        </div>
        <?php require CBCN_PRIVATE_ROOT."/templates/modal.php";?>
        <script>
        </script>
    </body>
</html>
