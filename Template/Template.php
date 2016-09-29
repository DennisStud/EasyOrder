<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html lang="de">
    <head>
        <title>Speisekarte</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style> 
            h1{
               color: lightyellow;
               size: 30px;
               text-align: center;
            }
            
            
            header 
            {
              top: 0px; left:0px; right:0px;              
              padding: 0px;
              margin: 0px;
              position: fixed;
              background: url("img/holz.jpg");

            }
            div#start {float: left;  min-width:200px;}
            div#spei {float: left; min-width:200px;}
            div#getr {float: left; min-width:200px;}
            div#rech {float: left; min-width:200px;}
            div#info {float: left; min-width: 200px;}
            
            footer
            {
                bottom:0px; left:0px; right:0px;
                position: fixed;
                max-height: 40px;
                background: url("img/holz.jpg");
            }
        </style>
    </head>
    <body>
        <header>
           
            <h1 align="center"> <font face="segoe script,arial">Gasthaus der alten Eiche</font></h1> 
            <div id="start">
                <form action="index.php?action=start" method="post" id="form_1">
                    <button  float="left" type="submit" value="submit"><font size="5" > Startseite</font></button></form></div>
            <div id="spei">
                <form action="index.php?action=meal" method="post" id="form_2">
                    <button  float="left"type="submit" value="submit"><font size="5" >Speisekarte</font></button></form></div>
            <div id="getr">
                <form action="index.php?action=drinks" method="post" id="form_3">
                    <button type="submit" value="submit"><font size="5" >Getränke</font></button></form></div>
            <div id="rech">
                <form action="index.php?action=invoice" method="post" id="form_4">
                    <button type="submit" value="submit"><font size="5" >Rechnung</font></button></form></div>
            <div id="info">
                <form action="index.php?action=about" method="post" id="form_5">
                    <button type="submit" value="submit"><font size="5" >Über Uns</font></button></form></div>
        </header>
        <footer>
            <p><--zurück</p>
        </footer>
    </body>
</html>
