<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><p>With faster JavaScript engines in modern browsers a sprinkling of JS magic can really enhance the usability and feel of a website. We shouldn't go overboard though, that would be too French, too slapstick, and sometimes even hinder user experience. Today I want to share with you a simple and succinct droplet of code which I enjoyed implementing on this website - the Scroll To Top fixed button. We are talking about the little green bordered circle have way down the right side of the page - scroll down and you will see it appear. Unobtrusive, functional but also fun to play with. As ever there are three parts to it - the HTML, the CSS and the JavaScript (in this case using the Jquery library).</p>

<p>&nbsp;</p>

<p><strong>The HTML</strong></p>

<p><code>&lt;a href="#" id="scroll-to-top"&gt;&lt;span&gt;top&lt;/span&gt;&lt;/a&gt; </code></p>

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
<p>Lots to go at here. &nbsp;Display: none keeps the element hidden on page load. &nbsp;The JavaScript willdeal with fading it in and out in a moment. &nbsp;z-index:33 keeps it 'on top' of the page underneath. height and width are the same which would render a square except in modern browsers which support border-radius (IE 9+, Safari 5+, Chrome, FireFox 4+) which make it a circle, which I think is a pretty cool trick and avoides needing to create something in PhotoShop (I actually use GIMP). &nbsp;A solid green 1px border makes the circle show up. &nbsp;The positioning on the page is cntrolled by position: fixed which keeps the element positioned relative to the window, rather than the page. The top : 50%; &nbsp;right: 2% keep it postioned relative to the height and width of the window. &nbsp;Have a play around with the window size and you will see it stay half way down, and the distance from the right gets bigger/smaller as the window size changes - quite nifty...</p>
<p>&nbsp;</p>

<pre><code>#scroll-to-top span{ 
position:relative; 
top: 7px; 
left: 6px; 
}</code></pre>

<p>&nbsp;</p>
<p>A bit more positioning of the span inside the circle to make the 'top' text be in the middle. &nbsp;This time we are using position: relative , which means we are positioning the span relative to where it would be without this positioning (ie normally). &nbsp;Have a look in FireBug and remove the position: relative and you will see where it would be ...</p>
<p>&nbsp;</p>

<pre><code>a:focus{ 
outline:none !important; 
text-decoration:none !important; 
}</code></pre>

<p>&nbsp;</p>

<p>&nbsp;</p>

<p>Finally, a tags in some browsers (FireFox and to an extent IE) have a dotted border show up when the link is in focus, which personally I think is ugly. &nbsp;So outline: none on the a:focus pseudo-class takes care of that. What about !important? Well that makes sure it overrides any other CSS that may contradict my code here. It can save alot of time digging through code to ensure your effects are in the correct place in the file or have enough selectors to increase the specificity (and hence increase the importance). Perhaps more importantly it helps allow organising your css code in a way that is more logocal to you without interrupting the cascading nature of CSS.</p>

<p>&nbsp;</p>

<p><strong>The JavaScript</strong></p>

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
<p>In the top block we listen for the 'scroll' event on the window and use the jQuery function 'scrollTop()' to determine the distance in pixels from the top. Once more than 250px then we use the jQuery built in animation function called 'fadeIn()' to display the Scroll To Top button, and 'fadeOut()' to hide the button when the scroll position is less than 250 pixels from the top.</p>
<pre class="js"><code>
$('#scroll-to-top').click(function(e){
    e.preventDefault()
    $('html, body').animate({ scrollTop: 0}, 1200)
})
</code></pre>

<p>&nbsp;</p>

<p>In the second code block we bind the 'click' event to the button. The first thing we do when the button is clicked is we prevent the normal behaviour of the link. &nbsp;This stops the page reloading with '#' appended to the url. We then scroll to the top! &nbsp;The 'scrollTop()' function, like many jQuery functions, can accept an argument. &nbsp;If no argument is given then it returns the current scroll position (which is what we used it for earlier) and if an argument is given then it scrolls to that scroll position. &nbsp;In this case we have specified a scroll positio of 0px, ie the top. We have wrapped it in jQuery's animate function with a speed of 1200ms. So instead of just snapping to the scroll position, it eases its way there over the 1200ms duration of the animation. Finally the 'html' and 'body' selectors specify what to scroll - effectively the page in this case, but you could do this for any element in your document.</p>

<p>&nbsp;</p>

<p><code>So there we have it - enjoy!</code></p>
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>