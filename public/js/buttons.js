//the coefficient of increasing the size of the button
var kIncreasing = 5;

function overTheButton(event) {
  event = event || window.event // cross - browser

  if (event.stopPropagation) {
    //W3C:
    event.stopPropagation()
  } else {
    //Internet Explorer:
    event.cancelBubble = true
  }

  if (event.preventDefault) {
    //W3C:
    event.preventDefault()
  } else {
    //Internet Explorer:
    event.returnValue = false
  }

var buttonMenu = document.querySelector('#' + event.target.id);

buttonMenu.style.width = (parseFloat(getComputedStyle(buttonMenu).width) + kIncreasing + 'px');
buttonMenu.style.height = (parseFloat(getComputedStyle(buttonMenu).height) + kIncreasing + 'px');
buttonMenu.style.fontSize = (parseFloat(getComputedStyle(buttonMenu).fontSize) + kIncreasing + 'px');
console.log(getComputedStyle(buttonMenu).fontSize);
}

function outTheButton(event) {
  event = event || window.event // cross - browser

  if (event.stopPropagation) {
    //W3C:
    event.stopPropagation()
  } else {
    //Internet Explorer:
    event.cancelBubble = true
  }

  if (event.preventDefault) {
    //W3C:
    event.preventDefault()
  } else {
    //Internet Explorer:
    event.returnValue = false
  }

  var buttonMenu = document.querySelector('#' + event.target.id);

  buttonMenu.style.width = (parseFloat(getComputedStyle(buttonMenu).width) - kIncreasing + 'px');
  buttonMenu.style.height = (parseFloat(getComputedStyle(buttonMenu).height) - kIncreasing + 'px');
  buttonMenu.style.fontSize = (parseFloat(getComputedStyle(buttonMenu).fontSize) - kIncreasing + 'px');
  console.log(getComputedStyle(buttonMenu).fontSize);
}
