window.onload = function() {

  document.querySelector('#preloadPage').style.display = 'none';
  sleep(250);
  document.querySelector('#site-pages').style.display = 'flex';


//-------------Отправка формы пароля--------------------------------
document.querySelector('#signIn-button').onclick = (event) => {

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

  let form   = document.querySelector('#form_authentication');
  
  form.submit();
}




};

function sleep(milliseconds) {
  const date = Date.now();
  let currentDate = null;
  do {
    currentDate = Date.now();
  } while (currentDate - date < milliseconds);
}
