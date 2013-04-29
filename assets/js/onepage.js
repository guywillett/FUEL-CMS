var onepage = function( options )
{
	var self = this,
	active = null,
	clicking = false,
	scrolling = false;
	
	self.collectMenus = [];
	self.collectPages = [];
	
	self.options = {
		'offsetHeader' : 0,
		'targetMenus' : [],
		'targetPages' : [],
		'detectByHash' : true,
		'detectByScroll' : true,
		'detectByResize' : true,
		'beforeScroll' : function( menu, page, $this ){},
		'afterScroll' : function( menu, page, $this ){}
	}
	
	self._init = function( options )
	{
		if( typeof options == 'object')
		{
			for( var option in options )
			{
				if( self.options[option] !== undefined )
				{
					if( option == 'beforeScroll' && typeof options[option] !== 'function' )
					{
						options[option] = function(){};
					}

					if( option == 'afterScroll' && typeof options[option] !== 'function' )
					{
						options[option] = function(){};
					}

					self.options[option] = options[option];
				}
			}
		}
		
		self.ready(function(){
			
			self.binding();
			
			if( self.options.detectByScroll == true) 
			{
				self.scrolling();
			}
			
			if( self.options.detectByResize == true) 
			{
				self.resize();
			}
		});
	}
	
	self.binding = function() 
	{
		if( self.options.targetMenus.length > 0 )
		{
			for( var index in self.options.targetMenus )
			{
				if(self.collectMenus[index] == undefined )
				{
					self.collectMenus[index] = [];
				}
				
				$(self.options.targetMenus[index].get).each(function( i, $this){
					
					var name = self.humanizeHash($($this).attr(self.options.targetMenus[index].target));
					
					self.collectMenus[index].push({'name' : name, 'get' : $this});
				});
			}
		} else {
			alert('Target Menu not defined, filling Collection Menus not completed');
		}
		
		if( self.options.targetPages.length > 0 )
		{
			for( index in self.options.targetPages )
			{
				if(self.collectPages[index] == undefined )
				{
					self.collectPages[index] = [];
				}
				
				$(self.options.targetPages[index].get).each(function(i, $this){
					
					var name = self.humanizeHash($($this).attr(self.options.targetPages[index].target));
					
					self.collectPages[index].push({'name' : name, 'get' : $this});
				});
			}
		} else {
			alert('Target Pages not defined, filling Collection Pages not completed');
		}
		
		if( self.collectMenus.length > 0 && self.collectPages.length > 0 )
		{
			self.multiple();
		} else {
			alert('Collection menu/pages not filled, Binding not completed');
		}
		
		return self;
	}
	
	self.rebinding = function()
	{
		self.collectMenus = [];
		self.collectPages = [];
		
		self.binding();
	}
	
	self.multiple = function() 
	{
		var menu = self.collectMenus,
		pages = self.collectPages,
		name = self.humanizeHash(window.location.hash);
		
		for(var c in menu)
		{
			$(menu[c]).each(function(i, attr)
			{	
				var $this = attr.get;
				
				$($this).click(function( e )
				{
					e.preventDefault();
					
					clicking = true;
					
					if( $("html:not(:animated), body:not(:animated)").length == 0 )
					{
						return false;
					}
					
					var page = null;
					
					for(p in pages[c])
					{	
						if( pages[c][p].name == attr.name )
						{
							page = $(pages[c][p].get);
						}
					}
					
					if( page === null )
					{
						alert('Page not found');
						return false;
					}
					
					self.options.beforeScroll(attr, page, $this);
					
					if ( ! $($this).hasClass('active') ) 
					{
						active = attr.name;
						self.setMenu(menu[c], active);

						$("html:not(:animated)").animate({
							scrollTop: page.offset().top - self.options.offsetHeader
						}, 1000);
						
						$("body:not(:animated)").animate({
							scrollTop: page.offset().top - self.options.offsetHeader
						}, 1000, function(){
							self.options.afterScroll(attr, page, $this);
						});
						
						clicking = false;
					}
					
					return false;
				});
				
				if( self.options.detectByHash === true && name !== null )
				{
					if(attr.name == name)
					{
						active = attr.name;
						self.setMenu(menu[c], active);
						
						for(var p in pages[c])
						{	
							if( pages[c][p].name == attr.name )
							{
								page = $(pages[c][p].get);
							}
						}
						
						var page = null;
					
						for(var p in pages[c])
						{	
							if( pages[c][p].name == attr.name )
							{
								page = $(pages[c][p].get);
							}
						}

						if( page === null )
						{
							alert('Page not found');
							return false;
						}

						self.options.beforeScroll(attr, page, $this);

						active = attr.name;
						self.setMenu(menu[c], active);

						$("html:not(:animated)").animate({
							scrollTop: page.offset().top - self.options.offsetHeader
						}, 1000);
						
						$("body:not(:animated)").animate({
							scrollTop: page.offset().top - self.options.offsetHeader
						}, 1000, function(){
							self.options.afterScroll(attr, page, $this);
						});
					}
				}
			});
		}
		
		return self;
	}
	
	self.single = function( collections ) 
	{
		return false;
	}
	
	self.setMenu = function( menus, active )
	{
		for(var c in menus)
		{	
			if( menus[c].name == active )
			{
				$(menus[c].get).addClass('active');
				
				if( self.options.detectByHash === true )
				{
					self.addHash(menus[c].name)
				}
			} else {
				$(menus[c].get).removeClass('active');
			}
		}
		
		return false;
	}
	
	self.scrolling = function()
	{
		var menus = self.reorderScrollMenus(self.collectMenus),
		pages = self.reorderScrollPages(self.collectPages),
		page = null,
		menu = null,
		
		scrollTop = $(window).scrollTop(),
		newScrollTop = 0,
		current = 0;
		
		$(window).scroll(function(){
			
			if(clicking === true )
			{
				return false;
			}
			
			scrollTop = $(window).scrollTop();
			scrolling = true;
			
			if(page == null || page[0] !== active)
			{
				for(var p in pages)
				{
					if(pages[p][0] == active )
					{
						page = pages[p];
						current = parseInt(p);
					}
				}
			}
			
			if(menu == null || menu.name !== active)
			{
				for(var m in menus)
				{
					if(menus[m].name == active)
					{
						menu = menus[m];
						self.options.beforeScroll(menu, pages[current], menu.get);
					}
				}	
			}
			
			if( newScrollTop < scrollTop || newScrollTop == 0 )
			{
				if( pages[(current+1)] !== undefined && (pages[(current+1)][1] - self.options.offsetHeader) <= newScrollTop )
				{
					current++;
					active = pages[current][0];
					
					for(m in menus)
					{
						if(menus[m].name == active )
						{
							self.options.afterScroll(menus[m], pages[current], menus[m].get);
							self.setMenu(menus, active);
						}
					}
				} 
			}
			else
			{
				if( (current-1) >= 0 && (pages[(current-1)][1] - self.options.offsetHeader) >= newScrollTop || (current-1) >= 0 && (pages[(current)][1] - self.options.offsetHeader) >= newScrollTop )
				{
					current--;
					active = pages[current][0];
					
					for(m in menus)
					{
						if(menus[m].name == active )
						{
							self.options.afterScroll(menus[m], pages[current], menus[m].get);
							self.setMenu(menus, active);
						}
					}

				} 
			}

			newScrollTop = scrollTop;
		});
	}
	
	self.resize = function()
	{
		var clearTime = null,
		current = 0;
		
		$(window).resize(function(){
			
			if( clearTime != null )
			{
				clearTimeout(clearTime);
				clearTime = null;
			}
			
			clearTime = setTimeout(function(){
				
				if( ! scrolling ) 
				{
					var pages = self.reorderScrollPages(self.collectPages);
					var menus = self.reorderScrollMenus(self.collectMenus);
					
					var page = null;
					var menu = null;
					
					for(var p in pages)
					{
						if(pages[p][0] == active )
						{
							page = pages[p];
							current = parseInt(p);
						}
					}
					
					for(var m in menus)
					{
						if(menus[m].name == active )
						{
							menu = menus[m];
						}
					}
					
					self.options.beforeScroll(menu, page, menu.get);
					
					$("html:not(:animated)").animate({
						scrollTop: pages[current][1] - self.options.offsetHeader
					}, 1000);

					$("body:not(:animated)").animate({
						scrollTop: pages[current][1] - self.options.offsetHeader
					}, 1000, function(){
						self.options.afterScroll(menu, page, menu.get);
					});
				}
			}, 1000);
			
			scrolling = false;
		});
	}
	
	self.reorderScrollPages = function( pages ) 
	{
		var sortable = [];
		
		for( var i in pages)
		{
			for( var c in pages[i] )
			{
				sortable.push([ pages[i][c].name, $(pages[i][c].get).offset().top ])
			}
		}
		
		sortable.sort(function(a, b) {return a[1] - b[1]});

		return sortable;
	}
	
	self.reorderScrollMenus = function( menu ) 
	{
		var sortable = [];
		
		for( var i in menu)
		{
			for( var c in menu[i] )
			{
				sortable.push(menu[i][c])
			}
		}
		
		return sortable;
	}
	self.humanizeHash = function( url )
	{
		if( url == undefined )
		{
			return url;
		}
		
		var hash = url.split('#');
		
		if( hash[1] !== undefined )
		{
			if( hash[1].substr(0, 1) == '/')
			{
				hash = hash[1].substr(1);	
			} else {
				hash = hash[1];
			}
			
		} else {
			hash = url;
		}
		
		return hash; 
	}
	
	self.addHash = function( hash )
	{
		window.location.hash = '/' + hash;
	}
	
	self.ready = function ( callback )
	{
		var body = document.body;
		
		if(body && body.readyState == 'loaded') 
		{
			callback();
		} else {
			if (window.addEventListener)
			{  
				window.addEventListener('load', callback, false);
			} else {
				window.attachEvent('onload', callback);
			}
		}	
	}
	
	self._init( options );
}