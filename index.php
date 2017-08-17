<!DOCTYPE html>
<html>
<head>
<title>Lodewijckduino</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/paper/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <div class="col-12 header" id="header">
        <h1>Lodewijck Led Control Panel</h1>
    </div>
    <div>
        <div class="col-sm-12 content" id="content">
            <form method="post" id="form" name="form">
                <table>
                    <tr>
                        <td>red:</td>
                        <td><input class="form-control" min="0" max="1020" type="number" name="rednumber" for="redslider" oninput="redslider.value=rednumber.value; changeBorderColor();" id="red"></td>
                        <td><input class="form-control" min="0" max="1020" type="range" name="redslider" for="rednumber" oninput="rednumber.value=redslider.value; changeBorderColor();"></td>
                    </tr>
                    <tr>
                        <td>green:</td>
                        <td><input class="form-control" min="0" max="1020" type="number" name="greennumber" for="greenslider" oninput="greenslider.value=greennumber.value; changeBorderColor();" id="green"></td>
                        <td><input class="form-control" min="0" max="1020" type="range" name="greenslider" for="greennumber" oninput="greennumber.value=greenslider.value; changeBorderColor();"></td>
                    <tr>
                        <td>blue:</td>
                        <td><input class="form-control" min="0" max="1020" type="number" name="bluenumber" for="blueslider" oninput="blueslider.value=bluenumber.value; changeBorderColor();" id="blue"></td>
                        <td><input class="form-control" min="0" max="1020" type="range" name="blueslider" for="bluenumber" oninput="bluenumber.value=blueslider.value; changeBorderColor();"></td>
                    </tr>
                </table>
                <button class="btn btn-default" type="button" onclick="changeColor();">change color</button>
            </form>
        </div>
        <div class="col-sm-12 content">
            <button class="btn btn-default" type="button" onclick="execScript('RandomColor.php');">random color</button>
            <button class="btn btn-default" type="button" onclick="execScript('Gradient.php');">gradient</button>
        </div>
    </div>
</div>

<script>
function changeBorderColor() {
    var red = document.getElementById("red").value;
    var green = document.getElementById("green").value;
    var blue = document.getElementById("blue").value;

    var redrgb = Math.floor(red / 4);
    var greenrgb = Math.floor(green / 4);
    var bluergb = Math.floor(blue / 4);

    var rgbstring = "rgb(" + redrgb + ", " + greenrgb + ", " + bluergb + ")"
    //window.alert(rgbstring);
    document.getElementById("content").style.borderColor = rgbstring;
}
function changeColor() {
    $("#form").ajaxForm({url: 'ChangeColor.php', type: 'post'})
}

function execScript(scriptname) {
    $.ajax({
        url: scriptname
    })
}

</script>

</body>
</html>
