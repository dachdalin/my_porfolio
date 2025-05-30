<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dach Dalin | Web Developer</title>
    <meta name="description" content="Portfolio website of Dach Dalin, a web developer">
    <meta name="author" content="Dach Dalin">
    <meta name="keywords" content="Dach Dalin, Web Developer, Portfolio, Laravel, Vue.js, PHP">
    <link rel="icon" href="{{ asset('frontend/images/favicon.png') }}" type="image/png">
    <link rel="apple-touch-icon" href="#" type="image/png">
    <link rel="stylesheet" href="{{ asset('frontend/style/style.css') }}">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- AOS Animation Library -->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <!-- Tailwind CSS CDN -->
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
</head>

<body class="bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-200">
    <!-- Header/Navigation -->
    <header
        class="sticky top-0 z-40 w-full border-b border-gray-200 dark:border-gray-800 bg-white/95 dark:bg-gray-900/95 backdrop-blur">
        <div class="container mx-auto px-4 flex h-16 items-center justify-between">
            <div class="flex items-center">
                <a href="#" class="text-xl font-bold">Dach Dalin</a>
            </div>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex space-x-8">
                <a href="#about"
                    class="text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">About</a>
                <a href="#skills"
                    class="text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">Skills</a>
                <a href="#projects"
                    class="text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">Projects</a>
                <a href="#contact"
                    class="text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">Contact</a>
            </nav>

            <div class="flex items-center space-x-4">
                <!-- Social Links -->
                <a href="{{ getWebsiteConfig('link_git') }}" target="_blank" rel="noreferrer"
                    class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">
                    <i class="fab fa-github text-lg"></i>
                    <span class="sr-only">GitHub</span>
                </a>
                <a href="{{ getWebsiteConfig('link_in') }}" target="_blank" rel="noreferrer"
                    class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">
                    <i class="fab fa-linkedin text-lg"></i>
                    <span class="sr-only">LinkedIn</span>
                </a>

                <!-- Dark Mode Toggle -->
                <button id="theme-toggle"
                    class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">
                    <i class="fas fa-sun text-lg dark:hidden"></i>
                    <i class="fas fa-moon text-lg hidden dark:block"></i>
                    <span class="sr-only">Toggle theme</span>
                </button>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-button"
                    class="md:hidden text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">
                    <i class="fas fa-bars text-lg"></i>
                    <span class="sr-only">Open menu</span>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div id="mobile-menu"
            class="md:hidden hidden bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-800">
            <div class="container mx-auto px-4 py-4 space-y-4">
                <a href="#about"
                    class="block text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">About</a>
                <a href="#skills"
                    class="block text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">Skills</a>
                <a href="#projects"
                    class="block text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">Projects</a>
                <a href="#contact"
                    class="block text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">Contact</a>
            </div>
        </div>
    </header>

    <main>
        <!-- Hero Section -->
        <section class="py-20 md:py-32">
            <div class="container mx-auto px-4 text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Hi, I'm Dalin</h1>
                <p class="text-xl text-gray-600 dark:text-gray-400 mb-8 btn-shine">Web Developer</p>
                <p class="max-w-2xl mx-auto text-lg text-gray-600 dark:text-gray-400 mb-8 btn-shine">
                    I build modern, responsive web applications with HTML, CSS, JavaScript, and more.
                </p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="#contact"
                        class="px-6 py-3 bg-primary-600 hover:bg-primary-700 text-white font-medium rounded-md transition-colors">
                        Hire Me
                    </a>
                    <a href="#projects"
                        class="px-6 py-3 border border-gray-300 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800 font-medium rounded-md transition-colors">
                        View My Work
                    </a>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="py-20 md:py-32" data-aos="fade-up" data-aos-duration="3000">
            <div class="container mx-auto px-4">
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <div>
                        <h2 class="text-3xl font-bold mb-6">About Me</h2>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">
                            {{ getWebsiteConfig('about_me') }}
                        </p>
                    </div>
                    <div class="flex justify-center">
                        <div
                            class="relative w-64 h-64 md:w-80 md:h-80 rounded-full overflow-hidden border-4 border-gray-200 dark:border-gray-800">
                            <img src="https://placehold.co/400x400" alt="John Doe" class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Experience Section && Education time line -->
        <section class="py-20 md:py-32 bg-gray-100 dark:bg-gray-800">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12" data-aos="fade-up" data-aos-delay="200">
                    <h2 class="text-3xl font-bold mb-4">Experience & Education</h2>
                    <p class="text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                        My journey in the tech world
                    </p>
                </div>

                <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto" data-aos="fade-up" data-aos-delay="250">
                    <!-- Experience Timeline -->
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg">
                        <h3 class="text-xl font-bold mb-4">Experience</h3>
                        <div class="flex w-full flex-col items-start ">
                            @foreach ($experience as $row )
                            <div class="group flex gap-x-6">
                                <div class="relative">
                                    @if (!$loop->last)
                                    <div
                                        class="absolute left-1/2 top-0 h-full w-0.5 -translate-x-1/2 dark:bg-slate-200 bg-slate-500">
                                    </div>
                                    @endif
                                    <span
                                        class="relative z-10 grid h-3 w-3 place-items-center rounded-full bg-slate-200 text-slate-800 "></span>
                                </div>
                                <div class="-translate-y-1.5 pb-8 text-slate-600">
                                    <p
                                        class="font-sans text-base font-bold text-slate-800 antialiased dark:text-white">
                                        {{ $row->title }}</p>
                                    <p class="text-gray-600 dark:text-gray-400">{{ $row->start_date }} - {{ $row->end_date }}</p>
                                    <p class="mt-2 font-sans text-gray-600 dark:text-gray-400 antialiased">{{ $row->description }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Education Timeline -->
                    <div class="bg-white dark:bg-gray-800 p-6">
                        <h3 class="text-xl font-bold mb-4">Education</h3>
                        <div class="flex w-full flex-col items-start ">
                            @foreach ($education as $row)
                            <div class="group flex gap-x-6">
                                <div class="relative">
                                    @if (!$loop->last)

                                    <div
                                        class="absolute left-1/2 top-0 h-full w-0.5 -translate-x-1/2 dark:bg-slate-200 bg-slate-500">
                                    </div>
                                    @endif
                                    <span
                                        class="relative z-10 grid h-3 w-3 place-items-center rounded-full bg-slate-200 text-slate-800 "></span>
                                </div>
                                <div class="-translate-y-1.5 pb-8 text-slate-600">
                                    <p
                                        class="font-sans text-base font-bold text-slate-800 antialiased dark:text-white">
                                        {{ $row->title }}</p>
                                    <p class="text-gray-600 dark:text-gray-400">{{ $row->start_date }} - {{ $row->end_date }}</p>
                                    <p class="mt-2 font-sans text-gray-600 dark:text-gray-400 antialiased">{{ $row->description }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Skills Section -->
        <section id="skills" class="py-20 md:py-32 bg-gray-100 dark:bg-gray-800">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12" data-aos="fade-up" data-aos-delay="200">
                    <h2 class="text-3xl font-bold mb-4">Skills & Technologies</h2>
                    <p class="text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                        Here are some of the technologies I work with
                    </p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-5xl mx-auto" data-aos="fade-up"
                    data-aos-delay="250">
                    <!-- Frontend Skills -->
                    @foreach ($technologies as $row )
                    <div class="bg-white dark:bg-gray-900 p-6 rounded-lg shadow-md">
                        <h3 class="text-xl font-bold mb-2">{{ $row->title }}</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">{{ $row->description }}</p>
                        <div class="flex flex-wrap gap-2">
                            @if (array($row->tech))
                                @php
                                    $tech = json_decode($row->tech);
                                @endphp
                                @foreach ($tech as $value)
                                <span class="px-3 py-1 bg-gray-200 dark:bg-gray-700 rounded-full text-sm">{{ $value }}</span>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Projects Section -->
        <section id="projects" class="py-20 md:py-32">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold mb-4">Featured Projects</h2>
                    <p class="text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                        Check out some of my recent work
                    </p>
                </div>

                <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto" data-aos="fade-up"
                    data-aos-anchor-placement="top-bottom" data-aos-delay="500">
                    <!-- Project 1 -->
                    @foreach ($projects as $row )
                    <div class="bg-white dark:bg-gray-900 rounded-lg overflow-hidden shadow-md">
                        <div class="h-48 overflow-hidden">
                            <img src="https://placehold.co/600x300" alt="E-commerce Platform"
                                class="w-full h-full object-cover hover:scale-105 transition-transform">
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-2">{{ $row->title }}</h3>
                            <p class="text-gray-600 dark:text-gray-400 mb-4">
                                {{ $row->description }}
                            </p>
                            <div class="flex flex-wrap gap-2 mb-4">

                                @if ($row->tech)
                                    @php
                                        $tech = json_decode($row->tech);
                                    @endphp
                                    @foreach ($tech as $value)
                                    <span class="px-3 py-1 bg-gray-200 dark:bg-gray-700 rounded-full text-sm">{{ $value }}</span>
                                    @endforeach
                                @endif
                            </div>
                            <div class="flex gap-3">
                                <a href="#"
                                    class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-md hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                                    <i class="fas fa-external-link-alt mr-2"></i> Demo
                                </a>
                                <a href="#"
                                    class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-md hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                                    <i class="fab fa-github mr-2"></i> Code
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="py-20 md:py-32 bg-gray-100 dark:bg-gray-800">
            <div class="container mx-auto px-4">
                <div class="grid md:grid-cols-2 gap-12 max-w-5xl mx-auto">
                    <div>
                        <h2 class="text-3xl font-bold mb-6">Get In Touch</h2>
                        <p class="text-gray-600 dark:text-gray-400 mb-6">
                            {{ getWebsiteConfig('get_toch') }}
                        </p>
                        <div class="space-y-4">
                            <div class="flex items-center">
                                <i class="fas fa-envelope text-primary-600 mr-3"></i>
                                <a href="mailto:{{ getWebsiteConfig('site_email') }}"
                                    class="text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-500">
                                    {{ getWebsiteConfig('site_email') }}
                                </a>
                            </div>
                            <div class="flex items-center">
                                <i class="fab fa-github text-primary-600 mr-3"></i>
                                <a href="{{ getWebsiteConfig('link_git') }}" target="_blank" rel="noreferrer"
                                    class="text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-500">
                                    Dach Dalin
                                </a>
                            </div>
                            <div class="flex items-center">
                                <i class="fab fa-linkedin text-primary-600 mr-3"></i>
                                <a href="{{ getWebsiteConfig('link_in') }}" target="_blank" rel="noreferrer"
                                    class="text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-500">
                                    Dach Dalin
                                </a>
                            </div>
                        </div>
                    </div>

                    <div>
                        <form id="contact-form" class="space-y-6">
                            <div>
                                <label for="name" class="block text-sm font-medium mb-2">Name</label>
                                <input type="text" id="name" name="name" required
                                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-primary-500">
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium mb-2">Email</label>
                                <input type="email" id="email" name="email" required
                                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-primary-500">
                            </div>
                            <div>
                                <label for="message" class="block text-sm font-medium mb-2">Message</label>
                                <textarea id="message" name="message" rows="5" required
                                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-md bg-white dark:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-primary-500"></textarea>
                            </div>
                            <button type="submit"
                                class="w-full px-6 py-3 bg-primary-600 hover:bg-primary-700 text-white font-medium rounded-md transition-colors">
                                Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="py-8 border-t border-gray-200 dark:border-gray-800">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-600 dark:text-gray-400 text-sm">
                    © <span id="current-year"></span> Dalin — Made with ❤️ in Cambodia using Laravel. All rights
                    reserved.
                </p>
                <div class="flex space-x-4 mt-4 md:mt-0">
                    <a href="{{ getWebsiteConfig('link_git') }}" target="_blank" rel="noreferrer"
                        class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">
                        <i class="fab fa-github text-lg"></i>
                        <span class="sr-only">GitHub</span>
                    </a>
                    <a href="{{ getWebsiteConfig('link_in') }}" target="_blank" rel="noreferrer"
                        class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">
                        <i class="fab fa-linkedin text-lg"></i>
                        <span class="sr-only">LinkedIn</span>
                    </a>
                    <a href="mailto:{{ getWebsiteConfig('site_email') }}"
                        class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">
                        <i class="fas fa-envelope text-lg"></i>
                        <span class="sr-only">Email</span>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
