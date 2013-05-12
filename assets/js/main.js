$(function(){
$('.collapse').hide().collapse('hide').show()//collapse the 'mobile' nav immediately on pageload to preventit sliding up and down when re-loading the home page after returning from a blog or portfolio item page...hide first (then show after collapsing) because otherwise the nav will show up on pageload...

$(window).scroll(
	function(){
		if($(this).scrollTop() > 250){
			$('#scroll_top').fadeIn();
			}else{
				$('#scroll_top').fadeOut();
				}
		if($(this).scrollTop() > 30){
			$('.navbar-inner').addClass('sticky');//sticky has css transitions for padding
			}else{
				$('.navbar-inner').removeClass('sticky');
				}
		setTimeout(function(){$('.collapse').collapse('hide')}, 1200)}//collapse is a bootstrap function. 1200 is same time that the page scrolling takes...
		
);

$('#scroll_top').click(function(e){
	e.preventDefault();
	$('html, body').animate({scrollTop: 0}, 1200);
	});
	
var alter = 50
//console.log(alter)
var navbar = $('#nav').height()
if(navbar > 100){//the height is bigger when in 'mobile mode' so need to adjust scroll offset accordingly...
	//alter = -40
	alter = 360
	}else{
		alter = 40
	}
		//console.log(alter)
var options = {
			'offsetHeader' : $('.navbar').height() - $('#nav').height() + alter ,
			'targetMenus' : [{'get' : '.onepage, #nav a:not("#a, #brand")', 'target' : 'href'}],
			'targetPages' : [{'get' : 'div[data-type="page"]', 'target' : 'data-name'}],
			'detectByHash' : true,
			'detectByScroll' : true,
			'detectByResize' : true,
			'beforeScroll' : function( menu, page, $this ) {},
			'afterScroll' : function( menu, page, $this ) {}
		}
var url= window.location.href
//alert(url)
//console.log(options.offsetHeader)
//console.log('.navbar: ' + $('.navbar').height())
//console.log('#nav: ' + $('#nav').height())
var segments = url.split("//")
var segments2 = segments[1].split("/")
		
if(segments2[1] != 'blog' && segments2[1] != 'portfolio'){//don't use onepage nav on blog and portfolio pages
		var myonepage = new onepage(options);
} else {
	
	$('#nav a').click(function(e){
		e.preventDefault()
		var new_url = segments[0] + '//' + segments2[0] + $(this).attr('href')//include hash in url so onepage nav picks it up :)
		console.log(new_url)
		window.location.href = new_url
		});
	}

$('body').attr('data-offset', options.offsetHeader+5);//offset for scrollspy

$('.thumbnail a img').tooltip()

//get Tweets by ajax, so we can still cache the page on the server...
var tweet_url = segments[0] + '//' + segments2[0] +"/ajax/getTweets"//use the current url to avoid cross-domain access problems with 'www' or without 'www'
$('#tweet-ajax').load(tweet_url)

portfolioItem.initialize()
});

var portfolioItem = {
    initialize: function () {
        var $container = $("#portfolio_tem .left_box");
        var $bigPics = $container.find(".big img");
        var $thumbs = $container.find(".thumbs .thumb");

        $bigPics.hide().eq(0).show();

        $thumbs.click(function (e) {
            e.preventDefault();
            var index = $thumbs.index(this);
            $bigPics.fadeOut();
            $bigPics.eq(index).fadeIn();
        });
    }
}