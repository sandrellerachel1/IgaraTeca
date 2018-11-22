jQuery(function(){
	function add_janela(id, nome, status){
		var janelas=Number(jQuery('.chats .window').length);
		var pixels=(280+5)*janelas;
		var style='float:none; position: absolute; bottom:0; left:'+pixels+'px';

		var splitDados=id.split(':');
		var id_user=Number(splitDados[1]);
		var janela='<div class="window" id="janela_'+id_user+'" style="'+style+'">';
		janela+='<div class="header_window"><a href="#" class="close">X</a><span class="name">'+Nome+'</span> <span id="'+id_user+'"class="'+status+'"> </span></div>';
		janela+='<div class="body"><div class="mensagens"><ul></ul></div>';
		janela+='<div class="send_message" id="'+id+'"><input type="text" name="mensagem" class="msg" id="'+id+'"></div></div></div>';
		jQuery('.chats').append(janela);
	}
});