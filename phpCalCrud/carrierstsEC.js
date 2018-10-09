function setUpdateAction() {
document.frmUser.action = "ECeditMultiUpdate.php";
document.frmUser.submit();
}
function setInsertAction() {
document.frmUser.action = "ECcarriertslotform.php";
document.frmUser.submit();
}
function setDeleteAction() {
if(confirm("Are you sure want to delete these rows?")) {
document.frmUser.action = "delete_user.php";
document.frmUser.submit();
}
}