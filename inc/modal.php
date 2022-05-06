<!-- Modal Confirm Delete -->
<div class="modal fade" id="modal-delete-<?= $livreur['id'] ?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-trash"></i> Supprimer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Voulez vous supprimer le  livreur <strong><?= $livreur['Nom'] ?> <?= $livreur['Prenom'] ?></strong> ?</p>
            </div>
            <div class="modal-footer">
                <a href="SupprimerLivreur.php?id=<?= $livreur['id'] ?>" class="btn btn-success">Sauvgarder</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->