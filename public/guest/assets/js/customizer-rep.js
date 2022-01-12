jQuery(document).ready(function(){

// jQuery('.drag_and_drop_control').each(function() {
// 	//alert('fffffffffwsde');
// // If there is an existing customizer value, populate our rows
// var defaultValuesArray = jQuery(this).find('.customize-control-sortable_repeater').val();
// console.log(defaultValuesArray);
// var defaultTextArray = jQuery.map(defaultValuesArray, function(i, val) {
// return jQuery('.drag_and_drop_control').find('li:eq(' + (i - 1) + ')').text();
// });
 
// var numRepeaterItems = defaultValuesArray.length;
 
// var i;
 
// for (i=0; i<=numRepeaterItems; i++) {
//             jQuery(this).find('.repeater:eq(' + i + ')').val(defaultValuesArray[i]).html('<div class="repeater-input">' + defaultTextArray[i] + '</div><i class="fa fa-minus"></i><i class="fa fa-plus"></i>');
//      }
// });
/*var or_drop_index = new Array();
jQuery('.sortable li').each(function() {
	or_drop_index.push(jQuery(this).attr("value"));
});
var ddd = or_drop_index.join(",");
jQuery('#_customize-input-globalddd_ordering').val(ddd);*/

jQuery('.sortable').sortable({

 	update: function(event, ui) {
 		$data = jQuery(this).find(".repeater").attr('value');
			//var or_drop_index = new Array();
	 		var control  = this,
	 		    or_drop_index = [];

	 		    
	       		jQuery('.sortable li').each(function() {

	 			    or_drop_index.push(jQuery(this).attr("value"));
	 			    //alert(or_drop_index);
	 		    });
	 		    var ddd = or_drop_index.join(",");
	 		    //console.log();
				jQuery('#_customize-input-globalddd_ordering').val(ddd);
				jQuery('#_customize-input-globalddd_ordering').trigger('change');
	}
});
jQuery(".repeater-input i.visibility").click(function(){  
	 var drop_index = new Array();
     jQuery(this).closest( "li.repeater" ).toggleClass("invisibility");    
     $data = jQuery(this).closest( "li.repeater" ).attr('value');
     	jQuery('.sortable li.invisibility').each(function() {
    		
		     drop_index.push(jQuery(this).attr("value"));
		
		     if ( !jQuery(this).is( '.invisibility' ) ) {
			 	drop_index = jQuery( this ).data( 'value' ) ;
			 } 
	    });	
	    var ddd = drop_index.join(",");
		jQuery('#_customize-input-goldly_diseble').val(ddd);
		jQuery('#_customize-input-goldly_diseble').trigger('change');
});	


	  //var disablesection = jQuery(this); 
	  //var disablesection_css = jQuery(".theme_section_info").find("div").length;
	  //jQuery( ".theme_info" ).each(function( i ) {

	  //alert();
		//});
	    /*var dddff = jQuery(this).closest('.sortable').closest('#customize-control-global_ordering').next("li").find("input").val();
    	jQuery('.invisibility').each(function() {
    		var myString = jQuery(".invisibility").attr("value")+",";
    		    myStringdd = dddff.replace(myString,'');
 				console.log(myStringdd);
				jQuery(this).closest('.sortable').closest('#customize-control-global_ordering').next("li").find("input#_customize-input-globalddd_ordering").val(myStringdd);
    	});	
	  
		//alert('dfdf');

		// var ddd = drop_index.join(",");
		// jQuery('#_customize-input-globalddd_ordering').val(ddd);
		jQuery('#_customize-input-globalddd_ordering').trigger('change');  */


/*}).click( function () {

			       // Update value on click.
			        updateValue();
		       } );


	 function updateValue() {
		'use strict';
var setting;
		var control  = this,
		    or_drop_index = [];
		jQuery('.sortable li').each(function() {
			    or_drop_index.push(jQuery(this).attr("value"));

		    });
		control.setting.set( or_drop_index );
	// }
} */
 
 /*syncPositionAsPriority: function syncPositionAsPriority() {
			var section = this;
			api( section.id + '[position]', function( positionSetting ) {
				section.priority.set( positionSetting.get() );
				section.priority.link( positionSetting );
			} );
		},*/
// Toggle the Sortability of the Fields
 
// jQuery(this).find('.repeater').on('click', 'i.fa-minus', function() {
// jQuery(this).parents('li').addClass('disabled');
// });
// jQuery(this).find('.repeater').on('click', 'i.fa-plus', function() {
// jQuery(this).parents('li').removeClass('disabled');
// });
 
// // Get the values from the repeater input fields and add to our hidden field
 
// function skyrocketGetAllInputs(jQueryelement) {
// var inputValues = jQueryelement.find('.repeater').map(function() {
// return jQuery(this).val();
// }).toArray();
// // Add all the values from our repeater fields to the hidden field (which is the one that actually gets saved)
// jQueryelement.find('.customize-control-sortable_repeater').val(inputValues);
// // Important! Make sure to trigger change event so Customizer knows it has to save the field
// jQueryelement.find('.customize-control-sortable_repeater').trigger('change');
// }
});