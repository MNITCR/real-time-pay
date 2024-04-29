$(document).ready(function () {
  // Function to hide the modal and stop the camera stream
  $("#HideScanQrNav-modal").click(function () {
    $("#ScanQrNav-modal").addClass("hidden");
    stopCamera();
  });

  // start scanning when click on button scan qr code nav
  const scannerButton = document.getElementById("scan-qr-button");
  scannerButton.addEventListener("click", function (e) {
    $("#ScanQrNav-modal").removeClass("hidden");
    startScanning();
  });

  let videoStream;

  // Start scanning
  function startScanning() {
    const videoContainer = document.getElementById("video-container");

    navigator.mediaDevices
      .enumerateDevices()
      .then((devices) => {
        const videoDevices = devices.filter(
          (device) => device.kind === "videoinput"
        );

        let selectedDeviceId;
        for (const device of videoDevices) {
          if (
            device.label.toLowerCase().includes("back") ||
            device.label.toLowerCase().includes("rear")
          ) {
            selectedDeviceId = device.deviceId;
            break;
          }
        }

        const constraints = {
          video: {
            deviceId: { exact: selectedDeviceId },
          },
        };

        navigator.mediaDevices
          .getUserMedia(constraints)
          .then((stream) => {
            videoStream = stream;
            const video = document.createElement("video");
            video.srcObject = stream;
            video.setAttribute("playsinline", true);
            video.play();
            video.addEventListener("loadedmetadata", () => {
              const canvas = document.createElement("canvas");
              const context = canvas.getContext("2d");
              canvas.width = video.videoWidth;
              canvas.height = video.videoHeight;
              videoContainer.appendChild(video);

              // QR Code scanning
              setInterval(() => {
                context.drawImage(video, 0, 0, canvas.width, canvas.height);
                const imageData = context.getImageData(
                  0,
                  0,
                  canvas.width,
                  canvas.height
                );
                const code = jsQR(
                  imageData.data,
                  imageData.width,
                  imageData.height,
                  {
                    inversionAttempts: "dontInvert",
                  }
                );

                if (code) {
                  // alert("QR Code detected: " + code.data);
                  sendDataFromScanQRNav(code.data);
                  // You can do something with the scanned data here
                }
              }, 1000);
            });
          })
          .catch((error) => {
            console.error("Error accessing camera: ", error);
          });
      })
      .catch((error) => {
        console.error("Error enumerating devices: ", error);
      });
  }

  // Function to stop the camera stream
  function stopCamera() {
    if (videoStream) {
      videoStream.getTracks().forEach((track) => track.stop());
      const video = document.querySelector("video");
      if (video) {
        video.remove();
      }
    }
  }

  // function send data to qr code
  function sendDataFromScanQRNav(data) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "./php/FetchDataFromScanNav.php");
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = function () {
      if (xhr.status === 200) {
        // console.log("Response from PHP:", xhr.responseText);
        const response = JSON.parse(xhr.responseText);

        // Show success message if response was successful
        if (response.success) {
          document.getElementById("result").innerText =
            "Success: " + response.message;

          // convert data to object
          const qrDataString = `${data}`;
          const qrDataObject = JSON.parse(qrDataString);
          console.log(qrDataObject);
          const transformedData = {};
          for (const key in qrDataObject) {
            if (qrDataObject.hasOwnProperty(key)) {
              transformedData[key] = qrDataObject[key];
            }
          }

          var realAccountNumberUSD;
          var realAccountNumberKHR;
          var balance;
          if(transformedData["qr-sign"] == "USD"){
            realAccountNumberUSD = transformedData["account_number_eg"];
            balance = transformedData["balance_eg"];
            transformedData["qr-sign"] = "USD";
          }else{
            realAccountNumberKHR = transformedData["account_number_kh"];
            balance = transformedData["balance_kh"];
            transformedData["qr-sign"] = "KHR";
          }

          var qrUrlData = {
            k2Cvblrl2v3: transformedData["user_id"],
            jsbweiui235: transformedData["qr-sign"],
            oi0oi34hsdf: transformedData["first_name"],
            kjhkfwro23v: transformedData["last_name"],
            mv23redefnv: realAccountNumberUSD,
            kjswoirnv5v: realAccountNumberKHR,
            loj232ovnje: transformedData["token"],
            jhy234nvskw: transformedData["image_path"],
          };

          // Convert data to JSON string
          var qrUrlDataString = JSON.stringify(qrUrlData);

          // Encode the JSON string for URL
          var encodedDataString = encodeURIComponent(qrUrlDataString);

          // Construct the URL with the encoded data
          var dataURL = `http://localhost/real-time-pay?data=${encodedDataString}`;

          console.log(encodedDataString);

          setTimeout(function () {
            location.replace(dataURL);
          }, 2000);
        } else {
          document.getElementById("result").innerText = response.message;
          setTimeout(function () {
            // location.replace("login");
          }, 2000);
        }
      } else {
        console.error("Error:", xhr.statusText);
      }
    };
    xhr.send("data=" + encodeURIComponent(data));
  }
});
