// import '../scss/woocommerce-custom.scss';

var url = window.location.href;
console.log(url);
if (url.includes('checkout')) {
	document.getElementById("billing_address_1").minLength = "10";
	document.getElementById("shipping_address_1").minLength = "10";
	jQuery(function($){
	    $("#billing_first_name, #billing_last_name, #shipping_first_name, #shipping_last_name").keypress(function(event){
	        var inputValue = event.charCode;
	        if(!(inputValue >= 65 && inputValue <= 125) && (inputValue != 32 && inputValue != 0)){
	            event.preventDefault();
	        }
	    });
	});
}

if (url.includes('my-account/edit-address/billing/') || url.includes('akun-saya/edit-address/penagihan/')) {
	document.getElementById("billing_address_1").minLength = "10";
	jQuery(function($){
	    $("#billing_first_name, #billing_last_name").keypress(function(event){
	        var inputValue = event.charCode;
	        if(!(inputValue >= 65 && inputValue <= 125) && (inputValue != 32 && inputValue != 0)){
	            event.preventDefault();
	        }
	    });
	});
}

if (url.includes('my-account/edit-address/shipping/') || url.includes('akun-saya/edit-address/shipping/')) {
	document.getElementById("shipping_address_1").minLength = "10";
	jQuery(function($){
	    $("#shipping_first_name, #shipping_last_name").keypress(function(event){
	        var inputValue = event.charCode;
	        if(!(inputValue >= 65 && inputValue <= 125) && (inputValue != 32 && inputValue != 0)){
	            event.preventDefault();
	        }
	    });
	});
}

if (url.includes('my-account/edit-account/') || url.includes('akun-saya/edit-account/')) {
	jQuery(function($){
	    $("#account_first_name, #account_last_name").keypress(function(event){
	        var inputValue = event.charCode;
	        if(!(inputValue >= 65 && inputValue <= 125) && (inputValue != 32 && inputValue != 0)){
	            event.preventDefault();
	        }
	    });
	});
}