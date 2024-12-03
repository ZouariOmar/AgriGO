$(document).ready(function() {

    $('#inputGroup').on('input', function() {
      var searchQuery = $(this).val().toLowerCase();
  
      $('.product-layout').hide();
  
      $('.product-layout').each(function() {
        var productTitle = $(this).find('.product_title a').text().toLowerCase();

  
        if (
          productTitle.includes(searchQuery)
        ) {
          $(this).show();
        }
      });
    });
  });