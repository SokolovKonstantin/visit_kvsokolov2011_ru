function changeHandler(event) {
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

    // FileList object.
    var files = event.target.files;
    var file = files[0];

    var fileReader = new FileReader();
    // Read file asynchronously.
    fileReader.readAsDataURL(file); // fileReader.result -> URL.

    fileReader.onload = function(progressEvent) {
      var url = fileReader.result;
      var screenShot = document.getElementById(event.target.id + '-img');
      screenShot.src= url;
    }
}
