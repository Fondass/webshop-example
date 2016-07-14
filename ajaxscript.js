/* 
 * 
 * 
 * 
 */




    
    function fonJSitemLike(itemid)
    {
        
        var $itemid = itemid;
        
        $.ajax({ url: 'index.php',     // url of the script to be called server side
         data: {ajaxaction: 'test', item: $itemid},    // action that should be called in the controller
         datatype: 'html',          // type of data,
         type: 'post',              // is it a GET or a POST
         success: function(likes)    // Thing that should happen on succes with the data retrieved.
                   {
                      $(document).alert(likes);   
                   }
            });
    };
    

 




