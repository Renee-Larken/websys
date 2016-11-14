// Playlist JS by Tusa Larkowski
// Coded for Lab 4 to implement automate song additions and current song info to list.

var emptyImage = document.getElementById("nothingHere");

emptyImage.addEventListener("click", function() {
  $.ajax({
    type: "GET",
    url: "resources/songs.json",
    dataType: "json",
    success: function(responseData, status) {
      var output = '<h1>A Couple of Favorites</h1><ul>';

      $.each(responseData.songs, function(i, song) {
          output += '<li><a href="' + song.albumLink + '"><img src="' + song.albumArt + '" width="115" height="115" alt="album art"/></a>';
          output += '<p class="title">' + song.title + '</p>';
          output += '<p>' + song.artist + '</p>';
          output += '<p>album: ' + song.album + '</p>';
          output += '<p>rel: ' + song.date + '</p>';
          output += '<p>genres: ' + song.genres + '</p></li>';
      });

      output += '</ul><span>End of Favorites List - Created by a Lark</span>';

      $("#musicList").html(output);
    }, error: function(msg) {
      alert("There was a problem: " + msg.status + " " + msg.statusText);
    }
  });

  return false;
});