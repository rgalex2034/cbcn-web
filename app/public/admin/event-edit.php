<?php
require_once "core.php";
require_once "helpers/html.php";
use PauSabe\CBCN\model\classes as c;
use PauSabe\CBCN\service as s;
use PauSabe\CBCN\utils as u;

$id = isset($_GET["id"]) ? $_GET["id"] : null;

$event = $id ? s\EventService::get($id) : null;
if(!$event) $event = new c\Event(null);

$place = $event->getPlace() ?: new c\Place(null);
$group = $event->getGroup() ?: new c\Group(null);

$all_groups = s\GroupService::getAll();
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require CBCN_PRIVATE_ROOT."/templates/header.php";?>
        <link rel="stylesheet" href="css/jquery.datetimepicker.min.css"></script>
        <script src="js/plugins/jquery.datetimepicker.full.min.js"></script>
        <script src="js/plugins/form-ajax.js"></script>
        <script src="js/plugins/modal.js"></script>
        <script src="js/utils.js"></script>
        <script src="js/event-edit.js"></script>
    </head>
    <body>
        <?php require CBCN_PRIVATE_ROOT."/templates/top.php";?>
        <div class="content">
            <h2>Edició event <?=($name = $event->getName()) ? "- ".html($name) : ""?></h2>
            <form name="event-form" class="col-lg-6" action="events-helper.php?action=save" method="POST" data-toggle="form-ajax">
                <input type="hidden" name="id" value="<?=$event->getId()?>" />
                <div class="form-group">
                    <label>Nom</label>
                    <input required type="text" name="name" class="form-control" value="<?=attr($event->getName()) ?: ""?>"/>
                </div>
                <div class="form-group">
                    <label>Subtítol</label>
                    <input type="text" name="subtitle" class="form-control" value="<?=attr($event->getSubtitle()) ?: ""?>"/>
                </div>
                <div class="form-group">
                    <label>Descripció</label>
                    <textarea name="description" class="form-control"><?=html($event->getDescription()) ?: ""?></textarea>
                </div>
                <div class="form-group">
                    <label>Destacat</label>
                    <input type="checkbox" name="highlighted" <?=$event->isHighlighted() ? "checked" : ""?>/>
                </div>
                <div class="form-group">
                    <label>Data</label>
                    <input required type="text" name="date" class="form-control" data-toggle="datetimepicker" data-format="Y-m-d H:i:s" value="<?=attr($event->getDate()) ?: ""?>" />
                </div>
                <div class="form-group">
                    <label>Data fi</label>
                    <input type="text" name="date_end" class="form-control" value="<?=attr($event->getDateEnd()) ?: ""?>" />
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
                    <label>Preu</label>
                    <input type="number" step="0.01" name="price" class="form-control" value="<?=attr($event->getPrice()) ?: ""?>"/>
                </div>
                <div class="form-group">
                    <label>URL</label>
                    <input type="text" name="url" class="form-control" value="<?=attr($event->getUrl()) ?: ""?>"/>
                </div>
                <div class="form-group">
                    <label>Edat recomanada</label>
                    <input type="number" name="rec_age" class="form-control" value="<?=attr($event->getRecommendedAge()) ?: ""?>"/>
                </div>
                <div class="form-group">
                    <label>Imatge</label>
                    <input <?=$id ? "" : "required"?> type="file" accept="image/*" name="image" />
                    <input type="hidden" name="image_full" value="<?=$event->getImageFull()?>" />
                    <input type="hidden" name="image_low" value="<?=$event->getImageLow()?>" />
                </div>
                <div class="form-group">
                    <img class="full-width" src="<?=attr(($image = $event->getImageFull()) ? u\ImageFile::getImageUrl($image) : "") ?: ""?>"/>
                </div>
                <div class="form-group">
                    <label>Grup</label>
                    <select name="group_id" class="form-control">
                        <option value="" <?=is_null($group->getId()) ? "selected" : "" ?>>Selecciona una opció...</option>
                        <?php foreach($all_groups as $option_gr):?>
                            <option value="<?=($gr_id = $option_gr->getId())?>"
                                <?=$gr_id == $group->getId() ? "selected" : ""?>
                            >
                                    <?=html($option_gr->getName())?>
                            </option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Organitzador</label>
                    <input type="text" name="organizer" class="form-control" value="<?=attr($event->getOrganizer()) ?: ""?>"/>
                </div>
                <div class="form-group">
                    <label>Correu de contacte</label>
                    <input type="text" name="contact_email" class="form-control" value="<?=attr($event->getContactEmail()) ?: ""?>"/>
                </div>
                <div class="form-group">
                    <label>Telèfon de contacte</label>
                    <input type="text" name="contact_phone" class="form-control" value="<?=attr($event->getContactPhone()) ?: ""?>"/>
                </div>
                <div class="action-bar">
                    <button type="submit" class="btn btn-success">Guardar</button>
                    <a href="events.php" class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        </div>
        <?php require CBCN_PRIVATE_ROOT."/templates/modal.php";?>
    </body>
</html>
