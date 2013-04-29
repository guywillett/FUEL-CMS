<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><p>We are proud to anounce the launch of Chamsoft&#8217;s new website - we hopoe you like it!</p>

<p>This is a bit more content&#8230;</p><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>