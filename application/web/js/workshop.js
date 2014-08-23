$(function() {
	console.log('workshop.js');
	$(window).on('scroll', function() {
		var scrHeight = $(document).height();
		var scrPosi = $(window).height() + $(window).scrollTop();
		if ((scrHeight - scrPosi) / scrHeight === 0) {
			state.pagingApi();			
		}
	});
	
	var WorkshopApi = function(){};
	
	WorkshopApi.prototype = {
		initialize: function(){},
		pagingApi: function(event) {
//			var a_id = event.id; 
//			var token = $('#token').val(); 
			$.ajax({
				type: 'POST',
				url: '/workshop/pagingApi',
				cache: false,
				dataType: 'json',
				data: {
					hoge: 'test'
				}
			}).done(function(data) {
				// ここに消去する処理を書く
				console.log(data);
			}).fail(function(err, status, t) {
				// ここにエラーの処理を書く
				console.log(err);
				console.log(status);
				console.log(t);
			});
		}
	};
	
	var state = new WorkshopApi();
	
	// page loding
	 var $ft = $('footer');
	 $(window).on('scroll', function() {
		 var scrollHeight = $(document).height();
		 var scrollPosition = $(window).height() + $(window).scrollTop();
		 console.log('scrollH:' + scrollHeight + 'scrollP:' + scrollPosition);
		 if ((scrollHeight - scrollPosition) / scrollHeight === 0) {
			 
		 }
	 })
	
	 
	
});
