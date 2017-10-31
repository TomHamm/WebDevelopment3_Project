<?php header("Content-type: text/css; charset: UTF-8"); 
    session_start(); ?>
/* 
    Created on : 05-Nov-2015, 13:56:00
    Author     : A00207736
*/


body {font-family:Sans-Serif;}

.page-header {
  padding-bottom: 9px;
  margin: 40px 0 20px;
  border-bottom: 1px solid #eee;
}

.hover-me:before {
    content: 'Welcome, <?php echo($_SESSION['username'])?>';
    display: inline-block;
    background: #0282c8;
    color: white;
    padding: 3px;
}
.hover-me:hover:before {
    content: 'Click here to logout.';
    background-color: #8e1717;
}
input:disabled {
    cursor: not-allowed;
}
#t1 {
    border-radius: 5px;
}
footer {
     margin: 2px auto 0 auto;
     text-align: center;
}
.tab-content {
    border-bottom-style: solid ;
    border-bottom-color: #000;
}
#stadiumDetails {
    margin: 0 auto;
}
#buttonTable {
    margin: 0 auto;
}
#buttonTable input {
    background-color: #7EC0EE;
    font: serif;
}
.modal-title {
    text-align: center;
}
#buttonTable input:hover {
    background-color: red;
    color: white;
}
#stadiumTable button:hover {
    background-color: red;
    color: white;
}
#overview, #tab3 {
    background-color: white;
}
#stadiumImage {
    display: block;
    margin-left: auto;
    margin-right: auto;
}

.form{width: 300px; margin: 0 auto;}

.tooltip {
    position: relative;
    display: inline-block;
}

.tooltip .tooltiptext {
    visibility: hidden;
    width: 120px;
    background-color: black;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    position: absolute;
    z-index: 1;
    top: -5px;
    left: 135%;
    margin-left: -60px;
}

.tooltip .tooltiptext::after {
    content: "";
    position: absolute;
    top: -5px;
    left: 105%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: black transparent transparent transparent;
}

.tooltip:hover .tooltiptext {
    visibility: visible;
}

input[type='text'], input[type='email'], input[type='password'] {width: 200px; border-radius: 2px;border: 1px solid #CCC; padding: 10px; color: #333; font-size: 14px; margin-top: 10px;}
input[type='submit']{padding: 10px 25px 8px; color: #fff; background-color: #0067ab; text-shadow: rgba(0,0,0,0.24) 0 1px 0; font-size: 16px; box-shadow: rgba(255,255,255,0.24) 0 2px 0 0 inset,#fff 0 1px 0 0; border: 1px solid #0164a5; border-radius: 2px; margin-top: 10px; cursor:pointer;}
input[type='submit']:hover {background-color: #024978;}
