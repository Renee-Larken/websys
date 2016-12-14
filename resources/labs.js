// labs.js by Tusa Larkowski to automatically update Labs page on Web Sys directory whenever solutions become available.

// Lab Updating
$(document).ready(function() {
  $.ajax({
    type: "GET",
    url: "../resources/labs.json",
    dataType: "json",
    success: function(responseData, status) {
      var output = '<ul>';
      $.each(responseData.labs, function(i, lab) {
          output += '<li><a href="' + lab.link + '">' + lab.title + '</a>';
          output += '<p>' + lab.descr + '</p></li>';
      });
      output += '</ul>';
      $("#content").html(output);}, 
    error: function(msg) {
      alert("There was a problem: " + msg.status + " " + msg.statusText);
    }
  });
});