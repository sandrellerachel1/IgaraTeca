jQuery(function(){
	//Função para abrir janela
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

	//histórico de conversa
	function retorna_historico(user_id){
		var pega_id=jQuery('body .users_online li a').attr('id');
		var ids=pega_id.split(':');
		var my_id=ids[0];
		var user_id=ids[1];
		var userOnline=Number(jQuery('.users_online ul li').attr('id'));
		jQuery.ajax({
			type: 'POST',
			url: 'mensagens.php',
			data: {conversacom: user_id},//user_id
			datatype: 'json',
			success: function (retorno){
				if(retorno=="true"){
					alert('Achou as mensagens');
				}
				else{
					alert('Não encontrou as mensagens');
				}
				jQuery.each(retorno, function(i, msg){
					if(jQuery('#janela_'+msg.janela_de).length > 0){
						alert('mais');
						if(my_id==msg.id_de){
							jQuery('#janela'+msg.janela_de+'.mensagens ul').append('<li id="'+msg.id+'" class="eu"><p>'+msg.mensagem+'</p></li>');	
						}
						else{
							jQuery('#janela'+msg.janela_de+'.mensagens ul').append('<li id="'+msg.id+'"><div class="imgSmall"><img src="../img/avatar1.png"><p>'+msg.mensagem+'</p></li>');
						}
					}
				});
				[].reverse.call(jQuery('#janela_'+id_conversa+'.mensagens li')).appendTo(jQuery('#janela_'+id_conversa+'.mensagens ul'));
				var altura=jQuery('#janela_'+id_conversa+'.mensagens').height();
				jQuery('#janela_'+id_conversa+'.mensagens').animate({scrollTop: altura}, '500');
			}
		});
	}
		
	//Abre janelas
	jQuery('body').on('click', '.users_online a', function(){
		var id=jQuery(this).attr('id');

		var status=jQuery(this).next().attr('class');
		var splitIds=id.split(':');
		var idJanela=Number(splitIds[1]);
			
		if(jQuery('#janela_'+idJanela).length==0){
			var nome= jQuery(this).text();
			add_janela(id, nome, status);
			retorna_historico(idJanela);
		}
		else{
			jQuery(this).removeClass('comecar');
		}
	});

	//Minimizar janela
	jQuery('body').on('click', '.header_window', function(){
		var next=jQuery(this).next();
		next.toggle(100);
	});
	
	//fechar janela
	jQuery('body').on('click', '.close', function(){
		var parent=jQuery(this).parent().parent();
		var idParent=parent.attr('id');
		var splitParent= idParent.split(':');
		var idJanelaFechada=Number(splitParent[1]);

		var contagem=Number(jQuery('.window').length)-1;
		var indice=Number(jQuery('.close').index(this));
		var restamAfrente=contagem-indice;

		if(restamAfrente>=1){
			for(var i=1; i<= restamAfrente; i++){
				jQuery('.window:eq('+(indice+i)+')').animate({left:"0"}, 200);
				parent.remove();
				jQuery('.users_online li #'+idJanelaFechada+'a').addClass('comecar');
			}
		}
		else{
			parent.remove();
		}
	});

	//Envia mensagens
	jQuery('body').on('keyup', '.msg', function(e){
		if(e.which==13){
			var texto=jQuery('.msg').val();
			var id= jQuery(this).attr('id');
			var split= id.split(':');
			var destino= Number(split[1]);
			var meu_id=Number(split[0]);
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