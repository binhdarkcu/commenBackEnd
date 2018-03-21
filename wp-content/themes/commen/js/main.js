var Main = (function() {
   function loadPopupProduct(productID){
        console.log(productID);
      let data = {};
      if(productID){
          data.action ='tk_load_data_product_popup';
          data.productID = productID;
           $.ajax({
            url:TK_VARS.AJAX_URL,
            type:'post',
            data:data,
            dataType: 'json',
            beforeSend:function(){
               console.log('loading');
            },
            success: function( response ) {
            	 console.log(response);
                if(response && response.error == 0){
                     alert(response.msg);
                }else{
                    console.log(response);
                }
               
            }
        });
      }
   }
   function init(){
     $( ".single_variation_wrap" ).on( "show_variation", function ( event, variation ) {
               console.log(variation);
      } );
   }

   return{
      init:init,
   	  loadPopupProduct:loadPopupProduct,

   };

})();

$(document).ready( function() {
	   Main.init();
      var slickInit = $("[data-slick]");
      if (slickInit.length > 0) {
            slickInit.slick({
                responsive: [
                    {
                        breakpoint: 770,
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ]
            });
        }
      var slick_one = $("[data-slick-one]");
        if (slick_one.length > 0) {
            slick_one.slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                fade: true,
                cssEase: true,
                speed: 500,
                dots: false,
                arrows: false,
                autoplay: true,
                autoplaySpeed: 4000
            });
        }
});