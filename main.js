var form = document.getElementById('form');
var action = form.getAttribute('action');
var container = document.getElementById('container');
var submit = document.getElementById('submit');

// function checkbox_border(event) {
//    var checkboxs = form.querySelectorAll('.border-side');
//    if (event.target.dataset.border == 'true') {
//       checkboxs.forEach(checkbox => {
//          checkbox.removeAttribute('disabled');
//       });
//    }
//    if (event.target.dataset.border == 'false') {
//       checkboxs.forEach(checkbox => {
//          checkbox.setAttribute('disabled', false);
//       });
//    }
// }

function displayErrors(errors) {
   var inputs = form.getElementsByTagName('input');
   [...inputs].forEach(input => {
      if (errors.indexOf(input.name) >= 0) {
         input.classList.add('error');
      }
   });

   var textareas = form.getElementsByTagName('textarea');
   [...textareas].forEach(textarea => {
      if(errors.indexOf(textarea.name) >=0) {
         textarea.classList.add('error');
      }
   });
}

function clearErrors() {
   var inputs = form.getElementsByTagName('input');
   [...inputs].forEach(input => {
      input.classList.remove('error');
   });

   var textareas = form.getElementsByTagName('textarea');
   [...textareas].forEach(textarea => {
      textarea.classList.remove('error');
   });
}

function sendForm(){
   clearErrors();

   // gather from data
   var form_data = new FormData(form);
   for ([key, value] of form_data.entries()) {
      // console.log(key + ': ' + value);
   }

   var xhr = new XMLHttpRequest();
   xhr.open('POST', action, true);
   xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
   xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
         var result = xhr.responseText;
         console.log(result);

         try {
            var json = JSON.parse(result);
            if(json.hasOwnProperty('errors') && json.errors.length > 0) {
               displayErrors(json.errors);
            }
         }
         catch(e) {
            container.insertAdjacentHTML('afterbegin', result);
            // add_post(json.post);
         }
      }
   }
   xhr.send(form_data);
}

submit.addEventListener('click', function(event){
   event.preventDefault();
   sendForm();
});

// document.addEventListener('change', checkbox_border);


var button = document.querySelector('.button');
button.addEventListener('click', function(){
   button.firstChild.classList.toggle('active');
   var panel = button.parentElement;
   panel.classList.toggle('show');
   // if(panel.classList.contains('show') == true) {
   //    var panelWidth = panel.offsetWidth;
   //    var container = document.getElementById('container');
   //    var containerWidth = container.offsetWidth;
   //    console.log(panelWidth);
   //    console.log(containerWidth);
   //    container.style.width = containerWidth - panelWidth;
   // }
});
