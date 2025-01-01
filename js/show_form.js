function showForm() {
    var floatingSelect = document.getElementById('floatingSelect');
    var guestForm = document.getElementById('guestForm');
    
    // Toggle form display
    if (guestForm.style.display === "none" || guestForm.style.display === "") {
        guestForm.style.display = "block";
    } else {
        guestForm.style.display = "none";
    }
}
