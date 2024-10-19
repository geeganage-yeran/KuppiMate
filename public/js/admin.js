//passing id sto the confirmation modals

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

var deleteNoticeModal= document.getElementById('deleteNotice');
deleteNoticeModal.addEventListener('show.bs.modal', function (event){
    var button = event.relatedTarget;
    var deleteNoticeId = button.getAttribute('data-session-id');
    var noticeDeleteSet = document.getElementById('noticeDeleteSet');
    noticeDeleteSet.value = deleteNoticeId;
})


var deleteUserModal= document.getElementById('deleteUser');
deleteUserModal.addEventListener('show.bs.modal', function (event){
    var button = event.relatedTarget;
    var deleteUserId = button.getAttribute('data-session-id');
    var deleteUserIdSet = document.getElementById('deleteUserIdSet');
    deleteUserIdSet.value = deleteUserId;
})

var deleteExternalUserModal= document.getElementById('deleteExternalUser');
deleteExternalUserModal.addEventListener('show.bs.modal', function (event){
    var button = event.relatedTarget;
    var deleteExUserId = button.getAttribute('data-session-id');
    var deleteExUserIdSet = document.getElementById('deleteExUserIdSet');
    deleteExUserIdSet.value = deleteExUserId;
})

var deleteCatModal= document.getElementById('deleteCat');
deleteCatModal.addEventListener('show.bs.modal', function (event){
    var button = event.relatedTarget;
    var deleteCatId = button.getAttribute('data-session-id');
    var deleteCatIdSet = document.getElementById('deleteCatIdSet');
    deleteCatIdSet.value = deleteCatId;
})

var confirmUserModal= document.getElementById('activateUser');
confirmUserModal.addEventListener('show.bs.modal', function (event){
    var button = event.relatedTarget;
    var activateUserId = button.getAttribute('data-session-id');
    var activateUserIdSet = document.getElementById('activateUserIdSet');
    activateUserIdSet.value = activateUserId;
})

//message timeout settings

setTimeout(function () {
    var alertElement = document.getElementById('alertMessage');
    console.log(alertElement);
    if (alertElement) {
        alertElement.classList.remove('show');
        setTimeout(function () {
            alertElement.remove();
        }, 300);
    }
}, 5000);

//category name validation

function catNameValidation(){
    var categoryName=document.getElementById('catName').value.trim();

    if (!categoryName.match(/^[a-zA-Z .-]+$/)) {
        alert('You cannot use numbers and special characters except . and -');
        return false;
    }
    return true;
}
