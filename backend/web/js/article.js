$(function() {
	var $deleteBtn = $('.deleteBtn');
	

	$deleteBtn.on('click', function(event) {
		if (confirm('記事を削除してよろしいですか？')) {
			state.onDeleteEvent(this);
		}
		return;
	});


	var CmsApi = function(){};
	
	CmsApi.prototype = {
		initialize: function(){},
		onDeleteEvent: function(event) {
			var a_id = event.id; 
			var token = $('#token').val(); 
			$.ajax({
				type: 'POST',
				async: false,
				url: '/deleteApi',
				data: {
					id: a_id,
					token: token
				}
			}).done(function(data) {
				// ここに消去する処理を書く
				console.log(data);
			}).fail(function(err) {
				// ここにエラーの処理を書く
				console.log(err);
			});
		}
	};
	
	var state = new CmsApi();

	
	
		
	
	
	


});
