// // Menngunakan AJAX
// function clickSearch(str) 
// {
//     var xhttp;    
//     if (str == "") 
//     {
//         document.getElementById("content").innerHTML = "";
//         return;
//     }
//     xhttp = new XMLHttpRequest();
//     xhttp.onreadystatechange = function() {
//         if (this.readyState == 4 && this.status == 200) {
//         document.getElementById("content").innerHTML = this.responseText;
//         }
//     };
//     xhttp.open("GET", "/clickSearch?q="+ str, true);
//     xhttp.send();
// };

// Menggunakan jQuery
$(document).ready(
    function clickSearch(str)
    {
        if(str == "")
        {
            $("#content").innerHTML = "";
            return;
        }
        $('#customer').on('click', function()
        {
            $('#content').load("/clickSearch?q=" + $('#customer').val());
        })
    }
);
