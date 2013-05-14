<?php class Ajax extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		}
	
	function index(){}
		
	function getTweets(){

//require_once('TwitterAPIExchange.php');Actually the class is in my_helper, so auto-loaded...

/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "1403565673-AIkzxLjcqq0mN5cVWp2UvklEdMS7aPXoMwkB9W6",
    'oauth_access_token_secret' => "sDixZMXgJzBMIoNmtUXkAwOzTcrymAFD2ZPIfiRY",
    'consumer_key' => "qiquLw9SfDEv8Y1xgEhfJw",
    'consumer_secret' => "nsmaHvoKapmf2YpcaUV18UvMrS4juSu8I7aDfBk8"
);

/** URL for REST request, see: https://dev.twitter.com/docs/api/1.1/ **/
//$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
//$requestMethod = 'POST';

/** POST fields required by the URL above. See relevant docs as above **/
//$postfields = array(
  //  'screen_name' => 'usernameToBlock', 
    //'skip_status' => '1'
//);

/** Perform a POST request and echo the response **/
/*$twitter = new TwitterAPIExchange($settings);
echo $twitter->buildOauth($url, $requestMethod)
             ->setPostfields($postfields)
             ->performRequest();*/

/** Perform a GET request and echo the response **/
/** Note: Set the GET field BEFORE calling buildOauth(); **/
$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
$getfield = '?screen_name=GuyChamsoft&count=3&exclude_replies=true';
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
$json = $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();
return $this->getTweetHTML($json);
	}
	
private function getTweetHTML($json){
	$return = "";
	$data = json_decode($json,TRUE);
	//$return = print_r($data[0]);
	foreach($data as $d){ 
	$ts = explode(' ',$d['text']);
	$new_tweet = array();
	foreach($ts as $t){
		if(substr($t, 0, 1) == '#'){
			$tweet = "<span style='font-style:normal; font-weight:bold;'>$t</span>";
			}
		elseif(substr($t, 0, 4) == "http"){
			$tweet = "<a href= '$t'>$t</a>";
			}
		else{
			$tweet = $t;
			}
		$new_tweet[] = $tweet;
		}
		$final_tweet = implode(' ', $new_tweet);
	$return .="<div class='row tweet'><div class='span4 tweet-text'>$final_tweet</div></div>";
	}
	
	echo $return;
	}
	
function getCarousel(){
	ob_start(); 
	?>
       <article class="slide" id="showcasing" style="background: url('/assets/images/backgrounds/aqua.jpg') repeat-x top center;">
            <img class="asset left-60 sp600 t120 z1" src="/assets/images/general/BANNER-guy.png" />
            <div class="info">
                <h2>Software & Web Development</h2>
            </div>
        </article>
        <article class="slide" id="ideas" style="background: url('/assets/images/backgrounds/aqua.jpg') repeat-x top center;">
            <div class="info">
                <h2>Websites</h2>
            </div>
            <img class="asset left-480 sp450 t260 z1" src="/assets/images/general/cha_home_medium.png" />
            <img class="asset left-210 sp600 t213 z2" src="/assets/images/general/why_medium.png" />
            <img class="asset left60 sp650 t260 z1" src="/assets/images/general/dg_home_medium.png" />
        </article>
        <article class="slide" id="tour" style="background: url('/assets/images/backgrounds/color-splash.jpg') repeat-x top center;">
            <img class="asset left-452 sp650 t210 z3" src="/assets/images/slides/scene3/ipad.png" />
            <img class="asset left-345 sp600 t270 z4" src="/assets/images/slides/scene3/iphone.png" />
            <img class="asset left-330 sp550 t135 z2" src="/assets/images/desktop.png" />
            <div class="info">
                <h2>LAMP Stack, FileMaker & Python/Django</h2>
                <a class="onepage" href="#services">What we can do for you ></a>
            </div>
        </article>
        <article class="slide" id="responsive" style="background: url('/assets/images/backgrounds/indigo.jpg') repeat-x top center;">
            <img class="asset left-472 sp600 t120 z3" src="/assets/images/slides/scene4/html5.png" />
            <img class="asset left-190 sp500 t120 z2" src="/assets/images/slides/scene4/css3.png" />
            <div class="info">
                <h2>
                    Responsive Web Design & Mobile Apps
                </h2>                
            </div>
        </article> 
        <?php       
    $return = ob_get_contents();
	
	//echo $return;
	}
}