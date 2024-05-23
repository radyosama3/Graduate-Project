function redirectToWebsite() {
   
    window.location.href = '../LMS_doctor/upload.html';
}

// Add click event listener to all icons
var icons = document.getElementsByClassName('icon');
for (var i = 0; i < icons.length; i++) {
    icons[i].addEventListener('click', redirectToWebsite);
}
function redirectToWebsite1() {
   
    window.location.href = '../LMS_doctor/assignment.html';
}

