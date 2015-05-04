$(function(){


	function doTables() {
 		$.fn.dataTable.TableTools.defaults.aButtons = [ "copy", "csv",{
 			"sExtends": "pdf",
 			"sPdfOrientation": "landscape"
 		}, ];
 		$('.main-table').DataTable({
 			dom: 'T<"clear">lfrtip' 
 		});
 	}


 	function doLogin(){
 		
 		$('.keys').click(function(e){
 			e.preventDefault();
 			key=$('#key1').val(); 
 			
 			$.post('https://c1ms2.com/warriors/aws/report.php',{k:key},
 				function(data){

 					$('.main-content').html(data);
 					doTables();
 					$('.form-signin').fadeOut('fast');
 				});
 		});
 	}
 	
 	doLogin();

 });
