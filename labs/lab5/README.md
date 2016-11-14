==========================================================
>>>>> Web Systems Lab 5 - Tusa Larkowski
==========================================================

* It wasn't too complicated of an adjustment, and it seems like a very effective method of handling event listening to long lists of items.

** 1st optimization: since the javascript at the beginning of the document already generates all of the list items, I 
** 2nd optimization: I actually decided to move the JS to another separate file that could be loaded at the end of the document - this way, the page itself can load beforehand and give the users something to look at if the JS needs more than a second or two to do the same.
** 3rd optimization: I also moved all styling options over to a separate CSS file for the same reasons and for the sake of better semantics.
** 4th optimization: Minimizing the JS and CSS files means less space needs to be set aside and loaded (as whitespace even in the code is also delivered - whether or not it affects anything). As a result, my JS and CSS files might not be as readable as when they first started out.
** 5th optimization: The last method of optimization was using image hosting sites to host my images - freeing up space on my own virtual server without sacrificing image usage.

==========================================================
Special Notes:
- I went ahead and changed the generated li texts with something I thought suited the theme a bit more. The CSS also adds additional text based on whether it's the first, second, or third element.

==========================================================
Resources:

https://javascript-minifier.com/
https://cssminifier.com/
http://japanlover.me/kawaii/goodies/
https://fonts.google.com/
http://stackoverflow.com/questions/17069435/center-fixed-div-with-dynamic-width-css
https://css-tricks.com/almanac/properties/s/scrollbar/