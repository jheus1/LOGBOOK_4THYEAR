function showModal(message) {
    // Set the modal body text with the message
    document.querySelector('.modal-body').innerHTML = message;

    // Show the modal using Bootstrap's JavaScript API
    var myModal = new bootstrap.Modal(document.getElementById('duplicateModal'));
    myModal.show();
}

