
      <!-- Floating Buttons -->
      <div class="floating-icons floating-icons-inner">
          <a type="button" data-toggle="modal" data-target="#bookappointment-services">
          <img src="{{ asset('frontend/assets/img/icon/book-appointment-new.svg') }}">
          <span class="tooltip-text">Book Appointment </span>
          </a>
          <a href="#find-doctor">
          <img src="{{ asset('frontend/assets/img/icon/find-doctor-new.svg') }}">
          <span class="tooltip-text">Find A Doctor </span>
          </a>
          <a type="button" data-toggle="modal" data-target="#health-checkup">
          <img src="{{ asset('frontend/assets/img/icon/book-health-check-new.svg') }}">
          <span class="tooltip-text">Book Heath Check </span>
          </a>
      </div>


      <header class="header">
        <div class="container-fluid">
          <div class="row v-center main-header">
            <div class="header-item item-left">
              <div class="logo white-logo custom-somaiya-custom-logo">
                <a href="#">
                  <img src="{{ asset('frontend/assets/img/logo/kj-somaiya-logo_W.webp')}}" class="img-responsive"><!-- <img src="img/logo/somaiya-trust-logo.png" class="img-responsive st-logo-custom-sec"> -->
                </a>
              </div>
              <div class="logo colored-logo logo-custom-flex-sec">
                <a href="#">
                  <img src="{{ asset('frontend/assets/img/logo/kj-somaiya-logo.png')}}" class="img-responsive"><!-- <img src="img/logo/somaiya-trust-logo.png" class="img-responsive lcfsec-custom-sec"> -->
                </a>
              </div>
            </div>
            <!-- menu start here -->
            <div class="header-item item-center">
              <div class="menu-overlay"></div>
              <nav class="menu">
                <div class="mobile-menu-head">
                  <div class="go-back"><i class="fa fa-angle-left"></i></div>
                  <div class="current-menu-title"></div>
                  <div class="mobile-menu-close">&times;</div>
                </div>
                <ul class="menu-main">
                  <li class="menu-item-has-children">
                    <a href="#">About Us <i class="fa fa-angle-down"></i></a>
                    <div class="sub-menu single-column-menu">
                      <ul>
                        <li><a href="#">Introduction</a></li>
                        <li><a href="#">Vision & Mission</a></li>
                        <li><a href="#">Chairman’s Message</a></li>
                        <li><a href="#">Associations</a></li>
                        <!-- <li><a href="#">Our Journey</a></li> -->
                        <li><a href="#">Somaiya Prayer</a></li>
                        <!-- 
                          <li><a href="#">Associations</a></li> -->
                        <li><a href="#">Management Team</a></li>
                        <li><a href="#">CSR & Sustainability</a></li>
                        <li><a href="#">Accreditations</a></li>
                        <li><a href="#">Community Outreach</a></li>
                        <li><a href="#">Awards & Accolades</a></li>
                      </ul>
                    </div>
                  </li>
                  <li class="menu-item-has-children">
                    <a href="#">Medical Services <i class="fa fa-angle-down"></i></a>
                    <div class="sub-menu mega-menu mega-menu-column-4">
                      <div class="list-item">
                        <div class="row mega-menu-container">
                          <!-- LEFT VERTICAL TABS (DESKTOP) -->
                          <div class="col-sm-4 hidden-xs">
                            <ul class="nav nav-pills nav-stacked mega-vertical-tabs">
                              <li class="active"><a href="#v1" data-toggle="tab">Specialties <i class="fa fa-angle-right"></i></a></li>
                              <li><a href="#v2" data-toggle="tab">Diagnostic Services <i class="fa fa-angle-right"></i></a></li>
                              <li><a href="#v3" data-toggle="tab">Clinical Services <i class="fa fa-angle-right"></i></a></li>
                            </ul>
                          </div>
                          <!-- RIGHT CONTENT (DESKTOP) -->
                          <div class="col-sm-8 hidden-xs">
                            <div class="tab-content">
                              <div class="tab-pane fade in active" id="v1">
                                <div class="tab-box">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <ul class="menu_tab_list">
                                        <li><a href="#">Anaesthesia</a></li>
                                        <li><a href="#">Cardiology</a></li>
                                        <li><a href="#">Cardio Vascular Thoracic Surgery (CVTS)</a></li>
                                        <li><a href="#">Dental</a></li>
                                        <li><a href="#">Dermatology</a></li>
                                        <li><a href="#">Ear Nose and Throat (ENT)</a></li>
                                        <li><a href="#">Gastroenterology</a></li>
                                        <li><a href="#">General & Laparoscopic Surgery</a></li>
                                        <li><a href="#">General Medicine</a></li>
                                        <li><a href="#">Haematology</a></li>
                                        <li><a href="#">Interventional Radiology</a></li>
                                        <li><a href="#">Medical Oncology</a></li>
                                        <li><a href="#">Nephrology</a></li>
                                        <li><a href="#">Nutrition & Dietetics</a></li>
                                      </ul>
                                    </div>
                                    <div class="col-md-6">
                                      <ul class="menu_tab_list">
                                        <li><a href="#">Neurology</a></li>
                                        <li><a href="#">Neurosurgery</a></li>
                                        <li><a href="#">Obstetrics & Gynaecology</a></li>
                                        <li><a href="#">Ophthalmology</a></li>
                                        <li><a href="#">Orthopaedics</a></li>
                                        <li><a href="#">Paediatrics</a></li>
                                        <li><a href="#">Paediatric Surgery</a></li>
                                        <li><a href="#">Plastic Surgery</a></li>
                                        <li><a href="#">Psychiatry</a></li>
                                        <li><a href="#">Radiology</a></li>
                                        <li><a href="#">Respiratory Medicine</a></li>
                                        <li><a href="#">Surgical Oncology</a></li>
                                        <li><a href="#">Urology</a></li>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="tab-pane fade" id="v2">
                                <div class="tab-box">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <ul class="menu_tab_list">
                                        <li class="heading_bullet">
                                          <a href="#">
                                            <h5>Radiology</h5>
                                          </a>
                                        </li>
                                        <li><a href="#">CTScan</a></li>
                                        <li><a href="#">Xray</a></li>
                                        <li><a href="#">MRI</a></li>
                                        <li><a href="#">USG</a></li>
                                        <li><a href="#">Mammography</a></li>
                                        <li class="heading_bullet">
                                          <a href="#">
                                            <h5>Laboratory</h5>
                                          </a>
                                        </li>
                                        <li><a href="#">Biochemistry</a></li>
                                        <li><a href="#">Hematology</a></li>
                                        <li><a href="#">Microbiology</a></li>
                                        <li><a href="#">Histopathology</a></li>
                                        <li><a href="#">Clinical Pathology</a></li>
                                      </ul>
                                    </div>
                                    <div class="col-md-6">
                                      <ul class="menu_tab_list">
                                        <li class="heading_bullet">
                                          <a href="#">
                                            <h5>Non Invasive</h5>
                                          </a>
                                        </li>
                                        <li><a href="#">ECG</a></li>
                                        <li><a href="#">2D Echo/Stress Test/ Holter Monitor</a></li>
                                        <li class="heading_bullet">
                                          <a href="#">
                                            <h5>Neuro Diagnostics</h5>
                                          </a>
                                        </li>
                                        <li><a href="#">EEG</a></li>
                                        <li><a href="#">EMG</a></li>
                                        <li><a href="#">NCV</a></li>
                                        <li class="heading_bullet">
                                          <a href="#">
                                            <h5>Audiometry</h5>
                                          </a>
                                        </li>
                                        <li class="heading_bullet">
                                          <a href="#">
                                            <h5>PFT</h5>
                                          </a>
                                        </li>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!--<div class="tab-pane fade" id="v3">-->
                              <!--  <div class="tab-box">-->
                              <!--    <div class="row">-->
                              <!--      <div class="col-md-6">-->
                              <!--        <ul class="menu_tab_list">-->
                              <!--          <li><a href="#">CTScan</a></li>-->
                              <!--          <li><a href="#">Xray</a></li>-->
                              <!--          <li><a href="#">MRI</a></li>-->
                              <!--          <li><a href="#">USG</a></li>-->
                              <!--        </ul>-->
                              <!--      </div>-->
                              <!--      <div class="col-md-6">-->
                              <!--        <ul class="menu_tab_list">-->
                              <!--          <li><a href="#">CTScan</a></li>-->
                              <!--          <li><a href="#">Xray</a></li>-->
                              <!--          <li><a href="#">MRI</a></li>-->
                              <!--          <li><a href="#">USG</a></li>-->
                              <!--        </ul>-->
                              <!--      </div>-->
                              <!--    </div>-->
                              <!--  </div>-->
                              <!--</div>-->
                            </div>
                          </div>
                          <!-- MOBILE ACCORDION -->
                          <div class="visible-xs">
                            <div class="panel-group" id="mobileAccordion">
                              <div class="panel panel-default">
                                <div class="panel-heading">
                                  <h4 class="panel-title"><a data-toggle="collapse" data-parent="#mobileAccordion" href="#m1">Specialities <i class="fa fa-chevron-down"></i></a></h4>
                                </div>
                                <div id="m1" class="panel-collapse collapse in">
                                  <div class="panel-body">
                                    <div class="row">
                                      <div class="col-md-6">
                                        <ul class="menu_tab_list">
                                          <li><a href="#">Anaesthesia</a></li>
                                          <li><a href="#">Cardiology</a></li>
                                          <li><a href="#">Cardio Vascular Thoracic Surgery (CVTS)</a></li>
                                          <li><a href="#">Dental</a></li>
                                          <li><a href="#">Dermatology</a></li>
                                          <li><a href="#">Ear Nose and Throat (ENT)</a></li>
                                          <li><a href="#">Gastroenterology</a></li>
                                          <li><a href="#">General & Laparoscopic Surgery</a></li>
                                          <li><a href="#">General Medicine</a></li>
                                          <li><a href="#">Haematology</a></li>
                                          <li><a href="#">Interventional Radiology</a></li>
                                          <li><a href="#">Medical Oncology</a></li>
                                          <li><a href="#">Nephrology</a></li>
                                          <li><a href="#">Nutrition & Dietetics</a></li>
                                        </ul>
                                      </div>
                                      <div class="col-md-6">
                                        <ul class="menu_tab_list">
                                          <li><a href="#">Neurology</a></li>
                                          <li><a href="#">Neurosurgery</a></li>
                                          <li><a href="#">Obstetrics & Gynaecology</a></li>
                                          <li><a href="#">Ophthalmology</a></li>
                                          <li><a href="#">Orthopaedics</a></li>
                                          <li><a href="#">Paediatrics</a></li>
                                          <li><a href="#">Paediatric Surgery</a></li>
                                          <li><a href="#">Plastic Surgery</a></li>
                                          <li><a href="#">Psychiatry</a></li>
                                          <li><a href="#">Radiology</a></li>
                                          <li><a href="#">Respiratory Medicine</a></li>
                                          <li><a href="#">Surgical Oncology</a></li>
                                          <li><a href="#">Urology</a></li>
                                        </ul>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="panel panel-default">
                                <div class="panel-heading">
                                  <h4 class="panel-title"><a data-toggle="collapse" data-parent="#mobileAccordion" href="#m2">Diagnostic Services <i class="fa fa-chevron-down"></i></a></h4>
                                </div>
                                <div id="m2" class="panel-collapse collapse">
                                  <div class="panel-body">
                                    <div class="row">
                                      <div class="col-md-6">
                                        <ul class="menu_tab_list">
                                          <li class="heading_bullet">
                                            <a href="#">
                                              <h5>Radiology</h5>
                                            </a>
                                          </li>
                                          <li><a href="#">CTScan</a></li>
                                          <li><a href="#">Xray</a></li>
                                          <li><a href="#">MRI</a></li>
                                          <li><a href="#">USG</a></li>
                                          <li><a href="#">Mammography</a></li>
                                          <li class="heading_bullet">
                                            <a href="#">
                                              <h5>Laboratory</h5>
                                            </a>
                                          </li>
                                          <li><a href="#">Biochemistry</a></li>
                                          <li><a href="#">Hematology</a></li>
                                          <li><a href="#">Microbiology</a></li>
                                          <li><a href="#">Histopathology</a></li>
                                          <li><a href="#">Clinical Pathology</a></li>
                                        </ul>
                                      </div>
                                      <div class="col-md-6">
                                        <ul class="menu_tab_list">
                                          <li class="heading_bullet">
                                            <a href="#">
                                              <h5>Non Invasive</h5>
                                            </a>
                                          </li>
                                          <li><a href="#">ECG</a></li>
                                          <li><a href="#">2D Echo/Stress Test/ Holter Monitor</a></li>
                                          <li class="heading_bullet">
                                            <a href="#">
                                              <h5>Neuro Diagnostics</h5>
                                            </a>
                                          </li>
                                          <li><a href="#">EEG</a></li>
                                          <li><a href="#">EMG</a></li>
                                          <li><a href="#">NCV</a></li>
                                          <li class="heading_bullet">
                                            <a href="#">
                                              <h5>Audiometry</h5>
                                            </a>
                                          </li>
                                          <li class="heading_bullet">
                                            <a href="#">
                                              <h5>PFT</h5>
                                            </a>
                                          </li>
                                        </ul>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="panel panel-default">
                                <div class="panel-heading">
                                  <h4 class="panel-title"><a data-toggle="collapse" data-parent="#mobileAccordion" href="#m3">Clinical Services <i class="fa fa-chevron-down"></i></a></h4>
                                </div>
                                <div id="m3" class="panel-collapse collapse">
                                  <div class="panel-body">
                                    <div class="row">
                                      <div class="col-md-6">
                                        <ul class="menu_tab_list">
                                          <li><a href="#">CTScan</a></li>
                                          <li><a href="#">Xray</a></li>
                                          <li><a href="#">MRI</a></li>
                                          <li><a href="#">USG</a></li>
                                        </ul>
                                      </div>
                                      <div class="col-md-6">
                                        <ul class="menu_tab_list">
                                          <li><a href="#">CTScan</a></li>
                                          <li><a href="#">Xray</a></li>
                                          <li><a href="#">MRI</a></li>
                                          <li><a href="#">USG</a></li>
                                        </ul>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- <div class="list-item">
                        <h4 class="title empty-title-menu"></h4>
                        <ul>
                          <li><a href="#">General Medicine</a></li>
                          <li><a href="#">Haematology</a></li>
                          <li><a href="#">Interventional Radiology</a></li>
                          <li><a href="#">Medical Oncology</a></li>
                          <li><a href="#">Nephrology</a></li>
                          <li><a href="#">Nutrition & Dietetics</a></li>
                          <li><a href="#">Neurology</a></li>
                          <li><a href="#">Neurosurgery</a></li>
                          <li><a href="#">Obstetrics & Gynaecology</a></li>
                          <li><a href="#">Ophthalmology</a></li>
                        </ul>
                        </div>
                        <div class="list-item">
                        <h4 class="title empty-title-menu"></h4>
                        <ul>
                          <li><a href="#">Orthopaedics</a></li>
                          <li><a href="#">Paediatrics</a></li>
                          <li><a href="#">Paediatric Surgery</a></li>
                          <li><a href="#">Plastic Surgery</a></li>
                          <li><a href="#">Psychiatry</a></li>
                          <li><a href="#">Radiology</a></li>
                          <li><a href="#">Respiratory Medicine</a></li>
                          <li><a href="#">Surgical Oncology</a></li>
                          <li><a href="#">Urology</a></li>
                        </ul>
                        </div>
                        <div class="list-item">
                        <h4 class="title">Diagnostic Services</h4>
                        <ul>
                          <li><a href="#">Biochemistry</a></li>
                          <li><a href="#">Microbiology</a></li>
                          <li><a href="#">Pathology</a></li>
                        </ul>
                        <h4 class="title">Subsites</h4>
                        <ul>
                          <li><a href="#">Physiotherapy</a></li>
                          <li><a href="#">Ayurveda</a></li>
                          <li><a href="#">Blood Bank</a></li>
                        </ul>
                        </div> -->
                    </div>
                  </li>
                  <li class="menu-item-has-children">
                    <a href="#">Patient Services <i class="fa fa-angle-down"></i></a>
                    <div class="sub-menu single-column-menu">
                      <ul>
                        <li><a href="#">Inpatient Services</a></li>
                        <li><a href="#">Visitor Guide</a></li>
                        <li><a href="#">Rights & Responsibilities</a></li>
                        <li><a href="#">Convenience & Facilities</a></li>
                        <!--<li><a href="#">Maps & Directions</a></li>-->
                        <!-- <li><a href="#">Nearby Lodging Facilities</a></li> -->
                        <!--<li><a href="#">Contact Directory</a></li>-->
                        <!-- <li><a href="#">Payment Method</a></li> -->
                        <li><a href="#">Insurance & TPA</a></li>
                        <li><a href="#">Government Schemes</a></li>
                        <li><a href="#">Billing Process</a></li>
                        <!-- <li><a href="#">Patients Safety</a></li> -->
                        <!-- <li><a href="#">Infection Control</a></li> -->
                        <!-- <li><a href="#">Biomedical Waste</a></li> -->
                        <!-- <li><a href="#">FAQ’s</a></li> -->
                      </ul>
                    </div>
                  </li>
                  <li class="menu-item-has-children">
                    <a href="#"> Wellness Centre <i class="fa fa-angle-down"></i></a>
                    <div class="sub-menu single-column-menu">
                      <ul>
                        <li><a href="#">Health Packages</a></li>
                        <li><a href="#">Ayurveda</a></li>
                        <!-- <li><a href="#">Acupressure and Acupuncture</a></li> -->
                        <!-- <li><a href="#">Yoga</a></li> -->
                        <!-- <li><a href="#">Physiotherapy</a></li> -->
                        <li>
                          <a href="#">
                            <!-- Other --> Alternative Therapies
                          </a>
                        </li>
                      </ul>
                    </div>
                  </li>
                 
                </ul>
              </nav>
            </div>
            <!-- menu end here -->
            <div class="header-item item-right">
              <ul class="somaiya_sidelogo">
                <li><img src="{{ asset('frontend/assets/img/logo/NABH-logo.png')}}" style="width: 77px !important;"></li>
                <li><img src="{{ asset('frontend/assets/img/logo/nabl.png')}}"></li>
                <li><img src="{{ asset('frontend/assets/img/logo/somaiya-trust-logo.png')}}"></li>
              </ul>
            
              <!-- Hidden default Google widget -->
              <div id="google_translate_element"></div>
              <!-- Custom dropdown (Indian languages first, full list) -->
              <select id="customTranslate" aria-label="Select language">
                <option value="">EN</option>
                <!-- Indian languages first -->
                <option value="en">English</option>
                <option value="hi">Hindi</option>
                <option value="mr">Marathi</option>
                <option value="gu">Gujarati</option>
                <option value="bn">Bengali</option>
                <option value="te">Telugu</option>
                <option value="ta">Tamil</option>
                <option value="ur">Urdu</option>
                <option value="kn">Kannada</option>
                <option value="ml">Malayalam</option>
                <option value="pa">Punjabi</option>
                <option value="or">Odia</option>
                <option value="as">Assamese</option>
                <option value="sd">Sindhi</option>
                <option value="ne">Nepali</option>
                <!-- All other languages (from your list) -->
                <option value="af">Afrikaans</option>
                <option value="sq">Albanian</option>
                <option value="am">Amharic</option>
                <option value="ar">Arabic</option>
                <option value="hy">Armenian</option>
                <option value="az">Azerbaijani</option>
                <option value="eu">Basque</option>
                <option value="be">Belarusian</option>
                <option value="bg">Bulgarian</option>
                <option value="bs">Bosnian</option>
                <option value="ca">Catalan</option>
                <option value="ceb">Cebuano</option>
                <option value="zh-CN">Chinese (Simplified)</option>
                <option value="zh-TW">Chinese (Traditional)</option>
                <option value="co">Corsican</option>
                <option value="hr">Croatian</option>
                <option value="cs">Czech</option>
                <option value="da">Danish</option>
                <option value="nl">Dutch</option>
                <option value="eo">Esperanto</option>
                <option value="et">Estonian</option>
                <option value="fi">Finnish</option>
                <option value="fr">French</option>
                <option value="fy">Frisian</option>
                <option value="gl">Galician</option>
                <option value="ka">Georgian</option>
                <option value="de">German</option>
                <option value="el">Greek</option>
                <option value="ht">Haitian Creole</option>
                <option value="ha">Hausa</option>
                <option value="haw">Hawaiian</option>
                <option value="iw">Hebrew</option>
                <option value="hmn">Hmong</option>
                <option value="hu">Hungarian</option>
                <option value="is">Icelandic</option>
                <option value="ig">Igbo</option>
                <option value="id">Indonesian</option>
                <option value="ga">Irish</option>
                <option value="it">Italian</option>
                <option value="ja">Japanese</option>
                <option value="jw">Javanese</option>
                <option value="kk">Kazakh</option>
                <option value="km">Khmer</option>
                <option value="rw">Kinyarwanda</option>
                <option value="ko">Korean</option>
                <option value="ku">Kurdish</option>
                <option value="ky">Kyrgyz</option>
                <option value="lo">Lao</option>
                <option value="la">Latin</option>
                <option value="lv">Latvian</option>
                <option value="lt">Lithuanian</option>
                <option value="lb">Luxembourgish</option>
                <option value="mk">Macedonian</option>
                <option value="mg">Malagasy</option>
                <option value="ms">Malay</option>
                <option value="mt">Maltese</option>
                <option value="mi">Maori</option>
                <option value="mn">Mongolian</option>
                <option value="my">Myanmar (Burmese)</option>
                <option value="no">Norwegian</option>
                <option value="ny">Nyanja</option>
                <option value="ps">Pashto</option>
                <option value="fa">Persian</option>
                <option value="pl">Polish</option>
                <option value="pt">Portuguese</option>
                <option value="ro">Romanian</option>
                <option value="ru">Russian</option>
                <option value="sm">Samoan</option>
                <option value="gd">Scots Gaelic</option>
                <option value="sr">Serbian</option>
                <option value="st">Sesotho</option>
                <option value="si">Sinhala</option>
                <option value="sk">Slovak</option>
                <option value="sl">Slovenian</option>
                <option value="so">Somali</option>
                <option value="es">Spanish</option>
                <option value="su">Sundanese</option>
                <option value="sw">Swahili</option>
                <option value="sv">Swedish</option>
                <option value="tl">Tagalog</option>
                <option value="tg">Tajik</option>
                <option value="tt">Tatar</option>
                <option value="te">Telugu</option>
                <!-- duplicate safe -->
                <option value="th">Thai</option>
                <option value="tr">Turkish</option>
                <option value="tk">Turkmen</option>
                <option value="uk">Ukrainian</option>
                <option value="ur">Urdu</option>
                <option value="ug">Uyghur</option>
                <option value="uz">Uzbek</option>
                <option value="vi">Vietnamese</option>
                <option value="cy">Welsh</option>
                <option value="xh">Xhosa</option>
                <option value="yi">Yiddish</option>
                <option value="yo">Yoruba</option>
                <option value="zu">Zulu</option>
              </select>
              <!--  <ul class="somaiya_sidelogo">
                <li><img src="img/logo/NABH-logo.png"></li>
                <li><img src="img/logo/nabl.png"></li>
                <li><img src="img/logo/somaiya-trust-logo.png"></li>
                </ul> -->
              <!-- <a href="#" class="serach_bar"><img src="img/icon/phone.png"></a>
                <a href="#" class="serach_bar"><img src="img/icon/search.svg"></a> -->
              <!-- <a href="#" class="emergency_bar"><img src="img/icon/emergency-bell.svg"></a> -->
              <!-- mobile menu trigger -->
              <div class="mobile-menu-trigger">
                <span></span>
              </div>
            </div>
          </div>
        </div>
      </header>


      <!-- Modal -->
      <div id="health-checkup" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content -->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Book Health Check</h4>
            </div>
            <div class="modal-body">
              <div class="row">
                <h6 class="form-title">please fill out all required fields meaning</h6>
                <form class="book-appoint-form">
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Name" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Package" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Date of Birth:</label>
                    <input type="date" class="form-control" placeholder="" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Date of Appointment :</label>
                    <input type="date" class="form-control" placeholder="" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="email" class="form-control" placeholder="Email ID" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Mobile Number" required>
                  </div>
                </div>
                
                <div class="col-md-12">
                  <div class="button-box">
                    <a class="twenty" href="#"><span>Submit</span></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    
      <div id="bookappointment-services" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content -->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Book Appointment</h4>
            </div>
            <div class="modal-body">
              <div class="row">
                <h6 class="form-title">please fill out all required fields meaning</h6>
                <form class="book-appoint-form">
                <div class="col-md-8">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter Patient Name" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <select class="form-control">
                      <option>--Select Gender--</option>
                      <option>Male</option>
                      <option>Female</option>
                      <option>Other</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Mobile Number" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Email Address" required>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Pincode" required>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <select class="form-control">
                      <option>--Select Country--</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <select class="form-control">
                      <option>--Select State--</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <select class="form-control">
                      <option>--Select City--</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <select class="form-control">
                      <option>--Select Speciality--</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label></label>
                    <input type="text" class="form-control" placeholder="Doctor Name" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Appointment Date:</label>
                    <input type="date" class="form-control" placeholder="Appointment Date" required>
                  </div>
                </div>
                <!-- <div class="col-md-12">
                  <div class="form-group">
                  <textarea class="form-control" rows="5" placeholder="Message" required></textarea>
                  </div>
                  </div> -->
                <div class="col-md-12">
                  <div class="button-box">
                    <a class="twenty" href="#"><span>Submit</span></a>
                  </div>
                </div>
              </div>
            </div>
            <!-- <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">
              Close
              </button>
              </div> -->
          </div>
        </div>
      </div>
    <!-- Modal -->
    