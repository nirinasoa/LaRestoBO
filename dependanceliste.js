$(document).ready(function(){
	
	  var $categorie=$('#categorie');
	  var $souscategorie=$('#souscategorie');
	  $change_list(function(){
		   var val=$(this).val();
		   if(val !=''){
			   
			   $localite2.empty();
			   $localite2.append('<option value="tous">Sous-categorie</option> <option value="tous">tous</option>');
			   
			   $.ajax({
				   url:'http://localhost/LocationVaisselle/model.php'+val;
				   datatype:'json',
				   success:function(json){
					   $.each(json,function(id,value){
						   $localite2.append('<option value="'+id+'">+value+'</option>');
						   console.log(json);
		   });
		  
	  }
	  )
			   });
		   }
		   else{
			   
			   $localite2.empty();
			   $localite2.append('<option value="">Choisir la localite deus</option>);
		   }
	   });
	      });
	
}