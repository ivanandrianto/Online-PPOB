/**
 * jQuery.evenIfHidden - get layout information of hidden DOM elements
 * http://petr.illodavi.de/jquery-evenifhidden
 *
 * Copyright (c) 2010, Davide Petrillo
 * Licensed under the MIT license http://creativecommons.org/licenses/MIT/
 *
 * Version: 1.0
 * Date:    2010/04/22
 *
 **/ 

jQuery.fn.evenIfHidden = function( callback ) {

  return this.each( function() {
    var self = jQuery(this);
    var styleBackups = [];
    
    var hiddenElements = self.parents().andSelf().filter(':hidden');
    
    if ( ! hiddenElements.length ) {
      callback( self );
      return true; //continue the loop
    }

    hiddenElements.each( function() {
      var style = jQuery(this).attr('style');
      style = typeof style == 'undefined'? '': style;
      styleBackups.push( style );
      jQuery(this).attr( 'style', style + ' display: block !important;' );
    });
    
    hiddenElements.eq(0).css( 'left', -10000 );

    callback(self);

    hiddenElements.each( function() {
      jQuery(this).attr( 'style', styleBackups.shift() );
    });

  });
};
