

jQuery(document).ready(function($){

    console.warn(jQuery.fn.jquery);
    console.log("IN DOC READY");
    
    var searchContents = $('#keyword').val();
    var anyCatsChecked = false;
    var anyCatsChecked = checkForCatChecks();

    var anyTagsChecked = false;
    var anyTagsChecked = checkForTagChecks();

    if(typeof searchContents !== "undefined" && searchContents !=""){
        ajaxCall();
    }
    
    if(anyCatsChecked == true){
        
        ajaxCall();
    }

    if(anyTagsChecked == true){
        
        ajaxCall();
    }

function checkForCatChecks(){
  
    var ischecked=false;
    var checkboxes = $('.cat-list-item');
    checkboxes.each(function(i, obj) {
        if ($(this).prop("checked")) {
     
            ischecked = true;
        } 
    });
    return ischecked;
}

function checkForTagChecks(){
  
    var ischecked=false;
    var checkboxes = $('.tag-list-item');
    checkboxes.each(function(i, obj) {
        if ($(this).prop("checked")) {
         
            ischecked = true;
        } 
    });
    return ischecked;
}
     

jQuery('.cat-list-item').on('change', function() {   
    ajaxCall();   
});


jQuery('.search-box').on('keyup', function(){
    ajaxCall();
});

function getCategoryKeywords(){

    var divider = "+";
    if ($("#cat-additive").prop("checked")) {
        divider=","  
    }
    else{
        divider="+" 
    }
    

    var output = "";
    $('.cat-list-item:checkbox:checked').each(function(i, obj) {
        if(i==0){
            output = $(this).val();  
        }
        else{
            output = output + divider + $(this).val();
        }
        
        console.log(output);
    });
    
     return output;
}

function getTagKeywords(){

    var divider = "+";
    if ($("#tag-additive").prop("checked")) {
        divider=","  
    }
    else{
        divider="+" 
    }
    

    var output = "";
   $('.tag-list-item:checkbox:checked').each(function(i, obj) {
        if(i==0){
            output = $(this).val();  
        }
        else{
            output = output + divider + $(this).val();
        }
        
        console.log(output);
    });
    
     return output;
}


function ajaxCall(){

    var search = jQuery('#keyword').val();
    var category = getCategoryKeywords();
    console.log("keyword:"+ search+ " category:"+category);


    jQuery.ajax({
      type: 'POST',
      url: '/wp-admin/admin-ajax.php',
      dataType: 'html',
      data: {
        action: 'filter_projects',
        category: category,
        s: search
       
      },
      success: function(res) {
        jQuery('.project-tiles').html(res);
        console.log(res);
      }
    });

   //$("html, body").animate({ scrollTop: $("#main-header").offset.top }, "2000");
    jQuery('html, body').animate({
        scrollTop: $("#main-header").offset().top -40
    }, 500);
  }
});