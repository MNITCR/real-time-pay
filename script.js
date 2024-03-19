<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Face Detection</title>
    <!-- Include TensorFlow.js -->
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs"></script>
  </head>
  <body>
    <h1>Face Detection</h1>
    <video id="video" width="640" height="480" autoplay></video>
    <script>
      // Function to start face detection
      async function startFaceDetection() {
        const video = document.getElementById("video");

        // Load Face-API.js dynamically
        const faceApiScript = document.createElement("script");
        faceApiScript.src =
          "https://cdn.jsdelivr.net/npm/@vladmandic/face-api@1/dist/face-api.js";
        faceApiScript.onload = async () => {
          // Load Face-API.js models
          await faceapi.nets.tinyFaceDetector.loadFromUri(
            "https://raw.githubusercontent.com/justadudewhohacks/face-api.js/master/weights"
          );

          // Start video stream from camera
          navigator.mediaDevices
            .getUserMedia({ video: true })
            .then((stream) => {
              video.srcObject = stream;
            })
            .catch((err) => console.error("getUserMedia error: ", err));

          // Detect faces in the video stream
          video.addEventListener("play", () => {
            setInterval(async () => {
              const detections = await faceapi.detectAllFaces(
                video,
                new faceapi.TinyFaceDetectorOptions()
              );
              console.log(detections); // Print detections to console
            }, 100);
          });
        };
        document.head.appendChild(faceApiScript);
      }

      // Start face detection when the page loads
      document.addEventListener("DOMContentLoaded", startFaceDetection);
    </script>
  </body>
</html>
