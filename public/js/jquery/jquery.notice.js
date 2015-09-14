/**
*	jQuery.noticeAdd() and jQuery.noticeRemove()
*	These functions create and remove growl-like notices
*		
*   Copyright (c) 2009 Tim Benniks
*
*	Permission is hereby granted, free of charge, to any person obtaining a copy
*	of this software and associated documentation files (the "Software"), to deal
*	in the Software without restriction, including without limitation the rights
*	to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
*	copies of the Software, and to permit persons to whom the Software is
*	furnished to do so, subject to the following conditions:
*
*	The above copyright notice and this permission notice shall be included in
*	all copies or substantial portions of the Software.
*
*	THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
*	IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
*	FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
*	AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
*	LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
*	OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
*	THE SOFTWARE.
*	
*	@author 	Tim Benniks <tim@timbenniks.com>
* 	@copyright  2009 timbenniks.com
*	@version    $Id: jquery.notice.js 1 2009-01-24 12:24:18Z timbenniks $
**/
(function(jQuery)
{
	jQuery.extend({			
		messageAdd: function(options)
		{	
			var defaults = {
				inEffect: 			{opacity: 'show'},              // in effect
				inEffectDuration:               1000,				// in effect duration in miliseconds
				stayTime: 			5000,				// time in miliseconds before the item has to disappear
				text: 				'',				// content of the item
				stay: 				false,				// should the notice item stay or not?
				type: 				'notice' 			// could also be error, succes
			}
			
			// declare varaibles
			if(options.type == 'notice'){
				var noticeWrapAll, noticeItemOuter, noticeItemInner, noticeItemClose;
								
				options 	= jQuery.extend({}, defaults, options);
				noticeWrapAll	= (!jQuery('.notice-wrap').length) ? jQuery('<div></div>').addClass('notice-wrap').appendTo('body') : jQuery('.notice-wrap');
				noticeItemOuter	= jQuery('<div></div>').addClass('notice-item-wrapper');
				noticeItemInner	= jQuery('<div></div>').hide().addClass('notice-item ' + options.type).appendTo(noticeWrapAll).html('<p>'+options.text+'</p>').animate(options.inEffect, options.inEffectDuration).wrap(noticeItemOuter);
				noticeItemClose	= jQuery('<div></div>').addClass('notice-item-close').prependTo(noticeItemInner).html('x').click(function() { jQuery.noticeRemove(noticeItemInner) });
				
				// hmmmz, zucht
				if(navigator.userAgent.match(/MSIE 6/i)) 
				{
				    noticeWrapAll.css({top: document.documentElement.scrollTop});
				}
				
				if(!options.stay)
				{
					setTimeout(function()
					{
						jQuery.noticeRemove(noticeItemInner);
					},
					options.stayTime);
				}	
			}
			else if(options.type == 'error'){
				// declare varaibles
				var errorWrapAll, errorItemOuter, errorItemInner, errorItemClose;
									
				options 	= jQuery.extend({}, defaults, options);
				errorWrapAll	= (!jQuery('.error-wrap').length) ? jQuery('<div></div>').addClass('error-wrap').appendTo('body') : jQuery('.error-wrap');
				errorItemOuter	= jQuery('<div></div>').addClass('error-item-wrapper');
				errorItemInner	= jQuery('<div></div>').hide().addClass('error-item ' + options.type).appendTo(errorWrapAll).html('<p>'+options.text+'</p>').animate(options.inEffect, options.inEffectDuration).wrap(errorItemOuter);
				errorItemClose	= jQuery('<div></div>').addClass('error-item-close').prependTo(errorItemInner).html('x').click(function() { jQuery.errorRemove(errorItemInner) });
				
				// hmmmz, zucht
				if(navigator.userAgent.match(/MSIE 6/i)) 
				{
				    errorWrapAll.css({top: document.documentElement.scrollTop});
				}
				
				if(!options.stay)
				{
					setTimeout(function()
					{
						jQuery.errorRemove(errorItemInner);
					},
					options.stayTime);
				}	
			}
			else if(options.type == 'success'){
				// declare varaibles
				var successWrapAll, successItemOuter, successItemInner, successItemClose;
									
				options 	= jQuery.extend({}, defaults, options);
				successWrapAll	= (!jQuery('.success-wrap').length) ? jQuery('<div></div>').addClass('success-wrap').appendTo('body') : jQuery('.success-wrap');
				successItemOuter	= jQuery('<div></div>').addClass('success-item-wrapper');
				successItemInner	= jQuery('<div></div>').hide().addClass('success-item ' + options.type).appendTo(successWrapAll).html('<p>'+options.text+'</p>').animate(options.inEffect, options.inEffectDuration).wrap(successItemOuter);
				successItemClose	= jQuery('<div></div>').addClass('success-item-close').prependTo(successItemInner).html('x').click(function() { jQuery.successRemove(successItemInner) });
				
				// hmmmz, zucht
				if(navigator.userAgent.match(/MSIE 6/i)) 
				{
				    successWrapAll.css({top: document.documentElement.scrollTop});
				}
				
				if(!options.stay)
				{
					setTimeout(function()
					{
						jQuery.successRemove(successItemInner);
					},
					options.stayTime);
				}	
			}
			
		},
		
		noticeRemove: function(obj)
		{
			obj.animate({opacity: '0'}, 600, function()
			{
				obj.parent().animate({height: '0px'}, 300, function()
				{
					obj.parent().remove();
				});
			});
		},
		
		errorRemove: function(obj)
		{
			obj.animate({opacity: '0'}, 600, function()
			{
				obj.parent().animate({height: '0px'}, 300, function()
				{
					obj.parent().remove();
				});
			});
		},
		
		successRemove: function(obj)
		{
			obj.animate({opacity: '0'}, 600, function()
			{
				obj.parent().animate({height: '0px'}, 300, function()
				{
					obj.parent().remove();
				});
			});
		}
	});
})(jQuery);