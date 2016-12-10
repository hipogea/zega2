// el codigo JS del widget
//
var ImageGallery1 = function(options){
	var divMayor = $('#'+options.id);
	var ajaxcmd = function(action,postdata,callback){
		var result=false;
		var nocache=function(){
			var dateObject = new Date();
			var uuid = dateObject.getTime();
			return "&nocache="+uuid;
		}
		jQuery.ajax({
			url: action+nocache(),
			type: 'post',
			async: true,
			contentType: "application/json",
			data: postdata,
			success: function(data, textStatus, jqXHR){
				result = data;
				if(callback != null)
					callback(true, data);
			},
			error: function(jqXHR, textStatus, errorThrown){
				callback(false, jqXHR.responseText);
				return false;
			},
		});
		return result;
	}

	var control_image = function(img, input, id, control){
		var wait = img.parent().parent().find('img.wait');
		wait.show();
		input.attr('disabled','disabled');
		input.data('busy',true);
		img.data('busy',true);
		ajaxcmd(options.action+'&modelid='+options.modelid
				+'&id='+id+'&action='+control, '',
		function(ok, data){
			if(ok){
				options.onSuccess(data);	
			}else{
				options.onError(data);
			}
			wait.hide();
			input.attr('disabled',null);
			input.data('busy',false);
			img.data('busy',false);
			if(ok && (control=='delete')){
				var div = img.parent().parent();
				div.remove();
			}else{
				if(ok && (control == 'select')){
					// ?
				}
			}
		});
	}

	divMayor.find('input').each(function(){
		var input = $(this);
		input.click(function(){
			var img = $(this).parent().parent().find('.img1-image img');
			var id = img.attr('alt');
			if(img.data('busy')==true)
				return;
			control_image(img, $(this), id,'select');
		});		
	});

	divMayor.find('img.delete').each(function(){
		var delimg = $(this);
		delimg.click(function(){
			var img = $(this).parent().parent().find('.img1-image img');
			var input = $(this).parent().parent().find('.img1-image input');
			var id = img.attr('alt');
			if(img.data('busy')==true)
				return;
			if(confirm(options.confirmDeleteMessage)){
				control_image(img,input,id,'delete');
			}
		});		
	});

	// mark default image at startup
	divMayor.find('.img1-item').each(function(){
		var id = $(this).find('.img1-image img').attr('alt');
		if(id == options.selectedid){
			var input = $(this).find('.img1-control input');
			input.attr('checked','checked');
		}
	});		


};
