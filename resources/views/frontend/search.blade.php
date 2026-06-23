<!DOCTYPE html>
<html lang="en">
    
  <head>
      
    @include('components.frontend.head')
    
  </head>
  
    <body>
      
      
        <!-- header start -->
        
            <div class="full_header" id="header-sticky">
                
              @include('components.frontend.header')
              
            </div>
            
        <!-- header end -->
        
        
        <section class="search_wrap">
            <div class="container">
                <!-- Search -->
                <div class="search-bar">
                  <div class="input-group">
                    <input type="text" id="searchInput" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                      <button class="btn btn-primary"  type="button">
                        <i class="glyphicon glyphicon-search"></i>
                      </button>
                    </span>
                  </div>
                </div>
                
                <div id="defaultSearchText" style="padding:20px; text-align:center;">
                    <h3><strong>Looking for something specific?</strong></h3>
                    <p>
                        Enter keywords to find doctors, departments, health packages, services, and more.
                    </p>
                </div>

                
                
                <div class="row" id="searchResults" style="display:none;">
                  <div class="col-md-12">
                
                    <div class="result-card" id="specialitiesBox">
                      <h4>Specialities</h4>
                      <hr>
                      <ul id="specialitiesList"></ul>
                    </div>
                    
                    
                   <div id="servicesWrapper"></div>
                
                    <div class="result-card" id="packagesBox">
                      <h4>Health Packages</h4>
                      <hr>
                      <ul id="packagesList"></ul>
                    </div>
                
                    <div class="result-card" id="doctorsBox">
                      <h4>Doctors</h4>
                      <hr>
                      <ul id="doctorsList"></ul>
                    </div>
                    
                    <div class="result-card" id="galleryBox" style="display:none;">
                        <h4>Gallery</h4>
                        <hr>
                        <ul id="galleryList"></ul>
                    </div>
                    
                    <div class="result-card" id="mediaBox" style="display:none;">
                        <h4>Media Coverage</h4>
                        <hr>
                        <ul id="mediaList"></ul>
                    </div>
                    

                    <div class="result-card" id="alternateTherapyBox" style="display:none;">
                        <h4>Alternate Therapy</h4>
                        <hr>
                        <ul id="alternateTherapyList"></ul>
                    </div>
                    
                    <div class="result-card" id="ayurvedaBox" style="display:none;">
                        <h4>Ayurveda</h4>
                        <hr>
                        <ul id="ayurvedaList"></ul>
                    </div>
                
                  </div>
                </div>
            
            
            </div>
        </section>
        
        
        
        @include('components.frontend.footer')
        @include('components.frontend.main-js')
        
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            $(document).ready(function () {
        
            let serviceUrl = "{{ url('/') }}";
            let packageUrl = "{{ url('/details') }}";
            let doctorUrl  = "{{ url('/doctor') }}";
            let categoryUrl = "{{ url('service') }}";
            let galleryUrl = "{{ url('/gallery-details') }}";
            let mediaUrl   = "{{ url('/media') }}";
            let therapyUrl = "{{ url('/alternative-therapies') }}";
            let ayurvedaUrl = "{{ url('/ayurveda') }}";

        
            $('#searchInput').on('keyup', function () {
        
                let query = $(this).val().trim();
        
                if (query.length < 2) {
                    $('#searchResults').hide();
                    $('#defaultSearchText').show();
                    return;
                }
        
                $.ajax({
                    url: "{{ route('search.live') }}",
                    type: "GET",
                    data: { search: query },
        
                    success: function (data) {
        
                        $('#defaultSearchText').hide();
                        $('#searchResults').show();
        
                        // Reset
                        $('#specialitiesList').empty();
                        $('#servicesList').empty();
                        $('#packagesList').empty();
                        $('#doctorsList').empty();
                        $('#noResult').remove();
        
                        // ================= Specialities =================
                        if (data.specialities && data.specialities.length > 0) {
                            $('#specialitiesBox').show();
        
                            data.specialities.forEach(item => {
        
                                let url = serviceUrl + '/' + item.slug;
        
                               
                                $('#specialitiesList').append(`
                                    <li>
                                        <a href="${url}">
                                            ${item.name}
                                        </a>
                                    </li>
                                `);
                            });
        
                        } else {
                            $('#specialitiesBox').hide();
                        }
        
        
                        // ================= Services (Multiple Cards) =================
                        $('#servicesWrapper').empty();
                        
                        if (data.servicesGrouped && Object.keys(data.servicesGrouped).length > 0) {
                        
                            Object.keys(data.servicesGrouped).forEach(category => {
                        
                                let html = `
                                    <div class="result-card">
                                        <h4>${category}</h4>
                                        <hr>
                                        <ul>
                                `;
                        
                                data.servicesGrouped[category].forEach(item => {
                                    html += `
                                        <li>
                                            <a href="${categoryUrl}/${item.slug}">
                                                ${item.name}
                                            </a>
                                        </li>
                                    `;
                                });
                        
                                html += `
                                        </ul>
                                    </div>
                                `;
                        
                                $('#servicesWrapper').append(html);
                            });
                        
                        } else {
                            $('#servicesWrapper').html('');
                        }
                                
        
                        // ================= Packages =================
                        if (data.packages && data.packages.length > 0) {
                            $('#packagesBox').show();
        
                            data.packages.forEach(item => {
                                $('#packagesList').append(`
                                    <li>
                                        <a href="${packageUrl}/${item.slug}">
                                            ${item.package_name}
                                        </a>
                                    </li>
                                `);
                            });
        
                        } else {
                            $('#packagesBox').hide();
                        }
        
        
                        // ================= Doctors =================
                        if (data.doctors && data.doctors.length > 0) {
                            $('#doctorsBox').show();
        
                            data.doctors.forEach(item => {
                                $('#doctorsList').append(`
                                    <li>
                                        <a href="${doctorUrl}/${item.slug}">
                                            ${item.doctor_name}
                                        </a>
                                    </li>
                                `);
                            });
        
                        } else {
                            $('#doctorsBox').hide();
                        }
        
        
                        // ================= Gallery =================
                        if (data.gallery && data.gallery.length > 0) {
                            $('#galleryBox').show();
                            $('#galleryList').empty();
                        
                            data.gallery.forEach(item => {
                                $('#galleryList').append(`
                                    <li>
                                        <a href="${galleryUrl}/${item.slug}">
                                            ${item.name}
                                        </a>
                                    </li>
                                `);
                            });
                        
                        } else {
                            $('#galleryBox').hide();
                        }
                        
                        
                        // ================= Media Coverage =================
                        if (data.media && data.media.length > 0) {
                            $('#mediaBox').show();
                            $('#mediaList').empty();
                        
                            data.media.forEach(item => {
                                $('#mediaList').append(`
                                    <li>
                                        <a href="${item.url}">
                                            <strong>${item.name}</strong><br>
                                            <small>
                                                ${item.description ? item.description.substring(0, 80) + '...' : ''}
                                            </small>
                                        </a>
                                    </li>
                                `);
                            });
                        
                        } else {
                            $('#mediaBox').hide();
                        }


                        // ================= Alternate Therapy =================
                        if (data.alternateTherapy && data.alternateTherapy.length > 0) {
                            $('#alternateTherapyBox').show();
                            $('#alternateTherapyList').empty();
                        
                            data.alternateTherapy.forEach(item => {
                                $('#alternateTherapyList').append(`
                                    <li>
                                        <a href="${therapyUrl}">
                                            ${item.name}
                                        </a>
                                    </li>
                                `);
                            });
                        
                        } else {
                            $('#alternateTherapyBox').hide();
                        }
                        
                        
                        // ================= Ayurveda =================
                        if (data.ayurveda && data.ayurveda.length > 0) {
                            $('#ayurvedaBox').show();
                            $('#ayurvedaList').empty();
                        
                            data.ayurveda.forEach(item => {
                                $('#ayurvedaList').append(`
                                    <li>
                                        <a href="${ayurvedaUrl}">
                                            ${item.name}
                                        </a>
                                    </li>
                                `);
                            });
                        
                        } else {
                            $('#ayurvedaBox').hide();
                        }
        
                        if (
                            (!data.specialities || data.specialities.length === 0) &&
                            (!data.servicesGrouped || Object.keys(data.servicesGrouped).length === 0) &&
                            (!data.packages || data.packages.length === 0) &&
                            (!data.doctors || data.doctors.length === 0) &&
                            (!data.gallery || data.gallery.length === 0) &&
                            (!data.media || data.media.length === 0) &&
                            (!data.alternateTherapy || data.alternateTherapy.length === 0)&&
                            (!data.ayurveda || data.ayurveda.length === 0)
                        ){
                            $('#searchResults').append(`
                                <p id="noResult" style="padding:10px; text-align:center;">
                                    No results found
                                </p>
                            `);
                        }
        
                    },
        
                    error: function () {
                        console.log("Search error");
                    }
                });
        
            });
        
        });
        </script>
        
    </body>
</html>