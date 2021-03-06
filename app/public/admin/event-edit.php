<?php
require_once "core.php";
require_once "helpers/html.php";
require_once "helpers/utils.php";
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
        <script src="js/plugins/imagepreview.js"></script>
        <script src="js/utils.js"></script>
        <script src="js/event-edit.js"></script>
    </head>
    <body>
        <?php require CBCN_PRIVATE_ROOT."/templates/top.php";?>
        <div class="content">
            <h2>Edició event <?=($name = $event->getName()) ? "- ".html($name) : ""?></h2>
            <p class="text-muted">Els camps marcats amb un asterisc (*) són obligatoris</p>
            <form name="event-form" class="col-lg-6" action="events-helper.php?action=save" method="POST" data-toggle="form-ajax">
                <input type="hidden" name="id" value="<?=$event->getId()?>" />
                <div class="form-group">
                    <label data-required>Nom</label>
                    <input required type="text" name="name" class="form-control" value="<?=attr($event->getName()) ?: ""?>"/>
                </div>
                <div class="form-group">
                    <label data-required>Subtítol</label>
                    <input required type="text" name="subtitle" class="form-control" value="<?=attr($event->getSubtitle()) ?: ""?>"/>
                </div>
                <div class="form-group">
                    <label data-required>Descripció</label>
                    <textarea required name="description" class="form-control"><?=html($event->getDescription()) ?: ""?></textarea>
                </div>
                <div class="form-group">
                    <label>Destacat</label>
                    <input type="checkbox" name="highlighted" <?=$event->isHighlighted() ? "checked" : ""?>/>
                </div>
                <div class="form-group">
                    <label data-required>Data</label>
                    <input required type="text" name="date" placeholder="aaaa-mm-dd mm:ss" class="form-control" data-toggle="datetimepicker" value="<?=attr(format_str_date($event->getDate())) ?: ""?>" />
                </div>
                <div class="form-group">
                    <label>Data fi</label>
                    <input type="text" name="date_end" placeholder="aaaa-mm-dd mm:ss" class="form-control" data-toggle="datetimepicker" value="<?=attr(format_str_date($event->getDateEnd())) ?: ""?>" />
                </div>
                <div class="form-row">
                    <input type="hidden" name="place_id" value="<?=attr($place->getId())?>" />
                    <input type="hidden" name="place[id]" value="<?=attr($place->getId())?>" />
                    <div class="col">
                        <label data-required>Adreça curta</label>
                        <input required type="text" name="place[short_address]" class="form-control" value="<?=attr($place->getShortAddress())?>"/>
                    </div>
                    <div class="col">
                        <label data-required>Adreça completa</label>
                        <input required type="text" name="place[address]" class="form-control" value="<?=attr($place->getAddress())?>"/>
                    </div>
                </div>
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
                    <label data-required>Preu</label>
                    <input required type="number" step="0.01" min="0" name="price" class="form-control" value="<?=attr($event->getPrice()) ?: "0"?>"/>
                </div>
                <div class="form-group">
                    <label>URL</label>
                    <input type="text" name="url" title="L'URL ha de començar amb 'http://' o 'https://'"
                        pattern="^https?://.+" placeholder="http://..." class="form-control" value="<?=attr($event->getUrl()) ?: ""?>"/>
                </div>
                <div class="form-group">
                    <label data-required>Edat recomanada</label>
                    <input required type="number" min="0" name="rec_age" class="form-control" value="<?=attr($event->getRecommendedAge()) ?: ""?>"/>
                </div>
                <div class="form-group">
                    <label data-required>Imatge</label>
                    <input <?=$id ? "" : "required"?> type="file" accept="image/*" name="image" data-toggle="imagepreview" data-target="#preview-event" />
                    <input type="hidden" name="image_full" value="<?=$event->getImageFull()?>" />
                    <input type="hidden" name="image_low" value="<?=$event->getImageLow()?>" />
                </div>
                <div class="form-group">
                    <img id="preview-event" class="full-width" src="<?=attr(($image = $event->getImageFull()) ? u\ImageFile::getImageUrl($image) : "") ?: ""?>"/>
                </div>
                <div class="form-group">
                    <label data-required>Grup</label>
                    <select required name="group_id" class="form-control">
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
                <div class="border p-2">
                    <p class="text-muted">
                        La següent informació es opcional, y s'utilitzará l'informació de contacte del grup en cas de que no hi poseu dades.
                    </p>
                    <div class="form-group">
                        <label>Organitzador</label>
                        <input type="text" name="organizer" class="form-control" value="<?=attr($event->getOrganizer()) ?: ""?>"/>
                    </div>
                    <div class="form-group">
                        <label>Correu de contacte</label>
                        <input type="text" name="contact_email"
                            title="El correu electrònic ha de contenir només un @ que separi el nom del correu i el su proveïdor"
                            pattern="[^@]+@[^@]+" placeholder="exemple@email.com" class="form-control" value="<?=attr($event->getContactEmail()) ?: ""?>"/>
                    </div>
                    <div class="form-group">
                        <label>Telèfon de contacte</label>
                        <input type="text" title="En format numèric, amb prefix internacional opcional"
                            pattern="\+?[\d ]+" placeholder="(+)123 456 789" name="contact_phone" class="form-control" value="<?=attr($event->getContactPhone()) ?: ""?>"/>
                    </div>
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
