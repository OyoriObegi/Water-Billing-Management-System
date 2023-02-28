// Meter Reading Page
const video = document.getElementById('video');
const canvas = document.getElementById('canvas');
const startbutton = document.getElementById('startbutton');
const submitReading = document.getElementById('submit-reading');
const meterReading = document.getElementById('meter-reading');

// Get access to the camera
navigator.mediaDevices.getUserMedia({ video: true })
  .then(function (stream) {
    video.srcObject = stream;
  })
  .catch(function (err) {
    console.log("Error: " + err);
  });

// Take a picture
startbutton.addEventListener('click', function () {
  canvas.width = video.videoWidth;
  canvas.height = video.videoHeight;
  canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
  meterReading.value = canvas.toDataURL('image/png');
});

// Submit the meter reading
submitReading.addEventListener('click', function (event) {
  event.preventDefault();
  // Send the meter reading to the server
  // using AJAX or fetch API
});
