<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Vertical scrollbar */
        ::-webkit-scrollbar {
            width: 3px; /* Adjust the width as needed */
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
                display: none; /* Hide the element after the animation */
            }
        }
    </style>

</head>
<body class="h-full">
    <div class="min-h-full">
