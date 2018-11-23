jQuery(function(){
	var userOnline=Number(jQuery('span.users_online').attr('id'));

	function add_janela(id, nome, status){
		var janelas=Number(jQuery('.chats .window').length);
		var pixels=(280+5)*janelas;
		var style='float:none; position: absolute; bottom:0; left:'+pixels+'px;';

		var splitDados=id.split(':');
		var id_user=Number(splitDados[1]);
		var janela='<div class="window" id="janela_'+id_user+'" style="'+style+'">';
		janela+='<div class="header_window"><a href="#" class="close">X</a><span class="name">'+nome+'</span> <span id="'+id_user+'"class="'+status+'"> </span></div>';
		janela+='<div class="body"><div class="mensagens"><ul></ul></div>';
		janela+='<div class="send_message" id="'+id+'"><input type="text" name="mensagem" class="msg" id="'+id+'"></div></div></div>';
		
		jQuery('.chats').append(janela);
	}

	function retorna_historico(id_conversa){
		jQuery.ajax({
			type: 'POST',
			url: 'mensagens.php',
			data: {conversacom: id_conversa},
			datatype: 'json',
			success: function (retorno){
				jQuery.each(retorno, function(i, msg){
					if(jQuery('.janela_'+msg.janela_de.length > 0)){
						if(userOnline==msg.id_de){
							jQuery('.janela'+msg.janela_de+'.mensagens ul').append('<li id="'+msg.id+'" class="eu"><p>'+msg.mensagem+'</p></li>');	
						}
						else{
							jQuery('.janela'+msg.janela_de+'.mensagens ul').append('<li id="'+msg.id+'"><div class="imgSmall"><img src="../img/avatar1.png"><p>'+msg.mensagem+'</p></li>');
						}
					}
				});
			}
		});
	}

	jQuery('body').on('click', '.users_online a', function(){
		var id=jQuery(this).attr('id');
		//jQuery(this.)removeClass('comecar');

		var status=jQuery(this).next().attr('class');
		var splitIds=id.split(':');
		var idJanela=Number(splitIds[1]);
		var meu_id=Number(splitIds[0]);

			var nome= jQuery(this).text();
			add_janela(id, nome, status);
			
		/*if(jQuery('#janela_'+idJanela).length==0){
		/*	var nome= jQuery(this).text();
			add_janela(id, nome, status);
		}
		else{
			jQuery(this).removeClass('comecar');
		}*/
	});
	jQuery('body').on('click', '.header_window', function(){
		var next=jQuery(this).next();
		next.toggle(100);
	});
	/*
	jQuery('body').on('click', '.close', function(){
		var parent=jQuery(this).parent().parent();
		var idParent=parent.attr('id');
		var splitParent= idParent.split('_');
		var idJanelaFechada=Number(splitParent[1]);

		var contagem=Number(jQuery('.window').length)-1;
		var indice=Number(jQuery('.close').index(this));
		var restamAfrente=contagem-indice;

		for(var i=1; i<= restamAfrente; i++){
			jQuery('.window:eq('+(indice+i)+')').animate({left"-=285"}, 200);
			parent.remove();
			//jQuery('.users_online li#'+idJanelaFechada+'a').addClass('comecar');
		}
	});*/
	jQuery('body').on('keyup', '.msg', function(e){
		if(e.which==13){
			var texto=jQuery('.msg').val();
			var id= jQuery(this).attr('id');
			var split= id.split(':');
			var destino= Number(split[1]);
			jQuery.ajax({
				type: 'POST',
				url: 'add_mensagens.php',
				data: {mensagem: texto, para: destino},
				success: function(retorno){
					if(retorno=='ok'){
						jQuery('.msg').val('');
					}else{
						alert('Não foi possível enviar a mensagem');
					}
				}
			});
		}
	});
});