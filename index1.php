<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./js/jquery.js"></script>
    <script src="./php/FetchDataFromScanNav.php"></script>
</head>

<body>

    <script>
        $(document).ready(function() {
            // function send data to qr code
            function sendDataFromScanQRNav(data) {
                const xhr = new XMLHttpRequest();
                xhr.open("POST", "FetchDataFromScanNav.php");
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.onload = function() {
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
                            if (transformedData["qr-sign"] == "USD") {
                                realAccountNumberUSD = transformedData["account_number_eg"];
                                transformedData["qr-sign"] = "USD";
                            } else {
                                realAccountNumberKHR = transformedData["account_number_kh"];
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

                            var WIFIIPV4 = $("#ipV4WIFI").text();

                            // Construct the URL with the encoded data
                            var dataURL = `http://${WIFIIPV4}/real-time-pay?data=${encodedDataString}`;

                            console.log(encodedDataString);

                            setTimeout(function() {
                                location.replace(dataURL);
                            }, 2000);
                        } else {
                            document.getElementById("result").innerText = response.message;
                            setTimeout(function() {
                                // location.replace("login");
                            }, 2000);
                        }
                    } else {
                        console.error("Error:", xhr.statusText);
                    }
                };
                xhr.send("data=" + encodeURIComponent(data));
            }

            sendDataFromScanQRNav();
        });
    </script>
</body>

</html>
