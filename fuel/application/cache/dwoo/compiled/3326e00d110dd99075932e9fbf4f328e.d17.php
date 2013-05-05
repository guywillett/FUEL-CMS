<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><p><img alt="" src="<?php echo img_path('3.jpg');?>" /></p>

<p>I like responsively designed websites. &nbsp;I think they are cool. This website is a responsive design, and it&#8217;s cool. But is it necessary or desirable for every website? And what about web apps? &nbsp;With an ever increasing proportion of visitors using mobile devices rather than desktops for internet surfing this is a hot topic. And let&#8217;s remember that mobile devices have slower processors, less RAM (memory) and often rely on 3G. &nbsp;Here are some FAQs and Pros and Cons about it:</p>

<p>&nbsp;</p>

<p><strong>What is Repsonsive Design?</strong></p>

<p>Good question. &nbsp;Modern mobile browsers are pretty darn good. &nbsp;A well coded website without much consideration for responsive design will work just fine on tablets and mobile phones. Things won&#8217;t just break if well coded. But it won&#8217;t be optimised for the device. Text will be too small, links will be&nbsp;too small so that you can accidentally click the wrong thing. Download times can be long because the same huuuuge image is downloaded whether on Desktop or mobile device and so on. &nbsp;Of course zooming in and pinching gestures (and what&#8217;s the opposite of pinching called??) help with this. &nbsp;So things are OK with normal websites.</p>

<p>But we know that the attention span and interest levels of most visitors is short and minor irritations can see them running for the hills. &nbsp;Step up Responsive Design. &nbsp;Simply put it is a design strategy that allows flexibility in the sizing, structure and positioning of page elements and selectively downloading different images (and content potentially) to maximise usability and shorten pageload times. &nbsp;Just making the whole thing easier and nicer to use for each device.</p>

<p>&nbsp;</p>

<p><strong>Pros</strong></p>

<ul>
&nbsp;   <li>Your website is optimised for all screen sizes/devices</li>
&nbsp;   <li>There is only one website to maintain content for and maintain code for</li>
&nbsp;   <li>This means saving lots of time (and therefore money) compared to having a seperate normal website and&nbsp;mobile specific website.</li>
</ul>

<p>&nbsp;</p>

<p><strong>Cons&nbsp;</strong></p>

<ul>
&nbsp;   <li>it is more complex and takes longer than building a regular website = more expensive (but less expensive than 2 websites normally)</li>
&nbsp;   <li>If badly done can actually degrade performance (increased code footprint with little benefit if badly wtitten)</li>
</ul>

<p>&nbsp;</p>

<p><strong>When to build a Mobile App?&nbsp;</strong></p>

<p>Whether you have a website that is responsively designed or not or a specifically designed mobile website, they are still websites that run in the mobile device&#8217;s browser. &nbsp;Most of the time this is great, but sometimes, and mostly we are talking about the realm of Applications rather than just websites, you need access to parts of the device&#8217;s system that is just not possible via a browser.</p>

<p>This is a changing space as each iteration of mobile device browser usually improves things but think GPS, accelerometer, camera, file system, large volume data storage and the like.</p>

<p>Also, if you want an app to be available on the AppStore or GooglePlay then it must be an app (and not a website).</p>

<p>&nbsp;</p>

<p><strong>What kind of Mobile App?</strong></p>

<p>Another good question! With a not too dissimilar answer to Responsive Design. &nbsp;Basically the choice is between a Hybrid App (an app built using web technologies and wrapped in PhoneGap or Kivvy or similar) and a Native App (an app built using the platforms native coding language eg Android and Java or iOS and Objective-C).</p>

<p>&nbsp;</p>

<p><strong>Hybrid Apps</strong></p>

<ul>
&nbsp;   <li>Written with one code base (HTML/CSS/JavaScript) that can be deployed to multiple platforms - iOS, Android, Windows Mobile, Bada &nbsp;etc etc.</li>
&nbsp;   <li>Quicker and cheaper to build and maintain</li>
&nbsp;   <li>Harder to ensure a native &#8216;feel&#8217; on each platform (eg Native Android apps often look and feel different to Native iOS apps, but Hybrid Apps generally will look the same on each platform)</li>
&nbsp;   <li>Some design restrictions due to bugs or other limitations</li>
&nbsp;   <li>Sometimes worse performance than Native Apps</li>
</ul>

<p>&nbsp;</p>

<p><strong>Native Apps</strong></p>

<ul>
&nbsp;   <li>Each platform will need the App to be written all over again (eg once for iOS, once again for Android etc)</li>
&nbsp;   <li>So requires more varied&nbsp;coding language expertise</li>
&nbsp;   <li>Much more work and expense to build and maintain</li>
&nbsp;   <li>But you get a completely native &#8216;feel&#8217; and optimum performance without any design limitations (assuming good coding expertise!)</li>
</ul>

<p>&nbsp;</p>

<p>Pleasantly confused? Have another read through and then give me a buzz and we can discuss your project!</p><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>