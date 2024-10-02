//passing session id to the confirmation modal when approve the external sessions

var externalSessionConfirmModal= document.getElementById('externalSessionConfirm');
externalSessionConfirmModal.addEventListener('show.bs.modal', function (event){
    var button = event.relatedTarget;
    var sessionId = button.getAttribute('data-session-id');
    var session_id_input = document.getElementById('session_id_set');
    session_id_input.value = sessionId;
})

var externalSessionRejectConfirmModal= document.getElementById('externalSessionRejectConfirm');
externalSessionRejectConfirmModal.addEventListener('show.bs.modal', function (event){
    var button = event.relatedTarget;
    var RejectsessionId = button.getAttribute('data-session-id');
    var reject_session_id_set = document.getElementById('reject_session_id_set');
    reject_session_id_set.value = RejectsessionId;
})
