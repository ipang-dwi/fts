<?php
session_start();
if($_GET['id']==1) $_SESSION['theme']="cerulean";
elseif($_GET['id']==2) $_SESSION['theme']="cosmo";
elseif($_GET['id']==3) $_SESSION['theme']="cyborg";
elseif($_GET['id']==4) $_SESSION['theme']="darkly";
elseif($_GET['id']==5) $_SESSION['theme']="flatly";
elseif($_GET['id']==6) $_SESSION['theme']="journal";
elseif($_GET['id']==7) $_SESSION['theme']="litera";
elseif($_GET['id']==8) $_SESSION['theme']="lumen";
elseif($_GET['id']==9) $_SESSION['theme']="lux";
elseif($_GET['id']==10) $_SESSION['theme']="materia";
elseif($_GET['id']==11) $_SESSION['theme']="minty";
elseif($_GET['id']==12) $_SESSION['theme']="pulse";
elseif($_GET['id']==13) $_SESSION['theme']="sandstone";
elseif($_GET['id']==14) $_SESSION['theme']="simplex";
elseif($_GET['id']==15) $_SESSION['theme']="sketchy";
elseif($_GET['id']==16) $_SESSION['theme']="slate";
elseif($_GET['id']==17) $_SESSION['theme']="solar";
elseif($_GET['id']==18) $_SESSION['theme']="spacelab";
elseif($_GET['id']==19) $_SESSION['theme']="superhero";
elseif($_GET['id']==20) $_SESSION['theme']="united";
elseif($_GET['id']==21) $_SESSION['theme']="yeti";
header("Location: ".$_SESSION["posisi"]."");
?>