<!doctype html>
<html lang="en">

<head>
    @include('components.backend.head')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/4.3.0/apexcharts.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/4.3.0/apexcharts.min.js"></script>
</head>

    @include('components.backend.header')

      <!--start sidebar wrapper-->
      @include('components.backend.sidebar')
     <!--end sidebar wrapper-->

       <div class="page-body">
          <div class="container-fluid">
            @php
                use Illuminate\Support\Facades\DB;
                use Illuminate\Support\Facades\Schema;

                $counts = [
                    'master_categories' => Schema::hasTable('medical_service_master_categories') ? DB::table('medical_service_master_categories')->count() : 0,
                    'sub_categories'    => Schema::hasTable('medical_service_sub_categories') ? DB::table('medical_service_sub_categories')->count() : 0,
                    'services'          => Schema::hasTable('medical_service_categorie') ? DB::table('medical_service_categorie')->count() : 0,
                    'doctors'           => Schema::hasTable('doctors') ? DB::table('doctors')->count() : 0,
                    'blogs'             => Schema::hasTable('blog_listing') ? DB::table('blog_listing')->count() : 0,
                    'announcements'     => Schema::hasTable('anouncements_listing') ? DB::table('anouncements_listing')->count() : 0,
                ];

                /* ---- Enquiry data (overall records) ---- */
                $enquiryTables = [
                    'Doctor Appointments' => 'doctor_appointments_enquiries',
                    'Health Packages'     => 'health_checkup_enquiries',
                    'Career Applications' => 'career_application_details',
                ];

                // Overall total per type (for the distribution donut)
                $enquiryTotals = [];
                foreach ($enquiryTables as $label => $table) {
                    $enquiryTotals[$label] = Schema::hasTable($table) ? DB::table($table)->count() : 0;
                }

                // Helper: overall records of a table segregated by one column
                $segregate = function ($table, $column) {
                    if (! Schema::hasTable($table)) {
                        return collect();
                    }
                    return DB::table($table)
                        ->whereNotNull($column)->where($column, '!=', '')
                        ->select($column, DB::raw('COUNT(*) as total'))
                        ->groupBy($column)
                        ->orderByDesc('total')
                        ->pluck('total', $column);
                };

                // Each type's overall records broken down by a natural dimension
                $apptBySpeciality = $segregate('doctor_appointments_enquiries', 'speciality');
                $healthByPackage  = $segregate('health_checkup_enquiries', 'package');
                $careerByJob      = $segregate('career_application_details', 'job_title');
            @endphp

            <div class="page-title">
                <div class="row">

                    <!-- Main Categories -->
                    <div class="col-xl-3 col-sm-6">
                        <div class="card o-hidden small-widget">
                            <div class="card-body total-project border-b-primary border-2">
                                <span class="f-light f-w-500 f-14">Main Categories</span>
                                <div class="project-details">
                                    <div class="project-counter">
                                        <h2 class="f-w-600">{{ number_format($counts['master_categories']) }}</h2>
                                        <span class="f-12 f-w-400">(Total)</span>
                                    </div>
                                    <div class="product-sub bg-primary-light">
                                        <svg class="invoice-icon">
                                            <use href="{{ asset('admin/assets/svg/icon-sprite.svg#color-swatch') }}"></use>
                                        </svg>
                                    </div>
                                </div>
                                <ul class="bubbles">
                                    <li class="bubble"></li><li class="bubble"></li><li class="bubble"></li>
                                    <li class="bubble"></li><li class="bubble"></li><li class="bubble"></li>
                                    <li class="bubble"></li><li class="bubble"></li><li class="bubble"></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Sub Categories -->
                    <div class="col-xl-3 col-sm-6">
                        <div class="card o-hidden small-widget">
                            <div class="card-body total-Progress border-b-warning border-2">
                                <span class="f-light f-w-500 f-14">Sub Categories</span>
                                <div class="project-details">
                                    <div class="project-counter">
                                        <h2 class="f-w-600">{{ number_format($counts['sub_categories']) }}</h2>
                                        <span class="f-12 f-w-400">(Total)</span>
                                    </div>
                                    <div class="product-sub bg-warning-light">
                                        <svg class="invoice-icon">
                                            <use href="{{ asset('admin/assets/svg/icon-sprite.svg#tick-circle' ) }}"></use>
                                        </svg>
                                    </div>
                                </div>
                                <ul class="bubbles">
                                    <li class="bubble"></li><li class="bubble"></li><li class="bubble"></li>
                                    <li class="bubble"></li><li class="bubble"></li><li class="bubble"></li>
                                    <li class="bubble"></li><li class="bubble"></li><li class="bubble"></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Services -->
                    <div class="col-xl-3 col-sm-6">
                        <div class="card o-hidden small-widget">
                            <div class="card-body total-Complete border-b-secondary border-2">
                                <span class="f-light f-w-500 f-14">Services</span>
                                <div class="project-details">
                                    <div class="project-counter">
                                        <h2 class="f-w-600">{{ number_format($counts['services']) }}</h2>
                                        <span class="f-12 f-w-400">(Total)</span>
                                    </div>
                                    <div class="product-sub bg-secondary-light">
                                        <svg class="invoice-icon">
                                            <use href="{{ asset('admin/assets/svg/icon-sprite.svg#add-square' ) }}"></use>
                                        </svg>
                                    </div>
                                </div>
                                <ul class="bubbles">
                                    <li class="bubble"></li><li class="bubble"></li><li class="bubble"></li>
                                    <li class="bubble"></li><li class="bubble"></li><li class="bubble"></li>
                                    <li class="bubble"></li><li class="bubble"></li><li class="bubble"></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Doctors -->
                    <div class="col-xl-3 col-sm-6">
                        <div class="card o-hidden small-widget">
                            <div class="card-body total-upcoming border-b-success border-2">
                                <span class="f-light f-w-500 f-14">Doctors</span>
                                <div class="project-details">
                                    <div class="project-counter">
                                        <h2 class="f-w-600">{{ number_format($counts['doctors']) }}</h2>
                                        <span class="f-12 f-w-400">(Total)</span>
                                    </div>
                                    <div class="product-sub bg-light-light">
                                        <svg class="invoice-icon">
                                            <use href="{{ asset('admin/assets/svg/icon-sprite.svg#edit-2') }}"></use>
                                        </svg>
                                    </div>
                                </div>
                                <ul class="bubbles">
                                    <li class="bubble"></li><li class="bubble"></li><li class="bubble"></li>
                                    <li class="bubble"></li><li class="bubble"></li><li class="bubble"></li>
                                    <li class="bubble"></li><li class="bubble"></li><li class="bubble"></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Blogs -->
                    <div class="col-xl-3 col-sm-6">
                        <div class="card o-hidden small-widget">
                            <div class="card-body total-project border-b-primary border-2">
                                <span class="f-light f-w-500 f-14">Blogs</span>
                                <div class="project-details">
                                    <div class="project-counter">
                                        <h2 class="f-w-600">{{ number_format($counts['blogs']) }}</h2>
                                        <span class="f-12 f-w-400">(Total)</span>
                                    </div>
                                    <div class="product-sub bg-primary-light">
                                        <svg class="invoice-icon">
                                            <use href="{{ asset('admin/assets/svg/icon-sprite.svg#color-swatch' ) }}"></use>
                                        </svg>
                                    </div>
                                </div>
                                <ul class="bubbles">
                                    <li class="bubble"></li><li class="bubble"></li><li class="bubble"></li>
                                    <li class="bubble"></li><li class="bubble"></li><li class="bubble"></li>
                                    <li class="bubble"></li><li class="bubble"></li><li class="bubble"></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Announcements -->
                    <div class="col-xl-3 col-sm-6">
                        <div class="card o-hidden small-widget">
                            <div class="card-body total-Progress border-b-warning border-2">
                                <span class="f-light f-w-500 f-14">Announcements</span>
                                <div class="project-details">
                                    <div class="project-counter">
                                        <h2 class="f-w-600">{{ number_format($counts['announcements']) }}</h2>
                                        <span class="f-12 f-w-400">(Total)</span>
                                    </div>
                                    <div class="product-sub bg-warning-light">
                                        <svg class="invoice-icon">
                                            <use href="{{ asset('admin/assets/svg/icon-sprite.svg#tick-circle') }}"></use>
                                        </svg>
                                    </div>
                                </div>
                                <ul class="bubbles">
                                    <li class="bubble"></li><li class="bubble"></li><li class="bubble"></li>
                                    <li class="bubble"></li><li class="bubble"></li><li class="bubble"></li>
                                    <li class="bubble"></li><li class="bubble"></li><li class="bubble"></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- ===== Enquiry analytics ===== -->
            <div class="row">

                <!-- Overall distribution across all three forms (DONUT) -->
                <div class="col-xl-5 col-md-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h5>Overall Enquiries</h5>
                            <span class="f-light f-w-400 f-12">All records across every form</span>
                        </div>
                        <div class="card-body">
                            <div id="overallDonut"></div>
                        </div>
                    </div>
                </div>

                <!-- Doctor Appointments segregated by Speciality (COLUMN BAR) -->
                <div class="col-xl-7 col-md-12">
                    <div class="card">
                        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                            <div>
                                <h5>Doctor Appointments by Speciality</h5>
                                <span class="f-light f-w-400 f-12">All-time, segregated by speciality</span>
                            </div>
                            <h3 class="f-w-600 mb-0">{{ number_format($enquiryTotals['Doctor Appointments']) }}</h3>
                        </div>
                        <div class="card-body">
                            <div id="apptChart"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Health Packages segregated by Package (PIE) -->
                <div class="col-xl-6 col-md-12">
                    <div class="card">
                        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                            <div>
                                <h5>Health Packages by Package</h5>
                                <span class="f-light f-w-400 f-12">All-time, segregated by package</span>
                            </div>
                            <h3 class="f-w-600 mb-0">{{ number_format($enquiryTotals['Health Packages']) }}</h3>
                        </div>
                        <div class="card-body">
                            <div id="healthChart"></div>
                        </div>
                    </div>
                </div>

                <!-- Career Applications segregated by Job Title (HORIZONTAL BAR) -->
                <div class="col-xl-6 col-md-12">
                    <div class="card">
                        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                            <div>
                                <h5>Career Applications by Role</h5>
                                <span class="f-light f-w-400 f-12">All-time, segregated by job title</span>
                            </div>
                            <h3 class="f-w-600 mb-0">{{ number_format($enquiryTotals['Career Applications']) }}</h3>
                        </div>
                        <div class="card-body">
                            <div id="careerChart"></div>
                        </div>
                    </div>
                </div>
            </div>

          </div>
        </div>
        <!-- footer start-->
        @include('components.backend.footer')
        </div>

    @include('components.backend.main-js')

    <!-- Enquiry analytics charts -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var overallTotals   = @json($enquiryTotals);
            var apptBySpeciality = @json($apptBySpeciality);
            var healthByPackage  = @json($healthByPackage);
            var careerByJob      = @json($careerByJob);

            var multi = ['#7366ff', '#f8c20a', '#54ba4a', '#ff6b6b', '#0dcaf0', '#fd7e14', '#6f42c1', '#20c997'];
            var noData = { text: 'No records yet', style: { color: '#999' } };

            // 1) Overall distribution across the three forms — DONUT
            new ApexCharts(document.querySelector('#overallDonut'), {
                chart: { type: 'donut', height: 330 },
                labels: Object.keys(overallTotals),
                series: Object.values(overallTotals),
                colors: ['#7366ff', '#f8c20a', '#54ba4a'],
                legend: { position: 'bottom' },
                dataLabels: { enabled: true },
                plotOptions: { pie: { donut: { labels: { show: true, total: { show: true, label: 'Total' } } } } },
                noData: noData
            }).render();

            // 2) Doctor Appointments by speciality — COLUMN BAR
            new ApexCharts(document.querySelector('#apptChart'), {
                chart: { type: 'bar', height: 330, toolbar: { show: false } },
                series: [{ name: 'Appointments', data: Object.values(apptBySpeciality) }],
                xaxis: { categories: Object.keys(apptBySpeciality), labels: { rotate: -45, style: { fontSize: '11px' } } },
                colors: ['#7366ff'],
                plotOptions: { bar: { borderRadius: 4, columnWidth: '55%' } },
                legend: { show: false },
                dataLabels: { enabled: true },
                noData: noData
            }).render();

            // 3) Health Packages by package — PIE
            new ApexCharts(document.querySelector('#healthChart'), {
                chart: { type: 'pie', height: 330 },
                labels: Object.keys(healthByPackage),
                series: Object.values(healthByPackage),
                colors: multi,
                legend: { position: 'bottom' },
                dataLabels: { enabled: true },
                noData: noData
            }).render();

            // 4) Career Applications by job title — HORIZONTAL BAR
            new ApexCharts(document.querySelector('#careerChart'), {
                chart: { type: 'bar', height: 330, toolbar: { show: false } },
                series: [{ name: 'Applications', data: Object.values(careerByJob) }],
                xaxis: { categories: Object.keys(careerByJob) },
                colors: ['#fd7e14'],
                plotOptions: { bar: { borderRadius: 4, horizontal: true } },
                legend: { show: false },
                dataLabels: { enabled: true },
                noData: noData
            }).render();
        });
    </script>

</body>

</html>