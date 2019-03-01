filterSelection("all")
function filterSelection(c) {
	var x, i, n=0;
	x = document.getElementsByClassName("season-one");
	if (c == "all") c = "";
	// Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
	for (i = 0; i < x.length; i++) {
		w3RemoveClass(x[i], "show");
		if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
		if (x[i].className.indexOf(c) > -1) n++;
	}
	if (n) {
		document.getElementById("no-results-season-one").innerHTML = "";
	} else {
		document.getElementById("no-results-season-one").innerHTML = "No Results";
	}
}

filterSelection2("all")
function filterSelection2(c) {
	var x, i, n=0;
	var elementExists = document.getElementById("no-results-season-two");
	x = document.getElementsByClassName("season-two");
	if (elementExists) {
		if (c == "all") c = "";
		// Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
		for (i = 0; i < x.length; i++) {
			w3RemoveClass(x[i], "show");
			if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
			if (x[i].className.indexOf(c) > -1) n++;
		}
		if (n) {
			document.getElementById("no-results-season-two").innerHTML = "";
		} else {
			document.getElementById("no-results-season-two").innerHTML = "No Results";
		}
	} else {
		return;
	}
}



// Show filtered elements
function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {
      element.className += " " + arr2[i];
    }
  }
}

// Hide elements that are not selected
function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);
    }
  }
  element.className = arr1.join(" ");
}

// Add active class to the current control button (highlight it)
var btnContainer = document.getElementById("fb1");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
// Add active class to the current control button (highlight it)
var btnContainer2 = document.getElementById("fb2");
var btns2 = btnContainer2.getElementsByClassName("btn");
for (var i = 0; i < btns2.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
