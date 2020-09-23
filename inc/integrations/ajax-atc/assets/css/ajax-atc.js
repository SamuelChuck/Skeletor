jQuery(document).ready(function($){

	//Add to cart function
	function add_to_cart(atc_btn,form_data){

		$.ajax({
			url: skeletor_ajax_localize.wc_ajax_url.toString().replace( '%%endpoint%%', 'skeletor_ajax_add_to_cart' ),
			type: 'POST',
			data: $.param(form_data),
		    success: function(response){
		        
				if(response.fragments){
					// Trigger event so themes can refresh other areas.
					$( document.body ).trigger( 'added_to_cart', [ response.fragments, response.cart_hash, atc_btn ] );
				}
				else if(response.error){
					show_notice('error',response.error)
				}
				else{
					console.log(response);
				}
		    }
		})
	}


	//Add to cart on single page
	$(document).on('submit','form.cart',function(e){
		var form = $(this);
		var atc_btn  = form.find( 'button[type="submit"]');

		var form_data = form.serializeArray();

		// if button as name add-to-cart get it and add to form
        if( atc_btn.attr('name') && atc_btn.attr('name') == 'add-to-cart' && atc_btn.attr('value') ){
            form_data.push({ name: 'add-to-cart', value: atc_btn.attr('value') });
        }

        var is_valid = false;

        $.each( form_data, function( index, data ){
        	if( data.name === "add-to-cart" ){
        		is_valid = true;
        		return false;
        	}
        } )

        if( is_valid ){
        	e.preventDefault();
        }
        else{
        	return;
        }

        form_data.push({name: 'action', value: 'skeletor_ajax_add_to_cart'});

		add_to_cart(atc_btn,form_data);//Ajax add to cart
	})

})