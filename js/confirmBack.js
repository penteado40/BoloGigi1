$(document).ready(function(){
	$('a[data-confirmBack]').click(function(ev){
		var href = $(this).attr('href');
		if(!$('#confirm-back').length){
			$('body').append('<div class="modal fade" id="confirm-back" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header bg-rose text-white">Voltar<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza de que deseja voltar sem salvar?</div><div class="modal-footer"><button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button><a class="btn btn-danger text-white" id="dataComfirmBackOK">Voltar</a></div></div></div></div>');
		}
		$('#dataComfirmBackOK').attr('href', href);
        $('#confirm-back').modal({show: true});
		return false;
		
	});
});