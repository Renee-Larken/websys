// homeworks.js by Tusa Larkowski to automatically update Homeworks page on Web Sys directory whenever solutions become available.

// Homework Updating
$(document).ready(function() {
  $.ajax({
    type: "GET",
    url: "../resources/homeworks.json",
    dataType: "json",
    success: function(responseData, status) {
      var output = '<p>Hint Number Dos: click on a homework link to see my solution to it.</p><br /><hr /><ul>';
      $.each(responseData.homeworks, function(i, hw) {
          output += '<li><a href="' + hw.link + '">' + hw.title + '</a>';
          output += '<p>' + hw.descr + '</p></li>';
      });
      output += '</ul><hr />';
      $("#content").html(output);}, 
    error: function(msg) {
      alert("There was a problem: " + msg.status + " " + msg.statusText);
    }
  });
});