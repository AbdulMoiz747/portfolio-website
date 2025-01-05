<section id="projects" class="py-16 bg-gray-100 dark:bg-gray-800">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-6 text-gray-800 dark:text-gray-200" data-aos="fade-right" data-aos-duration="1000">
                Featured Projects
            </h2>

            @if (empty($repositories))
                <p class="text-center text-gray-600">No featured projects available at the moment.</p>
            @endif

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
                            href="{{ $repo['url'] }}"
                            target="_blank"
                            class="mt-4 inline-block text-blue-500 hover:underline"
                        >
                            View on GitHub
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>