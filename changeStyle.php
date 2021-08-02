<?php
$etages = 1;

?>
<!DOCTYPE html>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <title>Shelf</title>
        <style>
        .cabinet {
            position: absolute;
            width: 460px;
            height: 99px;
            background-color: #666666;
            top: 40px;
            left: 30%;
            border: 10px solid #7f7f7f;
            box-sizing: border-box;
        }

        .cabinet .shelf {
            position: relative;
            width: 100%;
            height: 99px;
            box-sizing: border-box;
        }
        .cabinet .cabinet-top {
            width: 104%;
            height: 0;
            border-bottom: 10px solid #572b23;
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            box-sizing: border-box;
            top: -20px;
            left: -2%;
            position: absolute;
        }

        .cabinet .shelf .back {
            position: absolute;
            top: 0;
            left: 2%;
            width: 96%;
            height: 100%;
            background: #ffffff;
            #box-shadow: inset 10px 15px 15px #21100d;
        }
        .cabinet .shelf .base {
            width: 100%;
            height: 0;
            border-bottom: 20px solid #404040;
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            box-sizing: border-box;
            bottom: 10px;
            position: absolute;
        }
        .cabinet .shelf .front {
            width: 100%;
            height: 10px;
            background-color: #666666;
            position: absolute;
            bottom: 0;
        }
        span {cursor:pointer; }
        .minus_1, .plus_1{
            width:20px;
            height:20px;
            background:#f2f2f2;
            border-radius:4px;
            padding:8px 5px 8px 5px;
            border:1px solid #ddd;
            display: inline-block;
            vertical-align: middle;
            text-align: center;
        }
        .number{
            margin:100px;
        }
        .minus, .plus{
            width:20px;
            height:20px;
            background:#f2f2f2;
            border-radius:4px;
            padding:8px 5px 8px 5px;
            border:1px solid #ddd;
            display: inline-block;
            vertical-align: middle;
            text-align: center;
        }
        input{
            height:34px;
            width: 100px;
            text-align: center;
            font-size: 26px;
            border:1px solid #ddd;
            border-radius:4px;
            display: inline-block;
            vertical-align: middle;

        </style>
    </head>
    <body>
    <div>

    <div class="number">
        <h2>Nombre d'étagères</h2>
        <span class="minus_1">-</span>
        <input id="inputValueRow_1" type="text" value="1" onkeyup="inputValueChange()"/>
        <span class="plus_1">+</span>
    </div>
    <div class="number">
        <h2>Nombre d'étages</h2>
        <span class="minus">-</span>
        <input id="inputValueRow" type="text" value="1" onkeyup="inputValueChange()"/>
        <span class="plus">+</span>
    </div>
    <div>
        <input type="checkbox" id="img_show" name="img_show">
        <label for="img_show">Images</label>
    </div>
    <div>
        <input type="checkbox" id="quantite_show" name="quantite_show">
        <label for="quantite_show">Quantité</label>
    </div>
    <div>
        <input type="checkbox" id="reference_show" name="reference_show">
        <label for="reference_show">Référence</label>
    </div>
    <script>
        $(document).ready(function () {
            $(".minus").click(function () {

                var $input = $(this).parent().find("input");
                var count = parseInt($input.val()) - 1;
                if(count>=1){
                    var elem = document.querySelector('#shelf');
                    elem.parentNode.removeChild(elem);
                    cabinet.style.height =parseInt($input.val()-1)*99+"px";
                }
                count = count < 1 ? 1 : count;
                $input.val(count);
                $input.change();

                return false;

            });
            $(".plus").click(function () {

                cabinet = document.getElementById("cabinet");
                var $input = $(this).parent().find("input");
                $input.val(parseInt($input.val()) + 1);
                if(parseInt($input.val()) < 255) {
                    $("#cabinet").append('<div class="shelf" id="shelf"><div class="upper-left-triangle"></div><div class="upper-right-triangle"></div><div class="back"></div><div class="base"></div><div class="front"></div></div>');
                    cabinet.style.height = parseInt($input.val()) * 99 + "px";
                    $input.change();
                    return false;
                } else {
                    $("#cabinet").append('<div class="shelf" id="shelf"><div class="upper-left-triangle"></div><div class="upper-right-triangle"></div><div class="back"></div><div class="base"></div><div class="front"></div></div>');
                    alert("the sky is the limit");
                    cabinet.style.height = parseInt($input.val()) * 99 + "px";
                    $input.change();
                    return false;
                }
            });
        });
        function inputValueChange(){
            var val = document.getElementById("inputValueRow").value;
            var val_decre = document.getElementById("inputValueRow").value;
            var x = document.getElementById("cabinet").childElementCount;
            var elem = document.querySelector('#shelf');
            var i = 0;
            var j = 0;
            if(x < val) {
                while (i < val) {
                    $("#cabinet").append('<div class="shelf" id="shelf"><div class="upper-left-triangle"></div><div class="upper-right-triangle"></div><div class="back"></div><div class="base"></div><div class="front"></div></div>');
                    i++;
                }
                var y = document.getElementById("cabinet").childElementCount;
                cabinet.style.height = (y) * 99 + "px";
            } else {
                while(val_decre < x) {
                    if (val_decre!==0) {
                        document.getElementById("shelf").remove();
                        val_decre++;
                    } else {
                        break;
                    }
                }
                    cabinet.style.height = val * 99 + "px";
            }
        }
    </script>
        <div class="cabinet" id="cabinet">
            <div class="shelf" id = "shelf">
                <div class="upper-left-triangle"></div>
                <div class="upper-right-triangle"></div>
                <div class="back"><div><img style="height: 70px; z-index: 9999" src="https://www.gaujard.fr/1450-thickbox_default/pecher-grosse-mignonne.jpg"></div></div>
                <div class="base"></div>
                <div class="front"></div>
            </div>
        </div>
    </body>
</html>