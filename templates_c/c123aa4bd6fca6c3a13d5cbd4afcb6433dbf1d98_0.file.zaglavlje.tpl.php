<?php
/* Smarty version 3.1.39, created on 2021-05-28 19:30:57
  from 'C:\xampp\htdocs\projekt_rodendani\templates\zaglavlje.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60b128d175d4e6_16068230',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c123aa4bd6fca6c3a13d5cbd4afcb6433dbf1d98' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projekt_rodendani\\templates\\zaglavlje.tpl',
      1 => 1622223052,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60b128d175d4e6_16068230 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="hr">
    <head>
        <title><?php echo $_smarty_tpl->tpl_vars['naslov']->value;?>
</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="naslov" content="<?php echo $_smarty_tpl->tpl_vars['naslov']->value;?>
">
        <meta name="autor" content="Anđela Tunjić">
        <meta name="opis" content="<?php echo $_smarty_tpl->tpl_vars['naslov']->value;?>
">
        <meta name="ključneriječi" content="rođendani,slavlje,zabava">
        
        <link href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/css/atunjic.css" rel="stylesheet" type="text/css"/>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/javascript/atunjic.js"><?php echo '</script'; ?>
>
        
    </head>
    
    <body onload="kreirajDogadaje()">
        
        <header>
            <div id="navigacija">
                <ul>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/index.php">Početna</a></li>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/autor.html">Autor</a></li>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/dokumentacija.html">Dokumentacija</a></li>
                    <!--
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/obrasci/registracija.php">Registracija</a></li>
                    <?php if ($_smarty_tpl->tpl_vars['uloga']->value == 4) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/obrasci/prijava.php">Prijava</a></li>
                    <?php }?> 
                    <?php if ($_smarty_tpl->tpl_vars['uloga']->value <= 3) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/obrasci/prijava.php?odjava=1">Odjava</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/galerija.php">Galerija</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/autor.php">Autor</a></li>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['uloga']->value <= 2) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/index.php">Početna</a></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/obrasci/obrazac.php">Obrazac</a></li>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['uloga']->value == 1) {?>

                    <?php }?>
                    -->
                </ul>
            </div>
            
            <div id="ikoneHeader">
                <img id="meni" src="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/multimedija/meni.png" alt="rss" width="30" height="30"/>
                <div id=ikoneDizajn>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/multimedija/crnoBijelo.png" alt="rss" width="30" height="30"/>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['putanja']->value;?>
/multimedija/prilagodbe.png" alt="facebook" width="30" height="30"/>
                </div>
            </div>  
            
            <div id="naslov">
                <h1><?php echo $_smarty_tpl->tpl_vars['naslov']->value;?>
</h1>
            </div>

        </header>
         
        
        
<?php }
}
