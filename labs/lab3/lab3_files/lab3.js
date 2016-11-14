//JS - Tusa Larkowski

/*Part 1 - General Iteration Using Recursion*/
var hDoc = document.getElementsByTagName("html")[0];
var result = domWave(hDoc, 0);
document.getElementById("info").innerHTML = result;

function domWave(currNode, level) {
    // Checking to see if this is a node to be considered (not a comment or plain text or attribute).
    if (currNode.nodeType == 1) {
        var str = "";

        for (var i = 0; i < level; i++) {
            str += "=";
        }

        str += currNode.tagName + "\n";

        // Here"s where the recursion comes in.
        for (var j = 0; j < currNode.childNodes.length; j++) {
            var child = domWave(currNode.childNodes[j], level + 1);

            if (child != null && child != "") {
                str += child;
            }
        }

        return str;
    }
    // Return nothing because you don"t need whitespace bringing up stuff.
    else {
        return null;
    }
}

/*Part 2 - Clicking to initiate Recursive Pop-Up Screens*/
var myElements = document.getElementsByTagName("*");

for (var k = 0; k < myElements.length; k++) {
    myElements[k].addEventListener("dblclick", function() {
        document.getElementById("backdrop").style.display = "block";
        
        var tagItem = document.createElement("span");
        var textTag = document.createTextNode("You are in a " + this.tagName + " node.");
        tagItem.appendChild(textTag);
        document.getElementById("customDial").appendChild(tagItem);

        return false;
    });
}

/*Part 3 - Adding another element to the DOM and placing mouseover events*/
// Collect all elements with class "quote".
var quotes = document.getElementsByClassName("quote");

// Loop through and give them their event listeners.
for (var l = 0; l < quotes.length; l++) {
    quotes[l].addEventListener("mouseover", function() {
        this.style.paddingLeft = "35px";
        this.style.paddingRight = "35px";
        this.style.backgroundColor = "#63C7B2";

        return false;
    });
    quotes[l].addEventListener("mouseout", function() {
        this.style.paddingLeft = "25px";
        this.style.paddingRight = "25px";
        this.style.backgroundColor = "#80CED7";

        return false;
    });
}

// And clone the first one.
var quoteCln = quotes[0];
document.body.appendChild(quoteCln);