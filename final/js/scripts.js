	 $(document).ready(function () {		

		$(document).on('click','.btn-toggle-answer-body',function(e){
			e.preventDefault();
			$(this).parents('.panel').find('.write-answer-block').hide();
			$(this).parents('.panel').find('.answer-body').toggle();
		});

		$(document).on('click','.btn_read_more' , function(e){
			e.preventDefault();
			$(this).parent().find('.more_text').show();
			$(this).parent().find('.ellipse').hide();
			$(this).replaceWith("<a href='javascript:void(0)' class='btn_read_less'>read less</a>");
		});

		$(document).on('click','.btn_read_less' , function(e){
			e.preventDefault();
			$(this).parent().find('.more_text').hide();
			$(this).parent().find('.ellipse').show();
			$(this).replaceWith("<a href='javascript:void(0)' class='btn_read_more'>read more</a>");
		});

		$(document).on('click','.btn-toggle-write-answer',function(e){
			e.preventDefault();
			$(this).parents('.panel').find('.answer-body').hide();
			$(this).parents('.panel').find('.write-answer-block').toggle();
		});
	});
