import '../scss/about-us.scss';

jQuery(function($){
	$(document).on("click", ".modal-btn", function () {
	    var catValue = $(this).data('categories');
	    $(".modal-title").text( catValue );
	    // document.cookie = "cat="+catValue ;
	});


	// PROGRESSIVE MARKET
	$('.modal-btn').on('click', function() {
		console.log($(this).data('categories'));
	  $.ajax({
	    type: 'POST',
	    url: '/wp-admin/admin-ajax.php',
	    dataType: 'html',
	    data: {
	      action: 'filter_projects',
	      category: $(this).data('categories'),
	    },
	    beforeSend: function() {
           $("#loading-image").show();
        },
	    success: function(res) {
	      $('.market-modal').html(res);
	      $("#loading-image").hide();
	    }
	  })
	});
	$('.modal').on('hidden.bs.modal', function () {
		$('.market-modal').html('');
		$("#loading-image").show();
	});
});