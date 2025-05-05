<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <style>
        .snowflake {
            position: absolute;
            top: -10px;
            width: 8px;
            height: 8px;
            background: gold;
            border-radius: 50%;
            opacity: 0.8;
            animation-name: snowfall;
            animation-timing-function: linear;
            animation-iteration-count: infinite;
        }

        .dark .snowflake {
            background: white;
        }

        @keyframes snowfall {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(84vh);
            }
        }
    </style>
    <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
  <!-- Configure Tailwind theme -->
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
         container: {
            center: true,
            padding: '2rem',
            screens: {
              sm: '100%',
              md: '100%',
              lg: '100%',
              xl: '100%',
              '2xl': '100%',
            },
          },
          colors: {
            primary: {
              50: '#f0f9ff',
              100: '#e0f2fe',
              200: '#bae6fd',
              300: '#7dd3fc',
              400: '#38bdf8',
              500: '#0ea5e9',
              600: '#0284c7',
              700: '#0369a1',
              800: '#075985',
              900: '#0c4a6e',
              950: '#082f49',
            },
          }
        }
      }
    }
  </script>
</head>

<body class="font-sans  antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-800">

        <div
            class="w-full md:max-w-2xl sm:max-w-sm mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
    <script>
        const snowflakeCount = 100;

        for (let i = 0; i < snowflakeCount; i++) {
            const flake = document.createElement("div");
            flake.classList.add("snowflake");

            const size = Math.random() * 5 + 2;
            const left = Math.random() * 100;
            const duration = Math.random() * 10 + 5; // 5s to 15s
            const delay = Math.random() * 10;

            flake.style.width = `${size}px`;
            flake.style.height = `${size}px`;
            flake.style.left = `${left}vw`;
            flake.style.animationDuration = `${duration}s`;
            flake.style.animationDelay = `-${delay}s`;

            if (i % 6 === 0) {
                flake.style.filter = "blur(1px)";
            }

            document.body.appendChild(flake);
        }
    </script>
</body>

</html>
