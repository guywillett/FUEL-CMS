<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><p><img alt="" src="<?php echo img_path('2.jpg');?>" /></p>

<p>With faster JavaScript engines in modern browsers a sprinkling of JS magic can really enhance the usability and feel of a website. We shouldn&#8217;t go overboard though, that would be too <em>slapstick</em>, and sometimes even hinder user experience. Today I want to share with you a simple and succinct droplet of code which I enjoyed implementing on this website - the Scroll To Top fixed button. We are talking about the little green bordered circle half&nbsp;way down the right side of the page - scroll down and you will see it appear. Unobtrusive, functional but also fun to play with. As ever there are three parts to it - the HTML, the CSS and the JavaScript (in this case using the jQuery library).</p>

<p>&nbsp;</p>

<p><strong>The HTML</strong></p>

<p>&nbsp;</p>

<p><code>&lt;a href=&#8221;#&#8221; id=&#8220;scroll-to-top&#8221;&gt;&lt;span&gt;top&lt;/span&gt;&lt;/a&gt; </code></p>

<p>&nbsp;</p>

<p>This can go anywhere in the <code class="inline">body</code> of your page, but I think it is best to have it right at the top and out of the way. We will position, show and hide it with CSS and JavaScript in a moment.</p>

<p>&nbsp;</p>

<p><strong>The CSS </strong></p>

<p>Always best to have this in a seperate .css file if possible.</p>

<p>&nbsp;</p>

<pre><code>#scroll-to-top{ 
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
} </code></pre>

<p>&nbsp;</p>

<p>Lots to go at here. &nbsp;<code class="inline blue">display: none&nbsp;</code>keeps the element hidden on page load. &nbsp;The JavaScript will deal with fading it in and out in a moment. &nbsp;<code class="inline blue">z-index:33</code> keeps it &#8216;on top&#8217; of the page underneath. <code class="inline blue">height</code> and <code class="inline blue">width</code> are the same which would render a square in older browsers. In modern browsers which support <code class="inline blue">border-radius</code> (IE 9+, Safari 5+, Chrome, FireFox 4+) it makes a circle, which I think is a pretty cool trick and avoids needing to create something in PhotoShop (I actually use GIMP). &nbsp;A solid green 1px border makes the circle show up. &nbsp;The positioning on the page is controlled by <code class="inline blue">position: fixed</code> which keeps the element positioned relative to the window, rather than the page (doesn&#8217;t move up and down with the page). The <code class="inline blue">top: 50%</code> <code class="inline blue">right: 2%</code> keep it postioned relative to the height and width of the window. &nbsp;Have a play around with the window size and you will see it stay half way down, and the distance from the right gets bigger/smaller as the window size changes - quite nifty&#8230;</p>

<p>&nbsp;</p>

<pre><code>#scroll-to-top span{ 
position:relative; 
top: 7px; 
left: 6px; 
}</code></pre>

<p>&nbsp;</p>

<p>A bit more positioning of the span inside the circle to make the &#8216;top&#8217; text be in the middle. &nbsp;This time we are using <code class="inline blue">position: relative</code>, which means we are positioning the span relative to where it would be without this positioning (ie normally). &nbsp;Have a look in FireBug and remove the position: relative and you will see where it would be ...</p>

<p>&nbsp;</p>

<pre><code>a:focus{ 
outline:none !important; 
text-decoration:none !important; 
}</code></pre>

<p>&nbsp;</p>

<p>Finally, <code>&lt;a&gt;</code> tags in some browsers (FireFox and to an extent IE) have a dotted border show up when the link is in focus, which personally I think is ugly. &nbsp;So <code class="inline blue">outline: none</code> on the <code class="inline blue">a:focus</code> pseudo-class takes care of that. What about <code class="inline blue">!important</code>? Well that makes sure it overrides any other CSS that may contradict my code here. It can save alot of time digging through code to ensure your effects are in the correct place in the file or have enough selectors to increase the specificity (and hence increase the importance). Perhaps more importantly it helps allow organising your css code in a way that is more logocal to you without interrupting the cascading nature of CSS.</p>

<p>&nbsp;</p>

<p>&nbsp;</p>

<p><strong>The JavaScript</strong></p>

<p>&nbsp;</p>

<pre class="js"><code>
$(window).scroll(
    function(){
        if($(this).scrollTop() &gt; 250){
            $('#scroll-to-top').fadeIn()
        }else{
            $('#scroll-to-top').fadeOut()
                }
     }
});
</code></pre>

<p>&nbsp;</p>

<p>In the top block we listen for the &#8216;scroll&#8217; event on the window and use the jQuery function <code class="js inline">scrollTop()</code> to determine the distance in pixels from the top. Once it is more than 250px from the top&nbsp;we use the jQuery built in animation function called&nbsp;<code class="js inline">fadeIn()</code>to display the Scroll To Top button -&nbsp;and <code class="js inline">fadeOut()</code> to hide the button when the scroll position is less than 250 pixels from the top.</p>

<p>&nbsp;</p>

<pre class="js"><code>
$('#scroll-to-top').click(function(e){
    e.preventDefault()
    $('html, body').animate({ scrollTop: 0}, 1200)
})
</code></pre>

<p>&nbsp;</p>

<p>In the second code block we bind the &#8216;click&#8217; event to the button. The first thing we do when the button is clicked is we prevent the normal behaviour of the link. &nbsp;This stops the page reloading with &#8216;#&#8217; appended to the url. We then scroll to the top! &nbsp;The <code class="js inline">scrollTop()</code> function, like many jQuery functions, can accept an argument. &nbsp;If no argument is given then it returns the current scroll position (which is what we used it for earlier) and if an argument is given then it scrolls to that scroll position. &nbsp;In this case we have specified a scroll position of 0px, ie the top. We have wrapped it in jQuery&#8217;s <code class="js inline">animate</code> function with a speed of 1200ms. So instead of just snapping to the scroll position, it eases its way there, over the 1200ms duration of the animation. Finally the &#8216;html&#8217; and &#8216;body&#8217; selectors specify what to scroll - effectively the page in this case, but you could do this for any element in your document.</p>

<p>&nbsp;</p>

<p>&nbsp;</p>

<p>So there we have it - enjoy!</p><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>