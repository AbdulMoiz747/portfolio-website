@extends('layouts.app')

@section('title', 'Portfolio')

@section('content')
<!-- <main class="container mx-auto px-6"> -->

    <body class="bg-background dark:bg-darkbackground text-gray-800 dark:text-gray-200">
        <header class="py-6 text-center bg-gradient-to-r from-gray-700 via-gray-900 to-black dark:from-gray-300 dark:via-gray-400 dark:to-gray-500 text-white">
            <button
                onclick="toggleTheme()"
                class="absolute top-4 right-6 w-10 h-10 bg-gray-200 dark:bg-gray-700 rounded-full flex items-center justify-center shadow-lg hover:shadow-xl transition"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700 dark:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2m0 14v2m9-9h-2M5 12H3m16.364-7.364l-1.414 1.414M6.05 17.95l-1.414 1.414m12.728 0l-1.414-1.414M6.05 6.05L4.636 4.636M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </button>

            <h1 class="text-4xl font-bold">Welcome to My Portfolio</h1>
            
        </header>
        <div
            class="relative bg-cover bg-center h-screen"
            style="background-image: url('https://source.unsplash.com/1920x1080/?technology,coding');"
        >
            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                <div class="text-center text-white">
                    <h1 class="text-5xl font-bold">Hi, I'm Abdul Moiz Chaudhary</h1>
                    <div class="flex justify-center mt-8">
                        <div class="rounded-full overflow-hidden w-40 h-40 border-4 border-secondary shadow-lg hover:border-primary transition duration-300">
                            <img
                                src="{{ asset('images/profile_picture.jpg') }}"
                                alt="Profile Picture"
                                class="w-full h-full object-cover"
                            />
                        </div>
                        <div class="relative">
                            <button
                                onclick="document.getElementById('imageUpload').click();"
                                class="absolute -mt-4 w-10 h-10 bg-secondary text-black rounded-full flex items-center justify-center shadow-md hover:bg-yellow-400 transition"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                            </button>
                            <input
                                type="file"
                                id="imageUpload"
                                class="hidden"
                                onchange="uploadImage(this)"
                            />
                        </div>
                        <script>
                            function uploadImage(input) {
                            const file = input.files[0];
                            if (file) {
                                alert("File selected: " + file.name);
                                // Add your backend upload logic here
                            }
                        }

                        </script>
                    </div>
                    <div class="mt-4">
                        <p class="text-lg mb-4">
                            A Computer Science Graduate Passionate About Web Development, Data Analysis, and Machine Learning.
                        </p>
                        
                        <a
                            href="#projects"
                            class="mt-6 px-6 py-3 bg-secondary text-black hover:bg-yellow-500 rounded font-semibold transition-all transform hover:scale-110"
                        >
                            Explore Projects
                        </a>
                    </div>
                </div>
            </div>
        </div>

        @include('sections.about')
        @include('sections.skills')
        @include('sections.projects')

