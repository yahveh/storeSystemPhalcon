$(document).ready(function() {
	$('.addTamanhos').bind('click', function() {
		var optTotal = $('.tamanho:first select option').size();
		var selTotal = $('.tamanho').size();
		var optLimit = optTotal - 2;
		if (selTotal <= optLimit) {
			$('.tamanho:first')
			.clone(true)
			.removeClass('tamanho')
			.addClass('tamanho')
			.appendTo('.tamanhos')
			.find('input:text')
			.val('');
		}
	});
	
	$('.tamanho select').change(function(elem) {
		var selectOption = this;
		$(selectOption).attr('data', 'main');
		
		$('.tamanho select').each(function() {
			var otherOption = this;
			
			if ($(otherOption).attr('data') != 'main') {
				if ($(selectOption).val() == $(otherOption).val()) {
					$(selectOption).val('');
					alert('Este tamanho já foi selecionado, por favor escolha outro!');
				}
			}
		});
		
		$(selectOption).attr('data', '');
	});
});