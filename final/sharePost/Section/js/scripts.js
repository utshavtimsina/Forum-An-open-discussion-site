	$(document).ready(function () {
		$('.panel .answer').each(function(){
			if($(this).html().length > 100){
				var les_text=$(this).html().substring(0,100);
				var more_text=$(this).html().substring(100);

				$(this).html("<span>" + les_text + "</span><a href='javascript:void(0)' class='btn_read_more'>read more</a>");
				$(this).find("span").append("<span class='more_text'>" + more_text + "</span>");
			}
		});

		$('body').on('click','.btn-toggle-answer-body',function(e){
			e.preventDefault();
			$(this).parents('.panel').find('.write-answer-block').css('display','none');
			$(this).parents('.panel').find('.answer-body').css('display','block');
		});

		$('.answer').on('click','.btn_read_more' , function(e){
			event.preventDefault();
			$(this).parent().find('.more_text').show();
			$(this).replaceWith("<a href='javascript:void(0)' class='btn_read_less'>read less</a>");
		});
		$('.answer').on('click','.btn_read_less' , function(e){
			event.preventDefault();
			$(this).parent().find('.more_text').hide();
			$(this).replaceWith("<a href='javascript:void(0)' class='btn_read_more'>read more</a>");
		});

		$('body').on('click','.btn-toggle-write-answer',function(e){
			e.preventDefault();
			$(this).parents('.panel').find('.answer-body').css('display','none');
			$(this).parents('.panel').find('.write-answer-block').css('display','block');
		});
	});