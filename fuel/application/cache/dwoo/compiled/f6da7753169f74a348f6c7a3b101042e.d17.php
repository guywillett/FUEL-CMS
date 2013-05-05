<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><p>Proudly anouncing the launch of the new Chamsoft website : da-da!</p>

<p>I really enjoyed building this website and so thought I would share some insights about it&#8230;</p><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>