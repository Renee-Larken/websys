==========================================================
>>>>> Web Systems Lab 6 - Tusa Larkowski
==========================================================

* For both the cubic and factorial functions, I've required that both things need to be filled in to perform the function (which is a little counter-intuitive, but all the same).

* Added span tags to Cubic and Factorial functions.

==========================================================
Questions:

Explain what each of your classes and methods does, the order in which methods are invoked, and the flow of execution after one of the operation buttons has been clicked.

>> In order (excluding the Addition class), my subtraction class subtracts the two input values, the multiplication returns the product of them, the division returns the quotient, and the cubic and factorial functions perform their respective operations on each value, store it in an array and returns it (the values of which are then referenced in the printing statement in order). So, whenever a button is clicked, it's similarly-named function calls its printing statement, which calls its expression statement and calculates the values to be output.

Also explain how the application would differ if you were to use $_GET, and why this may or may not be preferable.

>> If I had used $_GET instead, the variables would have shown up in the URL of the page, allowing me to bookmark and come back to the page. Its use here would signal that the information is most likely non-confidential (which in this case it's not). It also would not have required the use of a form as no information is actually being submitted - just manipulated and spit back out. For a simple calculator function, this would have definitely been preferable as it doesn't necessarily require the switching between front-end and back-end processes.

Finally, please explain whether or not there might be another (better +/-) way to determine which button has been pressed and take the appropriate action.

>> Another way to determine if a button has been pushed would be the using the help of JavaScript and if statements to run through which button has been pressed and call the appropriate function.

==========================================================