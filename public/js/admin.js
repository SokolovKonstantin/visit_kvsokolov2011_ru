
window.onload = function() {

  document.querySelector('#preloadPage').style.display = 'none';
  sleep(250);
  document.querySelector('#site-pages').style.display = 'flex';

  document.querySelector('#site-visit-statistic').style.display = 'none';
  document.querySelector('#message').style.display = 'none';
  document.querySelector('#information-about-me').style.display = 'none';
  document.querySelector('#skill-variables').style.display = 'none';
  document.querySelector('#skills').style.display = 'none';
  document.querySelector('#interests').style.display = 'none';
  document.querySelector('#services').style.display = 'none';
  document.querySelector('#resources').style.display = 'none';
  document.querySelector('#educationAdmin').style.display = 'none';
  document.querySelector('#coursesAdmin').style.display = 'none';
  document.querySelector('#projects').style.display = 'none';
  document.querySelector('#work-experience').style.display = 'none';
  document.querySelector('#login').style.display = 'none';

const adminMenu = document.querySelectorAll('.admin-menu');
adminMenu.forEach(function(adminFunc) {
  adminFunc.onclick = function(event) {

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

    buttonClick.play();

    var pageId = document.querySelector('#' + event.target.id);

    switch (pageId.id) {
      case 'my-statistic-admin':
        if (document.querySelector('#site-visit-statistic').style.display=='none') {
          document.querySelector('#site-visit-statistic').style.display = 'flex';
          document.querySelector('#site-visit-statistic').scrollIntoView(top);
        } else {
          document.querySelector('#site-visit-statistic').style.display = 'none';
        }
        break;
      case 'my-feedback-admin':
        if (document.querySelector('#message').style.display=='none') {
          document.querySelector('#message').style.display = 'flex';
          document.querySelector('#message').scrollIntoView(top);
        } else {
          document.querySelector('#message').style.display = 'none';
        }
        break;
      case 'info-about-me-admin':
        if (document.querySelector('#information-about-me').style.display=='none') {
          document.querySelector('#information-about-me').style.display = 'flex';
          document.querySelector('#information-about-me').scrollIntoView(top);
        } else {
          document.querySelector('#information-about-me').style.display = 'none';
        }
        break;
      case 'variables-admin':
        if (document.querySelector('#skill-variables').style.display=='none') {
          document.querySelector('#skill-variables').style.display = 'flex';
          document.querySelector('#skill-variables').scrollIntoView(top);
        } else {
          document.querySelector('#skill-variables').style.display = 'none';
        }
        break;
      case 'my-skills-admin':
        if (document.querySelector('#skills').style.display=='none') {
          document.querySelector('#skills').style.display = 'flex';
          document.querySelector('#skills').scrollIntoView(top);
        } else {
          document.querySelector('#skills').style.display = 'none';
        }
        break;
      case 'my-interests-admin':
        if (document.querySelector('#interests').style.display=='none') {
          document.querySelector('#interests').style.display = 'flex';
          document.querySelector('#interests').scrollIntoView(top);
        } else {
          document.querySelector('#interests').style.display = 'none';
        }
        break;
      case 'my-services-admin':
        if (document.querySelector('#services').style.display=='none') {
          document.querySelector('#services').style.display = 'flex';
          document.querySelector('#services').scrollIntoView(top);
        } else {
          document.querySelector('#services').style.display = 'none';
        }
        break;
      case 'my-links-admin':
        if (document.querySelector('#resources').style.display=='none') {
          document.querySelector('#resources').style.display = 'flex';
          document.querySelector('#resources').scrollIntoView(top);
        } else {
          document.querySelector('#resources').style.display = 'none';
        }
        break;
      case 'my-education-admin':
        if (document.querySelector('#educationAdmin').style.display=='none') {
          document.querySelector('#educationAdmin').style.display = 'flex';
          document.querySelector('#educationAdmin').scrollIntoView(top);
        } else {
          document.querySelector('#educationAdmin').style.display = 'none';
        }
        break;
      case 'my-courses-admin':
        if (document.querySelector('#coursesAdmin').style.display=='none') {
          document.querySelector('#coursesAdmin').style.display = 'flex';
          document.querySelector('#coursesAdmin').scrollIntoView(top);
        } else {
          document.querySelector('#coursesAdmin').style.display = 'none';
        }
        break;
      case 'my-projects-admin':
        if (document.querySelector('#projects').style.display=='none') {
          document.querySelector('#projects').style.display = 'flex';
          document.querySelector('#projects').scrollIntoView(top);
        } else {
          document.querySelector('#projects').style.display = 'none';
        }
        break;
      case 'my-experience-admin':
        if (document.querySelector('#work-experience').style.display=='none') {
          document.querySelector('#work-experience').style.display = 'flex';
          document.querySelector('#work-experience').scrollIntoView(top);
        } else {
          document.querySelector('#work-experience').style.display = 'none';
        }
        break;
      case 'my-password-admin':
        if (document.querySelector('#login').style.display=='none') {
          document.querySelector('#login').style.display = 'flex';
          document.querySelector('#login').scrollIntoView(top);
        } else {
          document.querySelector('#login').style.display = 'none';
        }
        break;
      default:
    }
  };
});




const buttonSubmitClass = document.querySelectorAll('.button-submit');

buttonSubmitClass.forEach( (buttonSubmit) => {

    buttonSubmit.onclick = (event) => { buttonClick.play()};
});

var buttonClick = new Audio('/mySound/zvuk11.ogg');

document.querySelector('#button_change_password').onclick = () => {
  if (document.querySelector('#new_login_change_password').value === '') {
    return alert('Новый логин пуст!');
  }

  if(document.querySelector('#new_password_one_change_password').value !==
    document.querySelector('#new_password_two_change_password').value) {
      return alert('Пароли не совпадают!');
    }
  document.querySelector('#form_change_password').submit();
};




};

function sleep(milliseconds) {
  const date = Date.now();
  let currentDate = null;
  do {
    currentDate = Date.now();
  } while (currentDate - date < milliseconds);
}
