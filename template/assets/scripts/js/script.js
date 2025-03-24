$(document).ready(function () {
    $("#firstSelector").change(function () {
        var a = document.getElementById("firstSelector").value;
        $.ajax({
            url: 'assets/scripts/php/list.php',
            method: 'post',
            dataType: 'json',
            data: {myData: a},
            success: function (data) {
                console.log(data);
                console.log(data[0], data[1], data[2]);
                var b = document.getElementById("secondSelector");
                b.style.cssText = 'display: block;';
                b.innerHTML = '<option value="' + data[0] + '">' + data[0] + '</option>' +
                    '<option value="' + data[1] + '">' + data[1] + '</option>' +
                    '<option value="' + data[2] + '">' + data[2] + '</option>';
                var c = document.getElementById("removingAfter");
                c.parentElement.remove(c);
            },
            error: function (jqXHR, exception) {
                if (jqXHR.status === 0) {
                    alert('Not connect. Verify Network.');
                } else if (jqXHR.status == 404) {
                    alert('Requested page not found (404).');
                } else if (jqXHR.status == 500) {
                    alert('Internal Server Error (500).');
                } else if (exception === 'parsererror') {
                    alert('Requested JSON parse failed.');
                } else if (exception === 'timeout') {
                    alert('Time out error.');
                } else if (exception === 'abort') {
                    alert('Ajax request aborted.');
                } else {
                    alert('Uncaught Error. ' + jqXHR.responseText);
                }
            }
        });
    })
})