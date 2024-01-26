// Menggunakan jQuery
$(document).ready(
    function getPrice(str)
    {
        if(str == "")
        {
            $("#price").innerHTML = "";
            return;
        }
        $('#room').on('click', function()
        {
            $('#price').load("/getPrice?q=" + $('#room').val());
        })
    }
);