const scanner = new Instascan.Scanner({
  video: document.getElementById("qr-video"),
});

scanner.addListener("scan", function (content) {
  console.log("QR Code detected:", content);
  sendDataToPHP(content);
});

Instascan.Camera.getCameras()
  .then(function (cameras) {
    if (cameras.length > 0) {
      scanner.start(cameras[0]);
    } else {
      console.error("No cameras found.");
    }
  })
  .catch(function (err) {
    console.error("Error accessing the camera:", err);
  });

function sendDataToPHP(data) {
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "./php/authenticate.php");
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onload = function () {
    if (xhr.status === 200) {
      console.log("Response from PHP:", xhr.responseText);
      document.getElementById("result").innerText = xhr.responseText;

      setTimeout(function () {
        location.replace("./");
      }, 2000);
    } else {
      console.error("Error:", xhr.statusText);
    }
  };
  xhr.send("data=" + encodeURIComponent(data));
}
