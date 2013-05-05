<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><p>With faster JavaScript engines in modern browsers a sprinkling of JS magic can really enhance the usability and feel of a website. We shouldn't go overboard though, that would be too French, too slapstick, and sometimes even hinder user experience. Today I want to share with you a simple and succinct droplet of code and design which I enjoyed implementing on this website - the Scroll To Top fixed button. We are talking about the little green bordered circle have way down the right side of the page - scroll down and you will see it appear. Unobtrusive, functional but also fun to play with. As ever there are three parts to it - the HTML, the CSS and the JavaScript (in this case using the Jquery library).</p>

<p><strong>The HTML</strong></p>

<pre><code><a href="#" id="scroll_to_top"><span>top</span></a>
</code></pre>
<p></p>
<p><em>Explanation </em></p>

<p>This can go anywhere in the <code class="inline">body</code> of your page, but I think it is best to have it right at the top and out of the way. We will position, show and hide it with CSS and JavaScript in a moment.</p>

<p><strong>The CSS </strong></p>

<p>Always best to have this in a seperate .css file if possible.</p>

<p><code> #scroll_to_top{ 

z-index:33; 
border: 1px solid #77C62E;

-webkit-border-radius: 100px 100px 100px 100px;

-moz-border-radius: 100px 100px 100px 100px;

-ms-border-radius: 100px 100px 100px 100px; 

-o-border-radius: 100px 100px 100px 100px;

border-radius: 100px 100px 100px 100px; 
display:none;
height: 36px;
width: 36px; 
top: 50%; 
right: 2%; 
opacity: 0.8; 
position:fixed; 

background-color:#F1F1F1;
} </code></p>

<p><code>#scroll_top span{ 
position:relative; 
top: 7px; 
left: 6px;

}</code></p>

<p><code>a:focus{ 
outline:none!important; 
text-decoration:none!important;
}</code></p><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>