@endsection




    <!-- <section id="about" class="py-16 bg-gray-100 dark:bg-gray-800">
        <div class="container mx-auto px-6">
            <h2
                class="text-3xl font-bold text-center mb-6 text-gray-800 dark:text-gray-200"
                data-aos="fade-right"
                data-aos-duration="1000"
            >
                About Me
            </h2>
            <p
                class="text-center text-lg text-gray-700 dark:text-gray-300"
                data-aos="fade-right"
                data-aos-duration="1000"
                data-aos-delay="300"
            >
                Hi! I'm Abdul Moiz Chaudhary, a passionate Computer Science graduate with expertise in
                Web Development, Data Analysis, and Machine Learning. I enjoy solving complex problems and
                creating impactful solutions through code.
            </p>
            <div
                class="flex justify-center mt-8"
                data-aos="fade-right"
                data-aos-duration="1000"
                data-aos-delay="600"
            >
                <a
                    href="{{ asset('resume.pdf') }}"
                    download
                    class="mt-6 px-6 py-3 bg-secondary text-black hover:bg-yellow-500 rounded font-semibold transition-all transform hover:scale-110"
                >
                    Download My Resume
                </a>
            </div>
        </div>
    </section>

    <section id="skills" class="py-16 bg-gray-100 dark:bg-gray-800">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-6 text-gray-800 dark:text-gray-200" data-aos="fade-up">
                My Skills
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                Programming Languages -->
                <!-- <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                    <div class="text-6xl text-primary mb-4">
                        <i class="fas fa-code"></i>
                    </div>
                    <h3 class="text-xl font-semibold">Programming Languages</h3>
                    <p class="text-gray-600 dark:text-gray-400 mt-2">
                        Python, SQL, Java
                    </p>
                </div> -->
                <!-- Frameworks -->
                <!-- <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="text-6xl text-primary mb-4">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <h3 class="text-xl font-semibold">Frameworks</h3>
                    <p class="text-gray-600 dark:text-gray-400 mt-2">
                        Laravel, React.js, Vue.js, Spring Boot, Flask
                    </p>
                </div> -->
                <!-- BI and Visualization Tools -->
                <!-- <div class="text-center" data-aos="fade-up" data-aos-delay="300">
                    <div class="text-6xl text-primary mb-4">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    <h3 class="text-xl font-semibold">BI & Visualization Tools</h3>
                    <p class="text-gray-600 dark:text-gray-400 mt-2">
                        Tableau, Power BI, Excel, Qlik Sense
                    </p>
                </div> -->
                <!-- Data Science and Analytics -->
                <!-- <div class="text-center" data-aos="fade-up" data-aos-delay="400">
                    <div class="text-6xl text-primary mb-4">
                        <i class="fas fa-database"></i>
                    </div>
                    <h3 class="text-xl font-semibold">Data Science & Analytics</h3>
                    <p class="text-gray-600 dark:text-gray-400 mt-2">
                        Machine Learning, Data Cleaning, EDA, Predictive Modelling
                    </p>
                </div> -->
                <!-- Project Management -->
                <!-- <div class="text-center" data-aos="fade-up" data-aos-delay="500">
                    <div class="text-6xl text-primary mb-4">
                        <i class="fas fa-tasks"></i>
                    </div>
                    <h3 class="text-xl font-semibold">Project Management</h3>
                    <p class="text-gray-600 dark:text-gray-400 mt-2">
                        Agile, Scrum, Risk Management, Stakeholder Collaboration
                    </p>
                </div> -->
                <!-- Soft Skills -->
                <!-- <div class="text-center" data-aos="fade-up" data-aos-delay="600">
                    <div class="text-6xl text-primary mb-4">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="text-xl font-semibold">Soft Skills</h3>
                    <p class="text-gray-600 dark:text-gray-400 mt-2">
                        Communication, Decision-Making, Problem-Solving
                    </p>
                </div>
            </div>
        </div>
    </section>


    <section id="projects" class="py-16 bg-gray-100 dark:bg-gray-800">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-8" data-aos="fade-right" data-aos-duration="1000">
                Featured Projects
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ($repositories as $repo)
                    <div
                        class="bg-white shadow-lg rounded-lg p-6 hover:shadow-xl hover:-translate-y-1 transition transform"
                        data-aos="fade-right"
                        data-aos-duration="1000"
                        data-aos-delay="{{ $loop->index * 200 }}"
                    >
                        <h3 class="text-xl font-bold">{{ $repo['name'] }}</h3>
                        <p class="mt-2 text-gray-600">
                            {{ $repo['description'] ?? 'No description available.' }}
                        </p>
                        <a
                            
                            target="_blank"
                            class="mt-4 inline-block text-blue-500 hover:underline"
                        >
                            View on GitHub
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section> -->




    <!-- <footer class="py-6 text-center">
        <p>&copy; 2024 My Portfolio</p>
    </footer> -->

    <script>
        // Add JavaScript for dark mode toggle
        const toggleTheme = () => {
            const html = document.documentElement;
            if (html.classList.contains('dark')) {
            localStorage.theme = 'light';
            html.classList.remove('dark');
            } else {
                localStorage.theme = 'dark';
                html.classList.add('dark');
            }
        };

        if (localStorage.theme === 'dark') {
            document.documentElement.classList.toggle('dark');
        };
    </script>
</body>
</html>
