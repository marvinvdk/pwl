<?php
  $bg = array('bg/1.jpg', 'bg/2.jpg', 'bg/3.jpg', 'bg/4.jpg', 'bg/5.jpg'); // array of filenames

  $i = rand(0, count($bg)-1); // generate random number size of the array
  $selectedBg = "$bg[$i]"; // set variable equal to which random filename was chosen
?>

<style type="text/css">

    body{
    background: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), url(<?php echo $selectedBg; ?>) no-repeat;
    background-size:     cover;                      /* <------ */
    background-repeat:   no-repeat;
    background-position: center center;              /* optional, center the image */
    }

</style>