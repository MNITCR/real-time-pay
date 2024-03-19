<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Face Recognition</title>
  <!-- Include TensorFlow.js -->
  <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs"></script>
  <!-- Include Face-API.js -->
  <script src="https://cdn.jsdelivr.net/npm/@vladmandic/face-api@1/dist/face-api.js"></script>
</head>

<body>
  <h1>Face Recognition</h1>
  <video id="video" width="640" height="480" autoplay></video>
  <div id="matchedImageName"></div>
  <p id="result"></p>


  <script>
    // Function to start face recognition
    async function startFaceRecognition() {
      const video = document.getElementById('video');

      // Load Face-API.js models
      await faceapi.nets.ssdMobilenetv1.loadFromUri('https://raw.githubusercontent.com/justadudewhohacks/face-api.js/master/weights');
      await faceapi.nets.tinyFaceDetector.loadFromUri('https://raw.githubusercontent.com/justadudewhohacks/face-api.js/master/weights');
      await faceapi.nets.faceLandmark68Net.loadFromUri('https://raw.githubusercontent.com/justadudewhohacks/face-api.js/master/weights');
      await faceapi.nets.faceRecognitionNet.loadFromUri('https://raw.githubusercontent.com/justadudewhohacks/face-api.js/master/weights');

      // Start video stream from camera
      navigator.mediaDevices.getUserMedia({
          video: true
        })
        .then(stream => {
          video.srcObject = stream;
        })
        .catch(err => console.error('getUserMedia error: ', err));

      // Detect faces in the video stream
      video.addEventListener('play', async () => {
        // Define labeled face descriptors
        const labeledDescriptors = await loadLabeledDescriptors();

        // Run face recognition on each frame
        setInterval(async () => {
          const detections = await faceapi.detectAllFaces(video, new faceapi.TinyFaceDetectorOptions())
            .withFaceLandmarks()
            .withFaceDescriptors();

          if (detections.length > 0) {
            // Compare detected faces with known faces
            const matchedImageName = await matchFacesWithKnownFaces(detections, labeledDescriptors);
            // Display the matched image name
            displayMatchedImageName(matchedImageName);
            // Send the detected user name to PHP
            sendDataToPHP(matchedImageName);
          } else {
            displayMatchedImageName("No face detected");
          }
        }, 100);
      });
    }

    async function loadLabeledDescriptors() {
      // Fetch image paths from the PHP script using AJAX
      const response = await fetch('./php/loopImageUser.php');
      const fileNames = await response.json()

      // Load and process each image
      const labeledDescriptors = await Promise.all(fileNames.map(async fileName => {
        const nameWithoutExtension = fileName.split('.').slice(0, -1).join('.');
        const imagePath = `./asset/uploads/${fileName}`; // Construct full image path
        const response = await fetch(imagePath);
        const blob = await response.blob();
        const image = await faceapi.bufferToImage(blob);
        const detections = await faceapi.detectSingleFace(image).withFaceLandmarks().withFaceDescriptor();
        if (!detections) {
          throw new Error(`No face detected in ${imagePath}`);
        }
        return new faceapi.LabeledFaceDescriptors(nameWithoutExtension, [detections.descriptor]);
      }));
      return labeledDescriptors;
    }

    async function matchFacesWithKnownFaces(detections, labeledDescriptors) {
      for (const detection of detections) {
        const faceMatcher = new faceapi.FaceMatcher(labeledDescriptors);
        const bestMatch = faceMatcher.findBestMatch(detection.descriptor);
        if (bestMatch.label !== 'unknown' && bestMatch.distance < 0.6) {
          return bestMatch.label;
        }
      }
      return "No match found"; // Return if no match is found
    }

    function displayMatchedImageName(matchedImageName) {
      const matchedImageNameElement = document.getElementById('matchedImageName');
      matchedImageNameElement.textContent = `Matched Image Name: ${matchedImageName}`;
    }

    function sendDataToPHP(userName) {
      const xhr = new XMLHttpRequest();
      xhr.open("POST", "./php/tes1.php");
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.onload = function() {
        if (xhr.status === 200) {
          console.log("Response from PHP:", xhr.responseText);
          const response = JSON.parse(xhr.responseText);
          console.log("Success:", response.success);
          console.log("Message:", response.message);

          // Show success message if response was successful
          if (response.success) {
            document.getElementById("result").innerText =
              "Success: " + response.message;
            setTimeout(function() {
              location.replace("./");
            }, 2000);
          } else {
            document.getElementById("result").innerText = response.message;
            setTimeout(function() {
              location.replace("login");
            }, 2000);
          }
        } else {
          console.error("Error:", xhr.statusText);
        }
      };
      // Send the user name to PHP
      xhr.send("userName=" + encodeURIComponent(userName));
    }

    // Start face recognition when the page loads
    document.addEventListener('DOMContentLoaded', startFaceRecognition);
  </script>
</body>

</html>
