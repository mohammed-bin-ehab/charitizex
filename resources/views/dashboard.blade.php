<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('admin.dash') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}

                    <div>
                        <div class="bg-white p-6 rounded shadow w-1/2">
                            <h2 class="mb-4 font-bold text-lg">Sliders Images</h2>
                            <canvas id="sliderImageChart"></canvas>
                        </div>

                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                        <script>
                            new Chart(document.getElementById('sliderImageChart'), {
                                type: 'doughnut',
                                data: {
                                    labels: ['With Image', 'Without Image'],
                                    datasets: [{
                                        data: [{{ $withImage }}, {{ $withoutImage }}],
                                    }]
                                }
                            });
                        </script>

                    </div>
                    <div>
                        <div class="w-64 bg-white p-4 rounded shadow">
                            <h3 class="text-sm font-semibold mb-2">Sliders Overview</h3>
                            <canvas id="smallSliderChart" height="150"></canvas>
                        </div>

                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                        <script>
                            new Chart(document.getElementById('smallSliderChart'), {
                                type: 'doughnut', // شكل جديد وجميل
                                data: {
                                    labels: ['With Image', 'Without Image'],
                                    datasets: [{
                                        data: [{{ $withImage }}, {{ $withoutImage }}],
                                        backgroundColor: ['#4f46e5', '#f43f5e'], // ألوان Tailwind أزرق + أحمر
                                        borderWidth: 0
                                    }]
                                },
                                options: {
                                    plugins: {
                                        legend: {
                                            display: false // نخفي الليجند عشان Chart صغيرة
                                        },
                                        tooltip: {
                                            enabled: true
                                        }
                                    },
                                    cutout: '70%' // يعطي شكل حديث ورفيع
                                }
                            });
                        </script>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
