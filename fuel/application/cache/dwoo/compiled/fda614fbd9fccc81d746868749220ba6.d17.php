<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><p><img alt="" src="<?php echo img_path('3.jpg');?>" /></p>

<p>I like responsively designed websites. &nbsp;I think they are cool. This website is a responsive design, and it&#8217;s cool. But is it necessary or desirable for every website? And what about web apps? &nbsp;With an ever increasing proportion of visitors using mobile devices rather than desktops for internet surfing this is a hot topic. And let&#8217;s remember that mobile devices have slower processors, less RAM (memory) and often rely on 3G. &nbsp;Here are some FAQs and Pros and Cons about it:</p>

<p><strong>What is Repsonsive Design?</strong></p>

<p>Good question. &nbsp;Modern mobile browsers are pretty darn good. &nbsp;A well coded website without much consideration for responsive design will work just fine on tablets and mobile phones. Things won&#8217;t just break if well coded. But it won&#8217;t be optimised for the device. Text will be too small, links are too small so that you can accidentally click the wrong thing. Download times can be long because the same huuuuge image is downloaded whether on Desktop or mobile device and so on. &nbsp;Of course zooming in and pinching gestures (and what&#8217;s the opposite of pinching called??) help with this. &nbsp;So things are OK with normal websites.</p>

<p>But we know that the attention span and interest levels of most visitors is short and minor irritations can see them running for the hills. &nbsp;Step up Responsive Design. &nbsp;Simply put it is a design strategy that allows flexibility in the sizing and positioning of page elements and selectivelydownloading different images (and content potentially) to maximise usability and shorten pageload times. &nbsp;Just making the whole thing easier and nicer to use for each device it is used on.</p>

<p>&nbsp;</p>

<p><strong>Pros</strong></p>

<ul>
&nbsp;   <li>- Your website is optimised for all screen sizes/devices</li>
&nbsp;   <li>- There is only one website to maintain content for and maintain code for</li>
&nbsp;   <li>- This means saving lots of time (and therefore money) compared to having a seperate normal website and&nbsp;mobile specific website.</li>
</ul>

<p>&nbsp;</p>

<p><strong>Cons&nbsp;</strong></p>

<ul>
&nbsp;   <li>- It is more complex and takes longer than building a regular website = more expensive</li>
&nbsp;   <li>- If badly done can actually degrade performance (increased code footprint with little benefit if badly wtitten)</li>
</ul>

<p>&nbsp;</p>

<p><strong>When to build a Mobile App?&nbsp;</strong></p>

<p>Whether you have a website that is responsively designed or not or a specifically designed mobile website, they are still websites that run in the mobile devices browser. &nbsp;Most of the time this is great, but sometimes, and mostly we are talking about the realm of Applications rather than just websites, you need access to parts of the device&#8217;s system that is just not possible via a browser.</p><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>