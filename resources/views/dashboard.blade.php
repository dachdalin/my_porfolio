<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
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
  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite('resources/js/app.js')
</head>
<body>

    <div id="app"></div>
    <script>

        window.APP_URL = @json(env('APP_URL'));
        window.USER_ID = @json(auth()->id());
    </script>
</body>
</html>
