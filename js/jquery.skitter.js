/**
 * jQuery Skitter Slideshow
 * @name jquery.skitter.js
 * @description Slideshow
 * @author Thiago Silva Ferreira - http://thiagosf.net
 * @version 1.0
 * @date August 04, 2010
 * @copyright (c) 2010 Thiago Silva Ferreira - http://thiagosf.net
 * @example http://thiagosf.net/projects/jquery/skitter/
 */

function debug (str) {
	$('body').before(str);
};
 
(function($) {

	var number_skitter = 0;
	
	$.fn.skitter = function(options) {
		return this.each(function() {
			new $sk(this, options, number_skitter);
			++number_skitter;
		});
	};
	
	var defaults = {
		velocity: 				1,
		interval: 				6500, 
		animation: 				'',
		numbers: 				true,
		navigation:			 	true,
		label:					false,
		easing_default: 		'',
		box_skitter: 			null,
		time_interval: 			null,
		images_links: 			null,
		image_atual: 			null,
		link_atual: 			null,
		label_atual: 			null,
		width_skitter: 			null,
		height_skitter: 		null,
		image_i: 				1,
		is_animating:  			false,
		is_hover_box_skitter: 	false,
		random_ia: 				null,
		thumbs: 				false,
		animateNumberOut: 		{backgroundColor:'#333', color:'#fff'},
		animateNumberOver: 		{backgroundColor:'#000', color:'#fff'},
		animateNumberActive: 	{backgroundColor:'#f97f22', color:'#fff'},
		hideTools: 				true,

		structure: 	  '<a href="#" class="prev_button">prev</a>'
					+ '<a href="#" class="next_button">next</a>'
					+ '<span class="info_slide"></span>'
					+ '<div class="image">'
					+ '<a href=""><img class="image_main" /></a>'
					+ '<div class="label_skitter"></div>'
					+ '</div>'
	};
	
	$.skitter = function(obj, options, number) 
	{
		this.box_skitter = $(obj);
		this.timer = null;
		this.settings = $.extend({}, defaults, options || {});
		this.number_skitter = number;
		this.setup();
	};
	
	// Shortcut
	var $sk = $.skitter;
	
	$sk.fn = $sk.prototype = {
		skitter: '2.0'
	};
	
	$sk.fn.extend = $.extend;
	
	$sk.fn.extend({
		
		/**
		 * Init
		 */
		setup: function() 
		{
			var self = this;
			
			this.settings.width_skitter 	= parseFloat(this.box_skitter.css('width'));
			this.settings.height_skitter 	= parseFloat(this.box_skitter.css('height'));
			
			if (!this.settings.width_skitter || !this.settings.height_skitter) {
				console.warn('Width or height size is null! - Skitter Slideshow');
				return false;
			}
			
			// Structure html
			this.box_skitter.append(this.settings.structure);
			
			// Settings
			this.settings.easing_default 	= this.getEasing(this.settings.easing);
			
			if (this.settings.velocity >= 2) this.settings.velocity = 1.3;
			if (this.settings.velocity <= 0) this.settings.velocity = 1;
			
			if (!this.settings.numbers && !this.settings.thumbs) this.box_skitter.find('.info_slide').hide();
			if (!this.settings.label) this.box_skitter.find('.label_skitter').hide();
			if (!this.settings.navigation) {
				this.box_skitter.find('.prev_button').hide();
				this.box_skitter.find('.next_button').hide();
			}
			
			this.box_skitter.find('.label_skitter').width(this.settings.width_skitter);
			
			var initial_select_class = ' image_number_select', u = 0;
			
			this.settings.images_links = new Array();
			
			this.box_skitter.find('ul li').each(function(){
				++u;
				var link 			= ($(this).find('a').length) ? $(this).find('a').attr('href') : '#';
				var src 			= $(this).find('img').attr('src');
				var animation_type 	= $(this).find('img').attr('class');
				var label 			= $(this).find('.label_text').html();
				
				self.settings.images_links.push([src, link, animation_type, label]);
				
				if (!self.settings.thumbs) {
					self.box_skitter.find('.info_slide').append(
						'<span class="image_number'+initial_select_class+'" rel="'+(u - 1)+'" id="image_n_'+u+'_'+self.number_skitter+'">'+u+'</span> '
					);
				}
				else {
					self.box_skitter.find('.info_slide').append(
						'<span class="image_number'+initial_select_class+'" rel="'+(u - 1)+'" id="image_n_'+u+'_'+self.number_skitter+'">'
							+'<img src="'+src+'" width="300" />'
							+'</span> '
					);
				}
				
				initial_select_class = '';
			});
			
			// Thumbs
			if (self.settings.thumbs) {
				// New animation
				self.settings.animateNumberOut = {opacity:0.2, width:'20px'};
				self.settings.animateNumberOver = {opacity:0.5, width:'70px'};
				self.settings.animateNumberActive = {opacity:1.0, width:'70px'};
				
				self.box_skitter.find('.info_slide').addClass('info_slide_thumb');
				var width_info_slide = u * 55 + 75;
				self.box_skitter.find('.info_slide_thumb').width(width_info_slide);
				self.box_skitter.css({height:self.box_skitter.height() + self.box_skitter.find('.info_slide').height() + 5});
				self.settings.label = false;
				
				var div_scroll_thumbs = '<div class="box_scroll_thumbs" style=""><div class="scroll_thumbs"></div></div>';
				self.box_skitter.append(div_scroll_thumbs);
				
				self.box_skitter.find('.scroll_thumbs').draggable({ 
					axis:'x', 
					containment: self.box_skitter.find('.box_scroll_thumbs'), 
					scroll: false, 
					drag: function(e) {
						if (e.pageX < self.settings.width_skitter) 
						{
							var width_over, vleftscroll;
							width_over = (width_info_slide - self.settings.width_skitter + 20);
							vleftscroll = -(e.pageX * width_over) / (self.settings.width_skitter) + 100;
							vleftscroll = parseInt(vleftscroll);
							
							if (vleftscroll < 0 && e.pageX < (self.settings.width_skitter - 10)) {
								self.box_skitter.find('.info_slide').css({'left':(vleftscroll) + 'px'});
							}
						}
					}
				});
				
				self.box_skitter.find('.scroll_thumbs').css({'left':10});
				
				if (width_info_slide < self.settings.width_skitter) {
					self.box_skitter.find('.info_slide').width(self.settings.width_skitter);
					self.box_skitter.find('.box_scroll_thumbs').hide();
				}
				
			}
			else {
				if (self.box_skitter.find('.info_slide').height() > 20) {
					self.box_skitter.find('.info_slide').hide();
				}
			}
			
			this.box_skitter.find('ul').hide();
			
			this.settings.image_atual 	= this.settings.images_links[0][0];
			this.settings.link_atual 	= this.settings.images_links[0][1];
			this.settings.label_atual 	= this.settings.images_links[0][3];
			
			if (this.settings.images_links.length > 1) 
			{
				this.box_skitter.find('.prev_button').click(function() {
					if (self.settings.is_animating == false) {
						clearInterval(this.timer);
						self.settings.image_i -= 2;
						
						if (self.settings.image_i == -2) {
							self.settings.image_i = self.settings.images_links.length - 2;
						} 
						else if (self.settings.image_i == -1) {
							self.settings.image_i = self.settings.images_links.length - 1;
						}
						
						self.box_skitter.find('.image a').attr({'href': self.settings.link_atual});
						self.box_skitter.find('.image_main').attr({'src': self.settings.image_atual});
						self.box_skitter.find('.box_clone').remove();
						self.nextImage();
					}
					return false;
				});
				
				this.box_skitter.find('.next_button').click(function() {
					if (self.settings.is_animating == false) {
						clearInterval(self.timer);
						
						self.box_skitter.find('.image a').attr({'href': self.settings.link_atual});
						self.box_skitter.find('.image_main').attr({'src': self.settings.image_atual});
						self.box_skitter.find('.box_clone').remove();
						self.nextImage();
					}
					return false;
				});
				
				this.box_skitter.find('.next_button, .prev_button').hover(function() {
					$(this).stop().animate({opacity:0.5}, 200);
				}, function(){
					$(this).stop().animate({opacity:1.0}, 200);
				});
				
				this.box_skitter.find('.image_number').hover(function() {
					if ($(this).attr('class') != 'image_number image_number_select') {
						$(this).stop().animate(self.settings.animateNumberOver, 300);
					}
				}, function(){
					if ($(this).attr('class') != 'image_number image_number_select') {
						$(this).stop().animate(self.settings.animateNumberOut, 500);
					}
				});
				
				this.box_skitter.find('.image_number').click(function(){
					if ($(this).attr('class') != 'image_number image_number_select') {
						if (self.settings.is_animating == false) {
							self.box_skitter.find('.box_clone').stop();
							clearInterval(self.timer);
							
							var new_i = $(this).attr('rel');
							self.settings.image_i = Math.floor(new_i);
							
							self.box_skitter.find('.image a').attr({'href': self.settings.link_atual});
							self.box_skitter.find('.image_main').attr({'src': self.settings.image_atual});
							self.box_skitter.find('.box_clone').remove();
							self.nextImage();
						}
					}
					return false;
				});
				
				this.box_skitter.find('.image_number').css(self.settings.animateNumberOut);
				this.box_skitter.find('.image_number:eq(0)').css(self.settings.animateNumberActive);
			}
			
			if (this.settings.hideTools) {
				this.hideTools();
			}
			
			this.loadImages();
		},
		
		/**
		 * Load images
		 */
		loadImages: function () 
		{
			var self = this;
			
			var loading = $('<div class="loading">Loading</div>');
			this.box_skitter.append(loading);
			total = this.settings.images_links.length;
			
			
			var u = 0;
			$.each(this.settings.images_links, function(i)
			{
				var image = $('<img src="" class="image_loading" />');
				image.css({position:'absolute', top:'-9999em'});
				self.box_skitter.append(image);
				var img = new Image();
				image.load(function () {
					++u;
					
					if (u == total) {
						self.box_skitter.find('.loading').remove();
						self.box_skitter.find('.image_loading').remove();
						self.start();
					}
				}).error(function () {
					self.box_skitter.find('.loading, .image_loading, .image_number, .next_button, .prev_button').remove();
					self.box_skitter.html('<p style="color:white;">Error loading images. One or more images were not found.</p>');
				}).attr('src', this[0]);
			});
		}, 
		
		/**
		 * Start skitter
		 */
		start: function()
		{
			var self = this;
			
			this.box_skitter.find('.image a').attr({'href': this.settings.link_atual});
			this.box_skitter.find('.image a img').attr({'src': this.settings.image_atual}).fadeIn(1500);
			
			this.setValueBoxText();
			this.showBoxText();
			this.stopOnMouseOver();
			
			// Start slideshow
			if (this.settings.images_links.length > 1) {
				this.timer = setTimeout(function() { self.nextImage(); }, this.settings.interval);
			} 
			else {
				this.box_skitter.find('.loading, .image_loading, .image_number, .next_button, .prev_button').remove();
			}
		},
		
		/**
		 * Next image
		 */
		nextImage: function() 
		{
			animations_functions = [
				'cube', 
				'cubeRandom', 
				'block', 
				'cubeStop', 
				'cubeHide', 
				'cubeSize', 
				'horizontal', 
				'showBars', 
				'showBarsRandom', 
				'tube',
				'fade',
				'fadeFour',
				'paralell',
				'blind',
				'blindHeight',
				'directionTop',
				'directionBottom',
				'directionRight',
				'directionLeft'
				
			];
			animation_type = (this.settings.animation == '' && this.settings.images_links[this.settings.image_i][2]) ? 
				this.settings.images_links[this.settings.image_i][2] : (this.settings.animation == '' ? 'default' : this.settings.animation);
			
			// Random type
			if (this.settings.animation_type == 'random') 
			{
				if (!this.settings.random_ia) {
					animations_functions.sort(function() {
						return 0.5 - Math.random();
					});
					this.settings.random_ia = animations_functions;
				}
				
				var random = this.settings.random_ia[this.settings.image_i];
				animation_type = animations_functions[random];
			}
			
			switch (animation_type) 
			{
				case 'cube' : 
					this.animationCube();
					break;
				case 'cubeRandom' : 
					this.animationCube({random:true});
					break;
				case 'block' : 
					this.animationBlock();
					break;
				case 'cubeStop' : 
					this.animationCubeStop();
					break;
				case 'cubeHide' : 
					this.animationCubeHide();
					break;
				case 'cubeSize' : 
					this.animationCubeSize();
					break;
				case 'horizontal' : 
					this.animationHorizontal();
					break;
				case 'showBars' : 
					this.animationShowBars();
					break;
				case 'showBarsRandom' : 
					this.animationShowBars({random:true});
					break;
				case 'tube' : 
					this.animationTube();
					break;
				case 'fade' : 
					this.animationFade();
					break;
				case 'fadeFour' : 
					this.animationFadeFour();
					break;
				case 'paralell' : 
					this.animationParalell();
					break;
				case 'blind' : 
					this.animationBlind();
					break;
				case 'blindHeight' : 
					this.animationBlindHeight();
					break;
				case 'directionTop' : 
					this.animationDirection({direction:'top'});
					break;
				case 'directionBottom' : 
					this.animationDirection({direction:'bottom'});
					break;
				case 'directionRight' : 
					this.animationDirection({direction:'right'});
					break;
				case 'directionLeft' : 
					this.animationDirection({direction:'left'});
					break;
				default : 
					this.animationTube();
					break;
			}
		},
		
		animationCube: function (options)
		{
			var self = this;
			
			var options = $.extend({}, {random: false}, options || {});
			
			this.settings.is_animating = true;
			easing = (this.settings.easing_default == '') ? 'easeOutBack' : this.settings.easing_default;
			var time_animate = 700 / this.settings.velocity;
			
			this.setActualLevel();
			
			var division_w 	= Math.ceil(this.settings.width_skitter / 100);
			var division_h 	= Math.ceil(this.settings.height_skitter / 100);
			var total		= division_w * division_h;
			
			var width_box 	= Math.ceil(this.settings.width_skitter / division_w);
			var height_box 	= Math.ceil(this.settings.height_skitter / division_h);
			
			var init_top 	= 200;
			var init_left 	= 200;
			
			var col_t = 0;
			var col = 0;
			
			for (i = 0; i < total; i++) {
				
				init_top 			= (i % 2 == 0) ? init_top : -init_top;
				init_left 			= (i % 2 == 0) ? init_left : -init_left;

				var _vtop 			= init_top + (height_box * col_t) + (col_t * 50);
				var _vleft 			= (init_left + (width_box * col)) + (col * 50);
				var _vtop_image 	= -(height_box * col_t);
				
				var _vleft_image 	= -(width_box * col);
				var _btop 			= (height_box * col_t);
				var _bleft 			= (width_box * col);
				
				var box_clone 		= this.getBoxClone();
				box_clone.hide();
				
				if (options.random) {
					box_clone.css({left:_vleft+'px', top:_vtop+'px', width:width_box, height:height_box});
				} 
				else {
					box_clone.css({left:(this.settings.width_skitter / 2), top:350, width:width_box, height:height_box});
				}
					
				
				box_clone.find('img').css({left:_vleft_image, top:_vtop_image});
				
				this.addBoxClone(box_clone);
				
				var delay_time = 40 * (col);
				
				var callback = (i == (total - 1)) ? function() { self.finishAnimation(); } : '';
				box_clone.show().delay(delay_time).animate({top:_btop+'px', left:_bleft+'px'}, time_animate, easing, callback);
				
				col_t++;
				if (col_t == division_h) {
					col_t = 0;
					col++;
				}
				
			}
		},
		
		animationBlock: function(options)
		{
			var self = this;
			
			this.settings.is_animating = true;
			easing = (this.settings.easing_default == '') ? 'easeInOutQuad' : this.settings.easing_default;
			var time_animate = 500 / this.settings.velocity;
			
			this.setActualLevel();
			
			var total 		= Math.ceil(this.settings.width_skitter / 75);
			var width_box 	= Math.ceil(this.settings.width_skitter / total);
			var height_box 	= (this.settings.height_skitter);
			
			for (i = 0; i < total; i++) {
				
				var _bleft = (width_box * (i));
				var _btop = 0;
				
				var box_clone = this.getBoxClone();
				
				box_clone.css({left: -50, top:-250, width:width_box, height:height_box});
				box_clone.find('img').css({left:-(width_box * i), top:0});
				
				this.addBoxClone(box_clone);
				
				var delay_time = 80 * (i);
				var callback = (i == (total - 1)) ? function() { self.finishAnimation(); } : '';
				box_clone.delay(delay_time).animate({top:_btop+'px', left:_bleft+'px', opacity:'show'}, time_animate, easing, callback);
			}
			
		},
		
		animationBlockOld: function(options)
		{
			var self = this;
			
			this.settings.is_animating = true;
			easing = (this.settings.easing_default == '') ? 'easeOutBack' : this.settings.easing_default;
			var time_animate = 500 / this.settings.velocity;
			
			this.setActualLevel();
			
			var total 		= Math.ceil(this.settings.width_skitter / 50);
			var width_box 	= Math.ceil(this.settings.width_skitter / total);
			var height_box 	= (this.settings.height_skitter);
			
			for (i = 0; i < total; i++) {
				
				var _bleft = (width_box * (i));
				var _btop = 0;
				
				var box_clone = this.getBoxClone();
				
				box_clone.css({left:(width_box * i) + 550, top:-550, width:width_box, height:height_box});
				box_clone.find('img').css({left:-(width_box * i), top:0});
				
				this.addBoxClone(box_clone);
				
				var delay_time = 80 * (i);
				var callback = (i == (total - 1)) ? function() { self.finishAnimation(); } : '';
				box_clone.show().delay(delay_time).animate({top:_btop+'px', left:_bleft+'px'}, time_animate, easing, callback);
			}
			
		},
		
		animationCubeStop: function(options)
		{
			var self = this;
			
			this.settings.is_animating = true;
			easing = (this.settings.easing_default == '') ? 'easeOutBack' : this.settings.easing_default;
			var time_animate = 800 / this.settings.velocity;
			
			var image_old = this.box_skitter.find('.image_main').attr('src');
			
			this.setActualLevel();
			
			this.box_skitter.find('.image a').attr({'href': this.settings.link_atual});
			this.box_skitter.find('.image_main').attr({'src':this.settings.image_atual});
			
			var division_w 	= Math.ceil(this.settings.width_skitter / 100);
			var division_h 	= Math.ceil(this.settings.height_skitter / 100);
			var total		= division_w * division_h;
			
			var width_box 	= Math.ceil(this.settings.width_skitter / division_w);
			var height_box 	= Math.ceil(this.settings.height_skitter / division_h);
			
			var init_top 	= 0;
			var init_left 	= 0;
			
			var col_t 		= 0;
			var col 		= 0;
			
			for (i = 0; i < total; i++) {
				
				init_top 			= (i % 2 == 0) ? init_top : -init_top;
				init_left 			= (i % 2 == 0) ? init_left : -init_left;

				var _vtop 			= init_top + (height_box * col_t);
				var _vleft 			= (init_left + (width_box * col));
				var _vtop_image 	= -(height_box * col_t);
				
				var _vleft_image 	= -(width_box * col);
				var _btop 			= _vtop - 50;
				var _bleft 			= _vleft - 50;
				
				var img_clone 		= $('<a href="'+this.settings.link_atual+'"><img src="'+image_old+'" /></a>');
				var box_clone 		= $('<div class="box_clone"></div>');
				
				box_clone.append(img_clone);
				box_clone.css({left:_vleft+'px', top:_vtop+'px', width:width_box, height:height_box});
				box_clone.find('img').css({left:_vleft_image, top:_vtop_image});
				
				this.addBoxClone(box_clone);
				box_clone.show();
				
				var delay_time = 30 * i;
				var callback = (i == (total - 1)) ? function() { self.finishAnimation(); } : '';
				box_clone.delay(delay_time).animate({opacity:'hide', top:_btop+'px', left:_bleft+'px'}, time_animate, easing, callback);
				
				col_t++;
				if (col_t == division_h) {
					col_t = 0;
					col++;
				}
			}
			
		},
		
		animationCubeHide: function(options)
		{
			var self = this;
			
			this.settings.is_animating = true;
			easing = (this.settings.easing_default == '') ? 'easeOutQuad' : this.settings.easing_default;
			var time_animate = 500 / this.settings.velocity;
			
			var image_old = this.box_skitter.find('.image_main').attr('src');
			
			this.setActualLevel();
			
			this.box_skitter.find('.image a').attr({'href': this.settings.link_atual});
			this.box_skitter.find('.image_main').attr({'src':this.settings.image_atual});
			
			var division_w 	= Math.ceil(this.settings.width_skitter / 100);
			var division_h 	= Math.ceil(this.settings.height_skitter / 100);
			var total		= division_w * division_h;
			
			var width_box 	= Math.ceil(this.settings.width_skitter / division_w);
			var height_box 	= Math.ceil(this.settings.height_skitter / division_h);
			
			var init_top 	= 0;
			var init_left 	= 0;
			
			var col_t 		= 0;
			var col 		= 0;
			
			for (i = 0; i < total; i++) {
				
				init_top 			= (i % 2 == 0) ? init_top : -init_top;
				init_left 			= (i % 2 == 0) ? init_left : -init_left;

				var _vtop 			= init_top + (height_box * col_t);
				var _vleft 			= (init_left + (width_box * col));
				var _vtop_image 	= -(height_box * col_t);
				
				var _vleft_image 	= -(width_box * col);
				var _btop 			= _vtop - 50;
				var _bleft 			= _vleft - 50;
				
				var img_clone 		= $('<a href="'+this.settings.link_atual+'"><img src="'+image_old+'" /></a>');
				var box_clone 		= $('<div class="box_clone"></div>');
				
				box_clone.append(img_clone);
				box_clone.css({left:_vleft+'px', top:_vtop+'px', width:width_box, height:height_box});
				box_clone.find('img').css({left:_vleft_image, top:_vtop_image});
				
				this.addBoxClone(box_clone);
				box_clone.show();
				
				var delay_time = 50 * i;
				delay_time = (i == (total - 1)) ? (total * 50) : delay_time;
				var callback = (i == (total - 1)) ? function() { self.finishAnimation(); } : '';
				
				box_clone.delay(delay_time).animate({opacity:'hide'}, time_animate, easing, callback);
				
				col_t++;
				if (col_t == division_h) {
					col_t = 0;
					col++;
				}
			}
			
		},
		
		animationCubeSize: function(options)
		{
			var self = this;
			
			this.settings.is_animating = true;
			easing = (this.settings.easing_default == '') ? 'easeOutQuad' : this.settings.easing_default;
			var time_animate = 600 / this.settings.velocity;
			
			var image_old = this.box_skitter.find('.image_main').attr('src');
			
			this.setActualLevel();
			
			this.box_skitter.find('.image a').attr({'href': this.settings.link_atual});
			this.box_skitter.find('.image_main').attr({'src':this.settings.image_atual});
			
			var division_w 	= Math.ceil(this.settings.width_skitter / 100);
			var division_h 	= Math.ceil(this.settings.height_skitter / 100);
			var total		= division_w * division_h;
			
			var width_box 	= Math.ceil(this.settings.width_skitter / division_w);
			var height_box 	= Math.ceil(this.settings.height_skitter / division_h);
			
			var init_top 	= 0;
			var init_left 	= 0;
			
			var col_t 		= 0;
			var col 		= 0;
			
			for (i = 0; i < total; i++) {
				
				init_top 			= (i % 2 == 0) ? init_top : -init_top;
				init_left 			= (i % 2 == 0) ? init_left : -init_left;

				var _vtop 			= init_top + (height_box * col_t);
				var _vleft 			= (init_left + (width_box * col));
				var _vtop_image 	= -(height_box * col_t);
				
				var _vleft_image 	= -(width_box * col);
				var _btop 			= _vtop - 50;
				var _bleft 			= _vleft - 50;
				
				var img_clone 		= $('<a href="'+this.settings.link_atual+'"><img src="'+image_old+'" /></a>');
				var box_clone 		= $('<div class="box_clone"></div>');
				box_clone.append(img_clone);
				
				box_clone.css({left:_vleft, top:_vtop, width:width_box, height:height_box});
				box_clone.find('img').css({left:_vleft_image, top:_vtop_image});
				
				this.addBoxClone(box_clone);
				box_clone.show();
				
				var delay_time = 50 * i;
				var callback = (i == (total - 1)) ? function() { self.finishAnimation(); } : '';
				box_clone.delay(delay_time).animate({
					opacity:'hide',width:'hide',height:'hide',top:_vtop+(width_box / 2),left:_vleft+(height_box /2)
				}, time_animate, easing, callback);
				
				col_t++;
				if (col_t == division_h) {
					col_t = 0;
					col++;
				}
			}
			
		},
		
		animationHorizontal: function(options)
		{
			var self = this;
			
			this.settings.is_animating = true;
			easing = (this.settings.easing_default == '') ? 'easeOutQuad' : this.settings.easing_default;
			var time_animate = 500 / this.settings.velocity;
			
			this.setActualLevel();
			
			var total 		= Math.ceil(this.settings.width_skitter / 130);
			var width_box 	= (this.settings.width_skitter);
			var height_box 	= Math.ceil(this.settings.height_skitter / total);
			
			for (i = 0; i < total; i++) {
				var _bleft = (i % 2 == 0 ? '' : '') + width_box;
				var _btop = (i * height_box);
				
				var box_clone = this.getBoxClone();
				
				box_clone.css({left:_bleft+'px', top:_btop+'px', width:width_box, height:height_box});
				box_clone.find('img').css({left:0, top:-_btop});
				
				this.addBoxClone(box_clone);
				
				var delay_time = 70 * i;
				var callback = (i == (total - 1)) ? function() { self.finishAnimation(); } : '';
				box_clone.delay(delay_time).animate({opacity:'show', top:_btop, left:0}, time_animate, easing, callback);
			}
		},
		
		animationShowBars: function(options)
		{
			var self = this;
			
			var options = $.extend({}, {random: false}, options || {});
			
			this.settings.is_animating = true;
			easing = (this.settings.easing_default == '') ? 'easeOutQuad' : this.settings.easing_default;
			var time_animate = 400 / this.settings.velocity;
			
			this.setActualLevel();
			
			var total 		= Math.ceil(this.settings.width_skitter / 50);
			var width_box 	= Math.ceil(this.settings.width_skitter / total);
			var height_box 	= (this.settings.height_skitter);
			
			for (i = 0; i < total; i++) {
				
				var _bleft = (width_box * (i));
				var _btop = 0;
				
				var box_clone = this.getBoxClone();
				
				box_clone.css({left:_bleft, top:_btop - 50, width:width_box, height:height_box});
				box_clone.find('img').css({left:-(width_box * i), top:0});
				
				this.addBoxClone(box_clone);
				
				if (options.random) {
					var random = this.getRandom(total);
					var delay_time = 50 * random;
					delay_time = (i == (total - 1)) ? (50 * total) : delay_time;
				}
				else {
					var delay_time = 70 * (i);
					time_animate = time_animate - (i * 2);
				}
				
				var callback = (i == (total - 1)) ? function() { self.finishAnimation(); } : '';
				box_clone.delay(delay_time).animate({
					opacity:'show', top:_btop+'px', left:_bleft+'px'
				}, time_animate, easing, callback);
			}
			
		},
		
		animationTube: function(options)
		{
			var self = this;
			
			this.settings.is_animating = true;
			easing = (this.settings.easing_default == '') ? 'easeOutElastic' : this.settings.easing_default;
			var time_animate = 600 / this.settings.velocity;
			
			this.setActualLevel();
			
			var total 		= Math.ceil(self.settings.width_skitter / 80);
			var width_box 	= this.settings.width_skitter;
			var height_box 	= this.settings.height_skitter;
			
			for (i = 0;i<total;i++) {
				var direction = '+';
				
				var _btop = 0;
				var _vtop = '300px';
				var vleft = ((width_box / total) * i);
			
				var box_clone = this.getBoxClone();
				
				box_clone.css({left:vleft,top: (direction)+_vtop, height:height_box});
				box_clone.find('img').css({left:-(vleft)});
				
				this.addBoxClone(box_clone);
				
				var random = this.getRandom(total);
				var delay_time = 40 * random;
				var callback = (i == (total - 1)) ? function() { self.finishAnimation(); } : '';
				box_clone.show().delay(delay_time).animate({top:_btop}, time_animate, easing, callback);
			}
		},
		
		animationFade: function(options)
		{
			var self = this;
			
			this.settings.is_animating = true;
			easing = (this.settings.easing_default == '') ? 'easeOutQuad' : this.settings.easing_default;
			var time_animate = 800 / this.settings.velocity;
			
			this.setActualLevel();
			
			var width_box 	= this.settings.width_skitter;
			var height_box 	= this.settings.height_skitter;
			var total 		= 2;
			
			for (i = 0;i<total;i++) {
				var _vtop = 0;
				var _vleft = 0;
			
				var box_clone = this.getBoxClone();
				box_clone.css({left:_vleft, top:_vtop, width:width_box, height:height_box});
				this.addBoxClone(box_clone);

				var callback = (i == (total - 1)) ? function() { self.finishAnimation(); } : '';
				box_clone.animate({opacity:'show', left:0, top:0}, time_animate, easing, callback);
			}
		},
		
		animationFadeFour: function(options)
		{
			var self = this;
			
			this.settings.is_animating = true;
			easing = (this.settings.easing_default == '') ? 'easeOutQuad' : this.settings.easing_default;
			var time_animate = 500 / this.settings.velocity;
			
			this.setActualLevel();
			
			var width_box 	= this.settings.width_skitter;
			var height_box 	= this.settings.height_skitter;
			var total 		= 4;
			
			for (i = 0;i<total;i++) {
				
				if (i == 0) {
					var _vtop = '-100px';
					var _vleft = '-100px';
				} else if (i == 1) {
					var _vtop = '-100px';
					var _vleft = '100px';
				} else if (i == 2) {
					var _vtop = '100px';
					var _vleft = '-100px';
				} else if (i == 3) {
					var _vtop = '100px';
					var _vleft = '100px';
				}
			
				var box_clone = this.getBoxClone();
				box_clone.css({left:_vleft, top:_vtop, width:width_box, height:height_box});
				this.addBoxClone(box_clone);
				
				var callback = (i == (total - 1)) ? function() { self.finishAnimation(); } : '';
				box_clone.animate({opacity:'show', left:0, top:0}, time_animate, easing, callback);
			}
		},
		
		animationParalell: function(options)
		{
			var self = this;
			
			this.settings.is_animating = true;
			easing = (this.settings.easing_default == '') ? 'easeOutCirc' : this.settings.easing_default;
			var time_animate = 400 / this.settings.velocity;
			
			this.setActualLevel();
			
			var total 		= Math.ceil(this.settings.width_skitter / 50);
			var width_box 	= Math.ceil(this.settings.width_skitter / total);
			var height_box 	= this.settings.height_skitter;
			
			for (i = 0; i < total; i++) {
				
				var _bleft = (width_box * (i));
				var _btop = 0;
				
				var box_clone = this.getBoxClone();
				
				box_clone.css({left:_bleft, top:_btop - this.settings.height_skitter, width:width_box, height:height_box});
				box_clone.find('img').css({left:-(width_box * i), top:0});
				
				this.addBoxClone(box_clone);
				
				var delay_time;
				if (i <= ((total / 2) - 1)) {
					delay_time = 1400 - (i * 200);
				}
				else if (i > ((total / 2) - 1)) {
					delay_time = ((i - (total / 2)) * 200);
				}
				delay_time = delay_time / 2.5;
				
				var callback = (i == (total - 1)) ? function() { self.finishAnimation(); } : '';
				box_clone.show().delay(delay_time).animate({
					top:_btop+'px', left:_bleft+'px'
				}, time_animate, easing, callback);
			}
			
		},
		
		animationBlind: function(options)
		{
			var self = this;
			
			var options = $.extend({}, {height: false}, options || {});
			
			this.settings.is_animating = true;
			easing = (this.settings.easing_default == '') ? 'easeOutQuad' : this.settings.easing_default;
			var time_animate = 400 / this.settings.velocity;
			
			this.setActualLevel();
			
			var total 		= Math.ceil(this.settings.width_skitter / 50);
			var width_box 	= Math.ceil(this.settings.width_skitter / total);
			var height_box 	= this.settings.height_skitter;
			
			for (i = 0; i < total; i++) {
				
				var _bleft = (width_box * (i));
				var _btop = 0;
				
				var box_clone = this.getBoxClone();
				
				box_clone.css({left:_bleft, top:_btop, width:width_box, height:height_box});
				box_clone.find('img').css({left:-(width_box * i), top:0});
				
				this.addBoxClone(box_clone);
				
				var delay_time;
				
				if (!options.height) {
					if (i <= ((total / 2) - 1)) {
						delay_time = 1400 - (i * 200);
					}
					else if (i > ((total / 2) - 1)) {
						delay_time = ((i - (total / 2)) * 200);
					}
					var callback = (i == (total - 1)) ? function() { self.finishAnimation(); } : '';
				}
				else {
					if (i <= ((total / 2) - 1)) {
						delay_time = 200 + (i * 200);
					}
					else if (i > ((total / 2) - 1)) {
						delay_time = (((total / 2) - i) * 200) + (total * 100);
					}
					var callback = (i == (total / 2)) ? function() { self.finishAnimation(); } : '';
				}
				
				delay_time = delay_time / 2.5;
				
				if (!options.height) {
					box_clone.delay(delay_time).animate({
						opacity:'show',top:_btop+'px', left:_bleft+'px', width:'show'
					}, time_animate, easing, callback);
				}
				else {
					time_animate = time_animate + (i * 2);
					easing = 'easeOutQuad';
					box_clone.delay(delay_time).animate({
						opacity:'show',top:_btop+'px', left:_bleft+'px', height:'show'
					}, time_animate, easing, callback);
				}
			}
			
		},
		
		animationBlindHeight: function(options)
		{
			var self = this;
			
			var options = $.extend({}, {height: true}, options || {});
			
			this.settings.is_animating = true;
			easing = (this.settings.easing_default == '') ? 'easeOutQuad' : this.settings.easing_default;
			var time_animate = 600 / this.settings.velocity;
			
			this.setActualLevel();
			
			var total 		= Math.ceil(this.settings.width_skitter / 50);
			var width_box 	= Math.ceil(this.settings.width_skitter / total);
			var height_box 	= this.settings.height_skitter;
			
			for (i = 0; i < total; i++) {
				
				var _bleft = (width_box * (i));
				var _btop = 0;
				
				var box_clone = this.getBoxClone();
				
				box_clone.css({left:_bleft, top:_btop, width:width_box, height:height_box});
				box_clone.find('img').css({left:-(width_box * i), top:0});
				
				this.addBoxClone(box_clone);
				
				var delay_time = 100 * i;
				var callback = (i == (total - 1)) ? function() { self.finishAnimation(); } : '';
				
				if (!options.height) {
					box_clone.delay(delay_time).animate({
						opacity:'show',top:_btop+'px', left:_bleft+'px', width:'show'
					}, time_animate, easing, callback);
				}
				else {
					easing = 'easeOutQuad';
					box_clone.delay(delay_time).animate({
						opacity:'show',top:_btop+'px', left:_bleft+'px', height:'show'
					}, time_animate, easing, callback);
				}
			}
			
		},
		
		animationDirection: function(options)
		{
			var self = this;
			
			var options = $.extend({}, {direction: 'top'}, options || {});
			
			this.settings.is_animating = true;
			easing = (this.settings.easing_default == '') ? 'easeInOutExpo' : this.settings.easing_default;
			var time_animate = 1200 / this.settings.velocity;
			
			var image_old = this.box_skitter.find('.image_main').attr('src');
			
			this.setActualLevel();
			
			this.box_skitter.find('.image a').attr({'href': this.settings.link_atual});
			this.box_skitter.find('.image_main').attr({'src':this.settings.image_atual});
			this.box_skitter.find('.image_main').hide();
			
			var width_box 	= this.settings.width_skitter;
			var height_box 	= this.settings.height_skitter;
			
			switch (options.direction)
			{
				default : case 'top' : 
					var _itop = 0, _ileft = 0, _ftop = -height_box, _fleft = 0;
					var _itopa = height_box, _ilefta = 0, _ftopa = 0, _flefta = 0;
					break;
					
				case 'bottom' : 
					var _itop = 0, _ileft = 0, _ftop = height_box, _fleft = 0;
					var _itopa = -height_box, _ilefta = 0, _ftopa = 0, _flefta = 0;
					break;
					
				case 'left' : 
					var _itop = 0, _ileft = 0, _ftop = 0, _fleft = -width_box;
					var _itopa = 0, _ilefta = width_box, _ftopa = 0, _flefta = 0;
					break;
					
				case 'right' : 
					var _itop = 0, _ileft = 0, _ftop = 0, _fleft = width_box;
					var _itopa = 0, _ilefta = -width_box, _ftopa = 0, _flefta = 0;
					break;
			}
			
			var img_clone 		= $('<a href="'+this.settings.link_atual+'"><img src="'+image_old+'" /></a>');
			var box_clone 		= $('<div class="box_clone"></div>');
			box_clone.append(img_clone);
			
			box_clone.css({top:_itop, left:_ileft, width:width_box, height:height_box});
			
			this.addBoxClone(box_clone);
			box_clone.show();
			box_clone.animate({ top:_ftop, left:_fleft }, time_animate, easing);
			

			
			var box_clone = this.getBoxClone();
			
			box_clone.css({top:_itopa, left:_ilefta, width:width_box, height:height_box});
			
			this.addBoxClone(box_clone);
			box_clone.show();
			
			var callback = function() { self.finishAnimation(); };
			box_clone.animate({ top:_ftopa, left:_flefta }, time_animate, easing, callback);
			
		},
		
		// Finish animation
		finishAnimation: function (options) 
		{
			var self = this;
			this.box_skitter.find('.image_main').show();
			this.showBoxText();
			this.settings.is_animating = false;
			if (!this.settings.is_hover_box_skitter) {
				this.timer = setTimeout(function() { self.completeMove(); }, this.settings.interval);
				this.box_skitter.find('.image_main').attr({'src': this.settings.image_atual});
				this.box_skitter.find('.image a').attr({'href': this.settings.link_atual});
			}
		},

		// Complete move
		completeMove: function () 
		{
			clearInterval(this.timer);
			this.box_skitter.find('.box_clone').remove();
			this.nextImage();
		},

		// Actual config for animation
		setActualLevel: function() {
			this.setImageLink();
			this.addClassNumber();
			this.hideBoxText();
			this.increasingImage();
		},

		// Set image and link
		setImageLink: function()
		{
			var name_image = this.settings.images_links[this.settings.image_i][0];
			var link_image = this.settings.images_links[this.settings.image_i][1];
			var label_image = this.settings.images_links[this.settings.image_i][3];
			
			this.settings.image_atual = name_image;
			this.settings.link_atual = link_image;
			this.settings.label_atual = label_image;
		},

		// Add class for number
		addClassNumber: function () 
		{
			var self = this;
			this.box_skitter.find('.image_number_select').animate(self.settings.animateNumberOut, 500).removeClass('image_number_select');
			$('#image_n_'+(this.settings.image_i+1)+'_'+self.number_skitter).animate(self.settings.animateNumberActive, 700).addClass('image_number_select');
		},

		// Increment image_i
		increasingImage: function()
		{
			this.settings.image_i++;
			if (this.settings.image_i == this.settings.images_links.length) {
				this.settings.image_i = 0;
			}
		},

		// Get box clone
		getBoxClone: function()
		{
			var img_clone = $('<a href="'+this.settings.link_atual+'"><img src="'+this.settings.image_atual+'" /></a>');
			var box_clone = $('<div class="box_clone"></div>');
			box_clone.append(img_clone);
			return box_clone;
		},

		// Add box clone in box_skitter
		addBoxClone: function(box_clone)
		{
			this.box_skitter.append(box_clone);
		},
		
		// Get accepts easing 
		getEasing: function(easing)
		{
			var easing_accepts = [
				'easeInQuad', 'easeOutQuad', 'easeInOutQuad', 
				'easeInCubic', 'easeOutCubic', 'easeInOutCubic', 
				'easeInQuart', 'easeOutQuart', 'easeInOutQuart', 
				'easeInQuint', 'easeOutQuint', 'easeInOutQuint', 
				'easeInSine', 'easeOutSine', 'easeInOutSine', 
				'easeInExpo', 'easeOutExpo', 'easeInOutExpo', 
				'easeInCirc', 'easeOutCirc', 'easeInOutCirc', 
				'easeInElastic', 'easeOutElastic', 'easeInOutElastic', 
				'easeInBack', 'easeOutBack', 'easeInOutBack', 
				'easeInBounce', 'easeOutBounce', 'easeInOutBounce', 
			];
			
			if ($.inArray(easing, easing_accepts) > 0) {
				return easing;
			}
			else {
				return '';
			}
		},
		
		// Get random number
		getRandom: function (i) 
		{
			return Math.floor(Math.random() * i);
		},

		// Set value for text
		setValueBoxText: function () 
		{
			this.box_skitter.find('.label_skitter').html(this.settings.label_atual);
		},
		
		// Show box text
		showBoxText: function () 
		{
			var self = this;
			if (this.settings.label_atual != undefined && self.settings.label) {
				self.box_skitter.find('.label_skitter').slideDown(400);
			}
		},
		
		// Hide box text
		hideBoxText: function () 
		{
			var self = this;
			this.box_skitter.find('.label_skitter').slideUp(200, function() {
				self.setValueBoxText();
			});
		},
		
		// Stop time to get over box_skitter
		stopOnMouseOver: function () 
		{
			var self = this;
			self.box_skitter.hover(function() {
				
				if (self.settings.hideTools) {
					self.box_skitter.find('.info_slide').show().css({opacity:0}).animate({opacity:0.75}, 300);
					self.box_skitter.find('.prev_button').show().css({opacity:0}).animate({opacity:0.75}, 300);
					self.box_skitter.find('.next_button').show().css({opacity:0}).animate({opacity:0.75}, 300);
				
				}
				
				clearInterval(self.timer);
				self.settings.is_hover_box_skitter = true;
				
			}, function() {
			
				if (self.settings.hideTools) {
					self.box_skitter.find('.info_slide').queue("fx", []).show().css({opacity:0.75}).animate({opacity:0}, 500);
					self.box_skitter.find('.prev_button').queue("fx", []).show().css({opacity:0.75}).animate({opacity:0}, 500);
					self.box_skitter.find('.next_button').queue("fx", []).show().css({opacity:0.75}).animate({opacity:0}, 500);
				}
				
				clearInterval(self.timer);
				if (!self.settings.is_animating && self.settings.images_links.length > 1) {
					self.timer = setTimeout(function() {
						clearInterval(self.timer);
						self.nextImage();
					}, self.settings.interval);
				}
				self.settings.is_hover_box_skitter = false;
				
			});
		}, 
		
		/**
		 * Hide tools
		 */
		hideTools: function() {
			this.box_skitter.find('.info_slide').hide();
			this.box_skitter.find('.prev_button').hide();
			this.box_skitter.find('.next_button').hide();
			this.box_skitter.find('.label_skitter').hide();
		}
		
	});

})(jQuery);