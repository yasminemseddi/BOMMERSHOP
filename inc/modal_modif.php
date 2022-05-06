<!-- Modal Confirm Delete -->
<div class="modal fade" id="modal-modifier-<?= $Livraison["idC"]."-".$Livraison["idL"] ?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-trash"></i> Modifier Livreur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <select class="form-select" onchange="window.location.href='ModifierLivraison.php?idL='+this.value+'&idC='+<?= $Livraison['idC'] ?>">
                       <?php foreach ($Livreurs as $livreur) : ?>
                        <?php if($livreur["id"]==$Livraison["idL"]):?>
                        <option selected value=<?=$livreur["id"] ?>> <?=$livreur["Nom"]." " . $livreur["Prenom"] ?> </option>
                        <?php else : ?>
                            <option  value=<?=$livreur["id"] ?>> <?=$livreur["Nom"]." " . $livreur["Prenom"] ?> </option>

                        <?php endif ?>
                        <?php endforeach ?>

                   </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->