<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><p><img alt="" src="<?php echo img_path('1.jpg');?>" /></p>

<p style="font-size: 12px; ">Building this website presented some interesting choices. &nbsp;How much time should we spend on it (and therefore not on our clients projects), should it show case <strong>really fancy coding</strong>, should it be all bells and whistles? &nbsp;Or should it be a simple business-card type affair? Well, I guess the bottom line is that it needed to give the visitor (you!) a feel for what we do and what we are like, a way to contact us and a few examples of some projects we have done. &nbsp;Beyond that we felt it should clean and simple, contemporary and&nbsp;<em>responsive</em>.</p>

<p style="font-size: 12px; ">It also presented an opportunity.&nbsp; I had used twitter&#8217;s bootstrap (a front-end framework) for a website before, but hadn&#8217;t delved to deeply into what it can do. Now bootstrap isn&#8217;t suitable for every website, but I thought it would fun to use it for this one, and see how it went. (Answers on a postcard please!)</p>

<p style="font-size: 12px; ">Oh, and I also wanted to have a blog - I have learnt so much through the Open Source and online community that I thought I would shove my two-pennies-worth out there too! It would be great if it helped someone somewhere.</p>

<p style="font-size: 12px; ">Look out for several posts over the coming weeks/months sharing&nbsp;some of the code and techniques I used during the process. &nbsp;I hope you like the site and come back to read some of my blog posts :)</p><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>