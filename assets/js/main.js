$(function(){

$(window).scroll(
	function(){
		if($(this).scrollTop() > 250){
			$('#scroll_top').fadeIn();
			}else{
				$('#scroll_top').fadeOut();
				}
		}
);

$('#scroll_top').click(function(e){
	e.preventDefault();
	$('html, body').animate({scrollTop: 0}, 1200);
	});
	
var options = {
			'offsetHeader' : $('.navbar').height() + 15,
			'targetMenus' : [{'get' : '#nav a:not("#a, #brand")', 'target' : 'href'}],
			'targetPages' : [{'get' : 'div[data-type="page"]', 'target' : 'data-name'}],
			'detectByHash' : true,
			'detectByScroll' : true,
			'detectByResize' : true,
			'beforeScroll' : function( menu, page, $this ) {},
			'afterScroll' : function( menu, page, $this ) {}
		}
var url= window.location.href
//alert(url)
var segments = url.split("//")
var segments2 = segments[1].split("/")
		
if(segments2[1] != 'blog' && segments2[1] != 'portfolio'){
		var myonepage = new onepage(options);
} else {
	
	$('#nav a').click(function(e){
		e.preventDefault()
		var new_url = segments[0] + '//' + segments2[0] + $(this).attr('href')
		console.log(new_url)
		window.location.href = new_url
		});
	}

$('body').attr('data-offset', options.offsetHeader+5);//offset for scrollspy

});
