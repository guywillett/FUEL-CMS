<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><p>With faster JavaScript engines in modern browsers a sprinkling of JS magic can really enhance the usability and feel of a website. We shouldn't go overboard though, that would be too French, too slapstick, and sometimes even hinder user experience. Today I want to share with you a simple and succinct droplet of code and design which I enjoyed implementing on this website - the Scroll To Top fixed button. We are talking about the little green bordered circle have way down the right side of the page - scroll down and you will see it appear. Unobtrusive, functional but also fun to play with. As ever there are three parts to it - the HTML, the CSS and the JavaScript (in this case using the Jquery library).</p>

<p><strong>The HTML</strong></p>

<code><a href="#" id="scroll_top"><span>top</span></a>
</code>

<p><em>Explanation </em></p>

<p>This can go anywhere in the <code class="inline">body</code> of your page, but I think it is best to have it right at the top and out of the way. We will position, show and hide it with CSS and JavaScript in a moment.</p>

<p><strong>The CSS </strong></p>

<p>Always best to have this in a seperate .css file if possible.</p>

<p><code> #scroll_top{ </code></p>

<p><code>z-index:33; </code></p>

<p><code>border: 1px solid #77C62E;</code></p>

<p><code>-webkit-border-radius: 100px 100px 100px 100px;</code></p>

<p><code>-moz-border-radius: 100px 100px 100px 100px;</code></p>

<p><code>-ms-border-radius: 100px 100px 100px 100px; </code></p>

<p><code>-o-border-radius: 100px 100px 100px 100px;</code></p>

<p><code>border-radius: 100px 100px 100px 100px; </code></p>

<p><code>display:none;</code></p>

<p><code>height: 36px;</code></p>

<p><code>width: 36px; </code></p>

<p><code>top: 50%; </code></p>

<p><code>right: 2%; </code></p>

<p><code>opacity: 0.8; </code></p>

<p><code>position:fixed; </code></p>

<p><code>background-color:#F1F1F1;</code></p>

<p><code>} </code></p>

<p><code>#scroll_top span{ </code></p>

<p><code>position:relative; </code></p>

<p><code>top: 7px; </code></p>

<p><code>left: 6px;</code></p>

<p><code>}</code></p>

<p><code>a:focus{ </code></p>

<p><code>outline:none!important; </code></p>

<p><code>text-decoration:none!important;</code></p>

<p><code>}</code></p><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>