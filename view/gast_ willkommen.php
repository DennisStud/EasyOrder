<?php
require 'template/template.php';
?>

<head>
    <title>Startseite</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body
        {
            position: fixed;
            left: 0px; right: 0px;
            background:url("img/holz.jpg");
        }
        h1
        {
            text-align:center;
            color:lightyellow;

        }


        div#btn
        {
            position: fixed;
            width: 100%;
            bottom: 100px; left: 50px;

        }
        div#btnessen{text-align: center;}
        div#btntrinken{text-align: center;}
        div#btnrech{text-align: center;}
        div#btninfo{text-align: center;}



    </style>
</head>
<body>
    <br>
    Wir begrüßen sie ganz herzlich in unserem Gasthaus. Wir hoffen...bla bla bla
    <div id="btn">
        <table>
            <colgroup>
                <col width="450px">
                <col width="450px">
                <col width="450px">
                <col width="450px">
            </colgroup>
            <tbody>
                <tr>
                    <td>

                        <div id="btnessen">
                            <img src="img/spaghetti.png" width="150" hight="150">
                            <br>
                            <form action="index.php?action=meal" method="post" id="form_meal">
                                <button type="submit" value="submit">Essen bestellen</button></form>
                        </div>
                    </td>
                    <td>
                        <div id="btntrinken">
                            <img src="img/wein.png" width="150" hight="150">
                            <br>
                            <form action="index.php?action=drinks" method="post" id="form_drinks">
                                <button type="submit" value="submit">Getränke bestellen</button></form>
                        </div>
                    </td>
                    <td>
                        <div id="btnrech">
                            <img src="img/rechnung.jpg" width="150" hight="150">
                            <br>
                            <form action="index.php?action=invoice" method="post" id="form_inv">
                                <button type="submit" value="submit">Rechnung ansehen und bezahlen</button></form>
                        </div>
                    </td>
                    <td>
                        <div id="btninfo">

                            <img src="img/haus.png" width="150" hight="150">                              
                            <br>
                            <form action="index.php?action=about" method="post" id="form_about">
                                <button type="submit" value="submit">Über Uns</button></form>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
