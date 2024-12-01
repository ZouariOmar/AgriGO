$(document).ready(function() {
    // Attach an event listener to the search input
    $('#inputGroup').on('input', function() {
      // Get the search query
      var searchQuery = $(this).val().toLowerCase();
  
      // Hide all product items by default
      $('.product-layout').hide();
  
      // Loop through all the product items and show the ones that match the search query
      $('.product-layout').each(function() {
        var productTitle = $(this).find('.product_title a').text().toLowerCase();
        var productDetail = $(this).find('.caption p:first').text().toLowerCase();
        var productLocalisation = $(this).find('.caption p:last').text().toLowerCase();
  
        if (
          productTitle.includes(searchQuery) ||
          productDetail.includes(searchQuery) ||
          productLocalisation.includes(searchQuery)
        ) {
          $(this).show();
        }
      });
    });
  });