jQuery(document).ready(function($){

 $('.of-css-editor').each(function() {
        var editor = ace.edit($(this).attr('id'));
        var this_textarea = $('#' + $(this).data('textarea'));
        editor.setTheme("ace/theme/chrome");
        editor.getSession().setMode("ace/mode/css");
        editor.setShowPrintMargin( false );
    
        editor.getSession().setValue(this_textarea.val());
        editor.getSession().on('change', function(){
        this_textarea.val(editor.getSession().getValue());
		this_textarea.text(editor.getSession().getValue());
		  
        });
        this_textarea.on('change', function(){
											
          editor.getSession().setValue(this_textarea.val());
        });
      });


				
 //
jQuery('.alchem_shortcodes,.alchem_shortcodes_textarea').click(function(){
  var popup = 'shortcode-generator';

        if(typeof params != 'undefined' && params.identifier) {
            popup = params.identifier;
        }

        // load thickbox
        tb_show("Shortcodes", ajaxurl + "?action=magee_shortcodes_popup&popup=" + popup + "&width=" + 800);

        jQuery('#TB_window').hide();
 })




jQuery('.alchem_shortcodes_textarea').on("click",function(){
			var id = jQuery(this).next().find("textarea").attr("id");
			jQuery('#alchem-shortcode-textarea').val(id);
		});																	   

jQuery('.alchem_shortcodes_list li a.alchem_shortcode_item').on("click",function(){
													  
  var obj       = jQuery(this);
  var shortcode = obj.data("shortcode");
  var form      = obj.parents("div#alchem_shortcodes_container form");
 
   jQuery.ajax({
		type: "POST",
		url: alchem_params.ajaxurl,
		dataType: "html",
		data: { shortcode: shortcode, action: "alchem_shortcode_form" },
		success:function(data){
	
		   form.find(".alchem_shortcodes_list").hide();
		   form.find("#alchem-shortcodes-settings").show();
		   form.find("#alchem-shortcodes-settings .current_shortcode").text(shortcode);
		   form.find("#alchem-shortcodes-settings-inner").html(data);
		}
		});
	
});

jQuery(".alchem-shortcodes-home").bind("click",function(){
            jQuery("#alchem-shortcodes-settings").hide();
		    jQuery("#alchem-shortcodes-settings-innter").html("");
		    jQuery(".alchem_shortcodes_list").show();
		   
		});
		
// insert shortcode into editor
jQuery(".alchem-shortcode-insert").bind("click",function(e){

    var obj       = jQuery(this);
	var form      = obj.parents("div#alchem_shortcodes_container form");
	var shortcode = form.find("input#alchem-curr-shortcode").val();

	jQuery.ajax({
		type: "POST",
		url: alchem_params.ajaxurl,
		dataType: "html",
		data: { shortcode: shortcode, action: "alchem_get_shortcode",attr:form.serializeArray()},
		
		success:function(data){
		
		jQuery.magnificPopup.close();
		form.find("#alchem-shortcodes-settings").hide();
		form.find("#alchem-shortcodes-settings-innter").html("");
		form.find(".alchem_shortcodes_list").show();
        form.find(".alchem-shortcode").val(data);
		if(jQuery('#alchem-shortcode-textarea').val() !="" ){
			var textarea = jQuery('#alchem-shortcode-textarea').val();
			if(textarea !== "undefined"){
		    var position = jQuery("#"+textarea).getCursorPosition();
			var content = jQuery("#"+textarea).val();
            var newContent = content.substr(0, position) + data + content.substr(position);
            jQuery("#"+textarea).val(newContent);
			
			}
			}else{
		window.alchem_wpActiveEditor = window.wpActiveEditor;
		// Insert shortcode
		window.wp.media.editor.insert(data);
		// Restore previous editor
		window.wpActiveEditor = window.alchem_wpActiveEditor;
		}
		},
		error:function(){
			jQuery.magnificPopup.close();
		// return false;
		}
		});
		// return false;
   });

 //preview shortcode

jQuery(".alchem-shortcode-preview").bind("click",function(e){

    var obj       = jQuery(this);
	var form      = obj.parents("div#alchem_shortcodes_container form");
	var shortcode = form.find("input#alchem-curr-shortcode").val();

	jQuery.ajax({
		type: "POST",
		url: alchem_params.ajaxurl,
		dataType: "html",
		data: { shortcode: shortcode, action: "alchem_get_shortcode",attr:form.serializeArray()},
		
		success:function(data){
      
		jQuery.ajax({type: "POST",url: alchem_params.ajaxurl,dataType: "html",data: { shortcode: data, action: "alchem_shortcode_preview"},	
		success:function(content){
			jQuery("#alchem-shortcode-preview").html(content);
	        tb_show(shortcode + " preview","#TB_inline?width=600&amp;inlineId=alchem-shortcode-preview",null);
			}
		});
	
		},
		error:function(){
			
		// return false;
		}
		});
		// return false;
   });


	// if clicked on import data button
	jQuery('.button-import-demo').live('click', function(e) {
														 
		var selected_demo = jQuery(this).data('demo-id');
		var loading_img = jQuery('.preview-'+selected_demo);
		var disable_preview = jQuery('.preview-all');

		if( selected_demo == 'classic' ) {
			var confirm = window.confirm('WARNING:\n\nImporting demo content will give you sliders, pages, posts, theme options, widgets, sidebars and other settings. This will replicate the live demo. Clicking this option will replace your current theme options and widgets. It can also take a minute to complete.\n\n-----------------------------------------------\n\nALCHEM CLASSIC DEMO REQUIREMENTS:\n\n Memory Limit of 256 MB and max execution time (php time limit) of 300 seconds.\n\n Revolution Slider and LayerSlider must be activated for sliders to import.\n\n Woocommerce must be activated for shop data to import.');
		} 
		if(confirm == true) {
			loading_img.show();
			disable_preview.show();

			var data = {
				action: 'magee_import_demo_data',
				demo_type: selected_demo
			};

			jQuery('.importer-notice').hide();

			jQuery.post(ajaxurl, data, function(response) {
												
				if( response && response.indexOf('imported') == -1 ) {
					jQuery('.importer-notice-1').attr('style','display:block !important');
				} else {
					jQuery('.importer-notice-2').attr('style','display:block !important');
				}
				loading_img.hide();
				disable_preview.hide();
			}).fail(function() {
				jQuery('.importer-notice-3').attr('style','display:block !important');
				loading_img.hide();
				disable_preview.hide();
			});
		}

		e.preventDefault();
	});

///// footer
 if(alchem_params.footer_sticky == '1'){
	 $('.fxd-footer').css({'margin-bottom':$('.fxd-footer .footer-info-area').outerHeight()});
	 }
	 
// backup theme options
 $(document).on('click','#alchem-backup-btn',function(){
		var backup_btn = $(this);
		backup_btn.append(' <i class="fa fa-spin fa-refresh"></i>');
		$('.alchem-backup-complete').hide();								   
		$.ajax({type: "POST",url: alchem_params.ajaxurl,dataType: "html",data: { action: "alchem_options_backup"},	
		success:function(content){
			$('.alchem-backup-complete').show();
            $('#alchem-backup-lists').append(content);
			backup_btn.find('i.fa ').remove();
			return false;
			}
		});											   
		return false;											 
   });
 // delete theme options backup
 $(document).on('click','#alchem-delete-btn',function(){
		 if(confirm("Are you sure you want to do this?")){
	     var key = $(this).data('key');								   
		$.ajax({type: "POST",url: alchem_params.ajaxurl,dataType: "html",data: { key:key,action: "alchem_options_backup_delete"},	
		success:function(content){
			$('#tr-'+key).remove();
			return false;
			}
		});											   
		return false;		
		 }
   });
 // restore theme options backup
 $(document).on('click','#alchem-restore-btn',function(){
		 if(confirm("Are you sure you want to do this?")){	
		 var restore_icon = $(this).find('.fa');
		 restore_icon.addClass('fa-spin');
		var key = $(this).data('key');								   
		$.ajax({type: "POST",url: alchem_params.ajaxurl,dataType: "html",data: { key:key,action: "alchem_options_backup_restore"},	
		success:function(content){
			restore_icon.removeClass('fa-spin');
			alert(content);
			return false;
			}
		});											   
		return false;
		}
   });
	 
	 
 });