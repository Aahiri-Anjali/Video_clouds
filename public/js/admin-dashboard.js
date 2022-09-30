$(document).ready(function() {
  // Get current page URL
  var url = window.location.href;
  // remove # from URL
  url = url.substring(0, (url.indexOf("#") == -1) ? url.length : url.indexOf("#"));
  // remove parameters from URL
  url = url.substring(0, (url.indexOf("?") == -1) ? url.length : url.indexOf("?"));
  // select filename
  url = url.substr(url.lastIndexOf("/") + 1);

  // Loop all menu items
  $('.navbar-nav li').each(function(){
     // select href
     var href = $(this).find('a').attr('href');
     // Check filename
     if(url == href){
        // Add class
        $(this).addClass('active');
     }
  });
});

