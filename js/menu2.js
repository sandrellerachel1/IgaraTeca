$(document).ready(main);
	var menu=false;
	
	function main(){
		$('.menu_bar').click(function(){
			if (menu==false) {
				$('nav').fadeIn();
				menu=true;
			};
			else{
				$('nav').fadeOut();
				menu=false;
			};
		});
};