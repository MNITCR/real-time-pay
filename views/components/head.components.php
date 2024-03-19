<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="./js/jquery.js"></script>

    <!-- Include QRious library -->
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrious/4.0.2/qrious.min.js"></script>
    <style>
        /* Vertical scrollbar */
        ::-webkit-scrollbar {
            width: 3px;
            /* Adjust the width as needed */
            height: 3px;
        }

        ::-webkit-scrollbar-thumb {
            border-radius: 100px;
            background-color: #374151;
            border-radius: 6px;
            border: 3px solid rgba(0, 0, 0, 0.2);
        }

        /* Optional: Vertical scrollbar track style */
        ::-webkit-scrollbar-track {
            background-color: #1F2937;
        }


        /* Add this to your CSS */
        .show-alert {
            animation: slideInRight 20s ease forwards;
        }

        .hide-alert {
            animation: slideOutLeft 30s ease forwards;
        }

        @keyframes slideInRight {
            0% {
                opacity: 0;
                transform: translateX(100%);
            }

            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideOutLeft {
            0% {
                opacity: 1;
                transform: translateX(0);
            }

            100% {
                opacity: 0;
                transform: translateX(50%);
                display: none;
                /* Hide the element after the animation */
            }
        }
    </style>

</head>

<body class="h-full">
    <div class="min-h-full">
