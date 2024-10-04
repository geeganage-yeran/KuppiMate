//passing session id to the confirmation modal when approve the external sessions



var externalSessionRejectConfirmModal= document.getElementById('externalSessionRejectConfirm');
externalSessionRejectConfirmModal.addEventListener('show.bs.modal', function (event){
    var button = event.relatedTarget;
    var RejectsessionId = button.getAttribute('data-session-id');
    var reject_session_id_set = document.getElementById('reject_session_id_set');
    reject_session_id_set.value = RejectsessionId;
})

var deleteFeedbackConfirmModal= document.getElementById('deleteFeedback');
deleteFeedbackConfirmModal.addEventListener('show.bs.modal', function (event){
    var button = event.relatedTarget;
    var deleteFeedbackId = button.getAttribute('data-session-id');
    var deleteFeedback_set = document.getElementById('deleteFeedbackSet');
    deleteFeedback_set.value = deleteFeedbackId;
})

var deleteExternalSessionModal= document.getElementById('externalSessionDeleteConfirm');
deleteExternalSessionModal.addEventListener('show.bs.modal', function (event){
    var button = event.relatedTarget;
    var deleteSessionId = button.getAttribute('data-session-id');
    var delete_session_id_admin_set = document.getElementById('delete_session_id_admin_set');
    delete_session_id_admin_set.value = deleteSessionId;
})

var deleteKuppiModal= document.getElementById('deleteKuppi');
deleteKuppiModal.addEventListener('show.bs.modal', function (event){
    var button = event.relatedTarget;
    var deleteKuppiId = button.getAttribute('data-session-id');
    var deleteKuppiSessionIdSet = document.getElementById('deleteKuppiSessionIdSet');
    deleteKuppiSessionIdSet.value = deleteKuppiId;
})


//message timeout settings

setTimeout(function () {
    var alertElement = document.getElementById('alertMessage');
    if (alertElement) {
        alertElement.classList.remove('show');
        setTimeout(function () {
            alertElement.remove();
        }, 300);
    }
}, 5000);
