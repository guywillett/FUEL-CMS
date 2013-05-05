<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><p>&lt;p&gt;With faster JavaScript engines in modern browsers a sprinkling of JS magic can really enhance the usability and feel of a website. We shouldn't go overboard though, that would be too French, too slapstick, and sometimes even hinder user experience. Today I want to share with you a simple and succinct droplet of code and design which I enjoyed implementing on this website - the Scroll To Top fixed button. We are talking about the little green bordered circle have way down the right side of the page - scroll down and you will see it appear. Unobtrusive, functional but also fun to play with. As ever there are three parts to it - the HTML, the CSS and the JavaScript (in this case using the Jquery library).&lt;/p&gt; &lt;p&gt;&lt;strong&gt;The HTML&lt;/strong&gt;&lt;/p&gt; &lt;pre&gt;&lt;code&gt;&lt;a href="#" id="scroll_to_top"&gt;&lt;span&gt;top&lt;/span&gt;&lt;/a&gt; &lt;/code&gt;&lt;/pre&gt; &lt;p&gt;&amp;nbsp;&lt;/p&gt; &lt;p&gt;&lt;em&gt;Explanation &lt;/em&gt;&lt;/p&gt; &lt;p&gt;This can go anywhere in the &lt;code class="inline"&gt;body&lt;/code&gt; of your page, but I think it is best to have it right at the top and out of the way. We will position, show and hide it with CSS and JavaScript in a moment.&lt;/p&gt; &lt;p&gt;&lt;strong&gt;The CSS &lt;/strong&gt;&lt;/p&gt; &lt;p&gt;Always best to have this in a seperate .css file if possible.&lt;/p&gt; &lt;p&gt;&lt;code&gt;#scroll_to_top{ z-index:33; border: 1px solid #77C62E; -webkit-border-radius: 100px 100px 100px 100px; -moz-border-radius: 100px 100px 100px 100px; -ms-border-radius: 100px 100px 100px 100px; -o-border-radius: 100px 100px 100px 100px; border-radius: 100px 100px 100px 100px; display:none; height: 36px; width: 36px; top: 50%; right: 2%; opacity: 0.8; position:fixed; background-color:#F1F1F1; } &lt;/code&gt;&lt;/p&gt; &lt;p&gt;&lt;code&gt;#scroll_top span{ position:relative; top: 7px; left: 6px; }&lt;/code&gt;&lt;/p&gt; &lt;p&gt;&lt;code&gt;a:focus{ outline:none!important; text-decoration:none!important; }&lt;/code&gt;&lt;/p&gt;</p>
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>