/* print */
function printPage (){ 
    var ButtonControl = document.getElementById("btnPrint");                        
    ButtonControl.style.visibility = "hidden";
    window.print();
    ButtonControl.style.visibility = 'visibility';
    }