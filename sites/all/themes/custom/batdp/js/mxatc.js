/*
  This is the javascript file that will contain all the custom javascript code that you will be writing to customize the interactivity of the Apigee developer portal.
*/

/*
function selectProduct(_this, id, effect) {

  jQuery('.btn-product').parent().find('i').removeClass('glyphicon-ok').addClass('glyphicon-unchecked');
  jQuery(_this).parent().find('i').removeClass('glyphicon-unchecked').addClass('glyphicon-ok');

  if (document.getElementById("box-"+id)) {
    var boxId = "#box-"+id;

    if (!jQuery('#collapse-'+id).hasClass('in')) {
      jQuery('.panel-products').slideUp(200).removeClass('in').addClass('collapse');
      jQuery('#collapse-'+id).slideDown(200).addClass('in');
      jQuery('.product-grid').removeClass('product-selected');
      jQuery(boxId).addClass('product-selected');
    }

    jQuery("#edit-api-product-prod-"+id).trigger('click');

    if (typeof effect == 'boolean') {
      jQuery('html, body').animate({
        scrollTop: jQuery('#heading-'+id).offset().top - 225
      }, 300);
    }

  }
*/

var totalProducts = 0;

function getUrlVars(){
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');

    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }

    return vars;
}

function getUrlVar(name){
    var vars = getUrlVars();
    return vars[name];
}

function removeProduct(_this, id) {
  jQuery(_this).parent().remove();
  jQuery("#edit-api-product-prod-"+id).prop('checked', false);
  jQuery("#edit-product-search").focus();
  rdksPipe('products').unset(id);

  if (totalProducts > 0) {
    totalProducts--;

    if (totalProducts == 0) {
      jQuery("#edit-actions").hide();
    }
  }
}

function storeProduct(id) {
  if (jQuery.trim(id) != '') {
    rdksPipe('products').set(id);
  }
}

function selectProduct(id, effect) {
  if (document.getElementById('edit-api-product-prod-'+id)) {
    if (!jQuery("#edit-api-product-prod-"+id).is(':checked')) {
      totalProducts++;
      jQuery("#edit-actions").show();
      var id,
          desc = jQuery("#desc-api-product-prod-"+id).text(),
          title = jQuery("#edit-api-product-prod-"+id).val();
          title = title.substring(5);
          id = title.replace(/[\s_]+/g, '-');
          id = id.toLowerCase();

      var card = '' +
        '<div id="card-'+id+'" class="product-card" data-toggle="tooltip" data-container="#card-'+id+'" data-placement="top" title="'+desc+'">' +
         '<a onclick="removeProduct(this,\''+id+'\');">' +
            '<span><i class="glyphicon glyphicon-remove"></i></span>' +
          '</a>'+
          title +
        '</div>';

      jQuery("#added-products").append(card);
      jQuery('[data-toggle="tooltip"]').tooltip();
      storeProduct(id);

      jQuery('html, body').animate({
        scrollTop: jQuery('#added-products').offset().top - 225
      }, 300);

    }
    jQuery("#edit-api-product-prod-"+id).prop('checked', true);

  }

  jQuery("#edit-product-search").focus();
  jQuery("#product-loader").hide();

}

function onChangeProduct(_this) {
  var id = jQuery(_this).val();
      id = id.toLowerCase();
      id = id.replace(/\s/g,'-');
      id = id.replace(/_/g,'-');

    //selectProduct(jQuery('#heading-'+id), id, true);
    selectProduct(id, true);

    jQuery(_this).val('');
}

function searchProduct(title) {
  jQuery('html, body').animate({
    scrollTop: jQuery("#edit-product-search").offset().top - 225
  }, 300);

  jQuery("#edit-product-search").val(title);
  jQuery("#edit-product-search").trigger({type: 'keyup',  which: ".".charCodeAt(0)});

  jQuery(".dropdown").on('click', 'li > a', function(e){
    onChangeProduct("#edit-product-search");
  });

}

(function($){ // modified so that it doesn't do anything

  var _scrollInit = false,
      _scrollDown = true,
      _scrollUp = true;

  $( window ).scroll(function() {
    var top = $(this).scrollTop();

    if (top > 75) {
      _scrollInit = true;

      if (_scrollDown) {
        _scrollUp = true;
        _scrollDown = false;
        $(".logo-pg > img").stop().animate({width: 65, height: 40, left: 40, top: -5}, 200);
        $(".top-menu").stop().animate({height: 25}, 200);
        $('#navbar').addClass('sticky');
      }

    } else {

      if (_scrollUp && _scrollInit) {
        _scrollUp = false;
        _scrollDown = true;
        $(".logo-pg > img").stop().animate({width: 65, height: 40, left: 40,top: -5}, 200);
        $(".top-menu").stop().animate({height: 25}, 200);
        $('#navbar').removeClass('sticky');
      }
    }
  });

  $(document).ready(function(){

    $(".panel-smartdocs").on('click', function(){
      var id = $(this).attr('data-id');

      if ($(id).hasClass('in')) {
        $(id).slideUp(200, function(){
          $(this).removeClass('in');
        });
      } else {
        $(".panel-collapse").slideUp(200, function(){
          $(this).removeClass('in');
        });
        $(id).slideDown(200).addClass('in');
      }

    });

    rdksPipe('products').init(true);

    storeProduct(getUrlVar('product'));

    var products = rdksPipe('products').get();
    $.each(products, function(k, product){
      selectProduct(product);
    });

    //$(".product-headline:first").find('a').trigger('click');
    $("#edit-actions").hide();

    $("#edit-product-search")
    .keyup(function(){
      var value = $(this).val();
          value = $.trim(value);
      if (value.length >= 3) {
        $("#product-loader").show();
      } else {
        $("#product-loader").hide();
      }
    });

    $("#edit-product-search").on('change', function(){
      onChangeProduct(this);
    });

    $("ul.list-group > .list-group-items").click(function() {
      var id=$(this).attr("data-id");
      $('html, body').animate({
        scrollTop: $(id).offset().top -85
      }, 200);
    });

    $(".pg-stepper__step--active").click(function(){
        window.location = $(this).find("a:first").attr("href");
        return false;
    });

    

  });
})(jQuery);
