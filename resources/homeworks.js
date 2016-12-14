// homeworks.js by Tusa Larkowski to automatically update Homeworks page on Web Sys directory whenever solutions become available.

// Homework Updating
$(document).ready(function() {
  $.ajax({
    type: "GET",
    url: "../resources/homeworks.json",
    dataType: "json",
    success: function(responseData, status) {
      var output = '<ul>';
      $.each(responseData.homeworks, function(i, hw) {
          output += '<li><a href="' + hw.link + '">' + hw.title + '</a>';
          output += '<p>' + hw.descr + '</p></li>';
      });
      output += '</ul>';
      $("#content").html(output);}, 
    error: function(msg) {
      alert("There was a problem: " + msg.status + " " + msg.statusText);
    }
  });
});