<?php
function alert($class, $msg)
{
  echo '<div class="' . htmlspecialchars($class, ENT_QUOTES, 'UTF-8') . '">
			  <span class="closebtn">&times;</span>
        <i class="fa fa-exclamation-circle" aria-hidden="true"></i>     '
    . htmlspecialchars($msg, ENT_QUOTES, 'UTF-8') .
    '</div>';
}

function alert1($class, $msg)
{
  echo '<div id="alert1" class="' . htmlspecialchars($class, ENT_QUOTES, 'UTF-8') . '">
			  <span class="display-6 bx bxs-bell"></span>
        <i class="fa fa-exclamation-circle" aria-hidden="true"></i>     '
    . htmlspecialchars($msg, ENT_QUOTES, 'UTF-8') .
    '</div>';
}