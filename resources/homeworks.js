// homeworks.js by Tusa Larkowski to automatically update Homeworks page on Web Sys directory whenever solutions become available.

$(document).ready(function() {
  $.ajax({
    type: "GET",
    url: "../resources/homeworks.xml",
    dataType: "xml",
    success: function(responseData, status) {
      var output = '<p>Hint Number Dos: click on a homework link to see my solution to it.</p><br /><hr /><ul>';
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