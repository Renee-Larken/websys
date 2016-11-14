// labs.js by Tusa Larkowski to automatically update Labs page on Web Sys directory whenever solutions become available.

$(document).ready(function() {
  $.ajax({
    type: "GET",
    url: "../resources/labs.xml",
    dataType: "xml",
    success: function(responseData, status) {
      var output = '<p>Hint Numbero Uno: click on a lab link if you want to see my solution to it.</p><br /><hr /><ul>';
      $.each(responseData.resources, function(i, resource) {
          output += '';
      });
      output += '</ul><hr />';
      $("#content").html(output);}, 
    error: function(msg) {
      alert("There was a problem: " + msg.status + " " + msg.statusText);
    }
  });
});