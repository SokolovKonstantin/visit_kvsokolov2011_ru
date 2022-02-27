
window.onpageshow = function() {
  document.querySelector('#preloadPage').style.display = 'none';
  sleep(250);
  document.querySelector('#site-pages').style.display = 'flex';
};


window.onload = function() {
  var menuClick = new Audio('/mySound/zvuk11.ogg');
  document.querySelector('#preloadPage').style.display = 'none';
  sleep(250);
  document.querySelector('#site-pages').style.display = 'flex';

const buttonMenu = document.querySelectorAll('.menu');
for (let i = 0; i < buttonMenu.length; i++) {

  buttonMenu[i].onclick = (event) => {

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

    menuClick.play();
    sleep(250);

    console.log(event.target.id);

    document.querySelector('#preloadPage').style.display = 'flex';
    document.querySelector('#site-pages').style.display = 'none';
    document.location.href = event.target.id;
  }

}

document.querySelector('#send-message').onclick = () => {
  menuClick.play();
  sleep(250);
  };



};

var menuClick = new Audio('/mySound/zvuk11.ogg');

function sleep(milliseconds) {
  const date = Date.now();
  let currentDate = null;
  do {
    currentDate = Date.now();
  } while (currentDate - date < milliseconds);
}
