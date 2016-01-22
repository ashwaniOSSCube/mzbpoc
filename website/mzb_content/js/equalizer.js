/********************************************************************
Copyright (c) 2006 Tudor Barbu (tudor@it-base.ro)
www.it-base.ro

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

**********************************************************************/

max = function( a, b ) {
	return ( a > b ) ? a : b;
}

Equalizer = Class.create();

Equalizer.prototype = {
	initialize: function() {
		if ( !arguments.length ) {
			throw( "The constructor requires at least one parameter" );
		}
		this.divs = new Array();
		
		this.minHeightSupported = ( typeof document.body.style.maxHeight != "undefined" ) ? true : false;
		
		for( var index = 0; index < arguments.length; index++ ) {
			var theDiv = $( arguments[index] );
			if ( theDiv ) {
				this.divs.push( theDiv );
			}
		}
		if ( this.divs.length == 0 ) {
			throw( "Error!" );
		}
		this.maxHeight = this.getMaxHeight();
		this.forceHeights( this.maxHeight );
	},
	
	getMaxHeight: function() {
		var maxHeight = 0;
		for ( var index = 0; index < this.divs.length; index++ ) {
			maxHeight = max( this.divs[index].getHeight(), maxHeight );
		}
		maxHeight = maxHeight - 10; //remove 10px from bottom margin
		return maxHeight;
	},
	
	forceHeights: function( maxHeight ) {
		maxHeight += 'px';
	
		for( var index = 0; index < this.divs.length; index++ ) {
			if ( this.minHeightSupported ) {
				this.divs[index].style.minHeight = maxHeight;
			}
			else {
				this.divs[index].style.height = maxHeight;
			}
		}
	}
	
}

Equalizer.keep = function( obj ) {
	var newHeight = obj.getMaxHeight();
	if ( newHeight > obj.maxHeight ) {
		obj.forceHeights( newHeight );
	}
}