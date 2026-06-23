/*function sticky_relocate() {
      var window_top = $(window).scrollTop();
      var div_top = $('#sticky-anchor').offset().top;
      if (window_top > div_top) {
      $('#sticky').addClass('stick');
      } else {
      $('#sticky').removeClass('stick');
      }
      }
      
      $(function() {
      $(window).scroll(sticky_relocate);
      sticky_relocate();
      });*/
$('.journey-slider').owlCarousel({
  loop: true,
  margin: 30,
  nav: true,
  dots: false,
  autoplay: true,
  autoplayTimeout: 3500,
  autoplayHoverPause: true,
  navText: ['‹','›'],
  responsive:{
    0:{ items:1 },
    768:{ items:2 },
    992:{ items:3 }
  }
});
$('#specialities').owlCarousel({
  loop: true,
  margin: 10,
  /*stagePadding: 20,*/
  dots: true,
  navigation: false,
  autoplay: true,
  autoplaySpeed: 1000,
  /*slideTransition: 'linear',*/
  autoplayTimeout: 3000,
  autoplaySpeed: 3000,
  autoplayHoverPause: true,
  navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
  responsiveClass: true,
  responsive: {
    0: {
      items: 1
    },
    500: {
      items: 1
    },
    768: {
      items: 1
    },
    1000: {
      items: 1
    }
  }
});
$('#awards').owlCarousel({
  loop: true,
  margin: 20,
  /*stagePadding: 20,*/
  dots: true,
  navigation: true,
  autoplay: true,
  autoplaySpeed: 1000,
  /*slideTransition: 'linear',*/
  autoplayTimeout: 3000,
  autoplaySpeed: 3000,
  autoplayHoverPause: true,
  navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
  responsiveClass: true,
  responsive: {
    0: {
      items: 2
    },
    500: {
      items: 2
    },
    768: {
      items: 2
    },
    1000: {
      items: 3
    }
  }
});
$('#room-gallery').owlCarousel({
  loop: true,
    margin: 30,
    dots: false,
    nav: true,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplaySpeed: 1000,
    autoplayHoverPause: true,
    navText: [
        '<i class="fa fa-angle-left"></i>',
        '<i class="fa fa-angle-right"></i>'
    ],
    responsive: {
        0: {
            items: 1,
            nav: true
        },
        500: {
            items: 1,
            nav: true
        },
        768: {
            items: 1
        },
        1000: {
            items: 1
        }
    }
});
/*$('#doctor').owlCarousel({
  loop: true,
  margin: 20,*/
  /*stagePadding: 20,*/
  /*dots: true,
  navigation: true,
  autoplay: true,
  autoplaySpeed: 1000,*/
  /*slideTransition: 'linear',*/
  /*autoplayTimeout: 3000,
  autoplaySpeed: 3000,
  autoplayHoverPause: true,
  navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
  responsiveClass: true,
  responsive: {
    0: {
      items: 1
    },
    500: {
      items: 1
    },
    768: {
      items: 2
    },
    1000: {
      items: 3
    }
  }
});*/
var doctorItems = $('#doctor').children().length;

$('#doctor').owlCarousel({
    loop: doctorItems > 3,
    margin: 20,
   /* center: true,*/
    dots: doctorItems > 3,
   /* nav: doctorItems > 3,*/
    autoplay: doctorItems > 3,
    autoplayTimeout: 3000,
    autoplaySpeed: 3000,
    autoplayHoverPause: true,
    /*navText: [
        '<i class="fa fa-angle-left"></i>',
        '<i class="fa fa-angle-right"></i>'
    ],*/
    responsive: {
        0: {
            items: 1
        },
        500: {
            items: 1
        },
        768: {
            items: 2
        },
        1000: {
            items: 3
        }
    }
});
var itemCount = $('#doctor .owl-item:not(.cloned)').length;

if(itemCount <= 2){
    $('#doctor .owl-stage-outer').css({
        'display':'flex',
        'justify-content':'center'
    });
}
$('#testimonial').owlCarousel({
  loop: true,
  margin: 10,
  /*stagePadding: 20,*/
  dots: true,
  navigation: false,
  autoplay: true,
  autoplaySpeed: 1000,
  /*slideTransition: 'linear',*/
  autoplayTimeout: 3000,
  autoplaySpeed: 3000,
  autoplayHoverPause: true,
  navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
  responsiveClass: true,
  responsive: {
    0: {
      items: 1
    },
    500: {
      items: 1
    },
    768: {
      items: 1
    },
    1000: {
      items: 3
    }
  }
});
$('#patient-testimonial').owlCarousel({
  loop: true,
  margin: 20,
  /*stagePadding: 20,*/
  dots: true,
  navigation: false,
  autoplay: true,
  autoplaySpeed: 1000,
  /*slideTransition: 'linear',*/
  autoplayTimeout: 3000,
  autoplaySpeed: 3000,
  autoplayHoverPause: true,
  navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
  responsiveClass: true,
  responsive: {
    0: {
      items: 1
    },
    500: {
      items: 1
    },
    768: {
      items: 1
    },
    1000: {
      items: 3
    }
  }
});
$('#video-testimonial').owlCarousel({
  loop: true,
  margin: 10,
  /*stagePadding: 20,*/
  dots: true,
  navigation: false,
  autoplay: true,
  autoplaySpeed: 1000,
  /*slideTransition: 'linear',*/
  autoplayTimeout: 3000,
  autoplaySpeed: 3000,
  autoplayHoverPause: true,
  navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
  responsiveClass: true,
  responsive: {
    0: {
      items: 1
    },
    500: {
      items: 1
    },
    768: {
      items: 1
    },
    1000: {
      items: 3
    }
  }
});
$('#services-blog').owlCarousel({
  loop: true,
  margin: 30,
  /*stagePadding: 20,*/
  dots: true,
  navigation: false,
  autoplay: true,
  autoplaySpeed: 1000,
  /*slideTransition: 'linear',*/
  autoplayTimeout: 3000,
  autoplaySpeed: 3000,
  autoplayHoverPause: true,
  navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
  responsiveClass: true,
  responsive: {
    0: {
      items: 1
    },
    500: {
      items: 1
    },
    768: {
      items: 1
    },
    1000: {
      items: 3
    }
  }
});
$('#our-value').owlCarousel({
  loop: true,
  margin: 30,
  /*stagePadding: 20,*/
  dots: true,
  navigation: false,
  autoplay: true,
  autoplaySpeed: 1000,
  /*slideTransition: 'linear',*/
  autoplayTimeout: 3000,
  autoplaySpeed: 3000,
  autoplayHoverPause: true,
  navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
  responsiveClass: true,
  responsive: {
    0: {
      items: 1
    },
    500: {
      items: 1
    },
    768: {
      items: 1
    },
    1000: {
      items: 3
    }
  }
});
$('#outreach-services').owlCarousel({
  loop: true,
  margin: 20,
  /*stagePadding: 20,*/
  dots: true,
  navigation: false,
  autoplay: true,
  autoplaySpeed: 1000,
  /*slideTransition: 'linear',*/
  autoplayTimeout: 3000,
  autoplaySpeed: 3000,
  autoplayHoverPause: true,
  navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
  responsiveClass: true,
  responsive: {
    0: {
      items: 1
    },
    500: {
      items: 1
    },
    768: {
      items: 1
    },
    1000: {
      items: 2
    }
  }
});
$('#ourservices-img').owlCarousel({
  loop: true,
  margin: 30,
  /*stagePadding: 20,*/
  dots: true,
  navigation: false,
  autoplay: true,
  autoplaySpeed: 1000,
  /*slideTransition: 'linear',*/
  autoplayTimeout: 5000,
  autoplaySpeed: 5000,
  autoplayHoverPause: true,
  navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
  responsiveClass: true,
  responsive: {
    0: {
      items: 1
    },
    500: {
      items: 1
    },
    768: {
      items: 1
    },
    1000: {
      items: 1
    }
  }
});
$('#ourservices-items').owlCarousel({
  loop: true,
  margin: 30,
  /*stagePadding: 20,*/
  dots: false,
  navigation: true,
  autoplay: true,
  autoplaySpeed: 1000,
  /*slideTransition: 'linear',*/
  autoplayTimeout: 5000,
  autoplaySpeed: 5000,
  autoplayHoverPause: true,
  navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
  responsiveClass: true,
  responsive: {
    0: {
      items: 1
    },
    500: {
      items: 1
    },
    768: {
      items: 1
    },
    1000: {
      items: 1
    }
  }
});
$('#csr-gallery').owlCarousel({
    loop: true,
    margin: 30,
    dots: false,
    nav: true,
    autoplay: true,
    autoplayTimeout: 5000,
    autoplaySpeed: 1000,
    autoplayHoverPause: true,
    navText: [
        '<i class="fa fa-angle-left"></i>',
        '<i class="fa fa-angle-right"></i>'
    ],
    responsive: {
        0: {
            items: 1,
            nav: true
        },
        500: {
            items: 2,
            nav: true
        },
        768: {
            items: 2
        },
        1000: {
            items: 4
        }
    }
});
$('#announcements-slider').owlCarousel({
  loop: true,
  margin: 30,
  /*stagePadding: 20,*/
  dots: true,
  navigation: true,
  autoplay: true,
  autoplaySpeed: 1000,
  /*slideTransition: 'linear',*/
  autoplayTimeout: 5000,
  autoplaySpeed: 5000,
  autoplayHoverPause: true,
  navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
  responsiveClass: true,
  responsive: {
    0: {
      items: 1
    },
    500: {
      items: 1
    },
    768: {
      items: 1
    },
    1000: {
      items: 3
    }
  }
});
$('#health-package-slider').owlCarousel({
  loop: true,
  margin: 30,
  /*stagePadding: 20,*/
  dots: true,
  navigation: true,
  autoplay: true,
  autoplaySpeed: 1000,
  /*slideTransition: 'linear',*/
  autoplayTimeout: 5000,
  autoplaySpeed: 5000,
  autoplayHoverPause: true,
  navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
  responsiveClass: true,
  responsive: {
    0: {
      items: 1
    },
    500: {
      items: 1
    },
    768: {
      items: 1
    },
    1000: {
      items: 3
    }
  }
});
$(document).ready(function () {
  $('.process-slider').owlCarousel({
    loop: false,
    margin: 30,
    nav: true,
    dots: false,
    autoplay: true,
    autoplaySpeed: 1000,
    /*slideTransition: 'linear',*/
    autoplayTimeout: 3000,
    autoplaySpeed: 3000,
    autoplayHoverPause: true,
    navText: [
      "<i class='fa fa-chevron-left'></i>",
      "<i class='fa fa-chevron-right'></i>"
    ],
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 2
      },
      1000: {
        items: 4
      }
    }
  });
});
// Handle video popup
$(document).ready(function () {
  var $videoSrc;
  $('.video-box').click(function () {
    $videoSrc = $(this).data("video");
    $("#videoModal iframe").attr('src', $videoSrc);
  });

  // stop video when modal closes
  $('#videoModal').on('hide.bs.modal', function () {
    $("#videoModal iframe").attr('src', '');
  });
});

// Toggle chevron rotation
$('.panel-heading').on('click', function () {
  $('.panel-heading').removeClass('active');
  if (!$(this).next().hasClass('in')) {
    $(this).addClass('active');
  }
});

/*-----------------------------------
   Back to Top
   -----------------------------------*/
var btn = $('#button');

$(window).scroll(function () {
  if ($(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

btn.on('click', function (e) {
  e.preventDefault();
  $('html, body').animate({
    scrollTop: 0
  }, '300');
});


$(document).ready(function () {
  let scroll_link = $('.scroll');

  //smooth scrolling -----------------------
  scroll_link.click(function (e) {
    e.preventDefault();
    let url = $('body').find($(this).attr('href')).offset().top - 90;
    $('html, body').animate({
      scrollTop: url
    }, 700);
    $(this).parent().addClass('active');
    $(this).parent().siblings().removeClass('active');
    return false;
  });
});

// sticky
$(window).on('scroll', function () {
  var scroll = $(window).scrollTop();
  if (scroll < 200) {
    $("#header-sticky").removeClass("sticky-menu");
  } else {
    $("#header-sticky").addClass("sticky-menu");
  }
});
// Show floating icons after scrolling 200px
$(window).scroll(function () {
  if ($(this).scrollTop() > 100) {
    $('#floatingIcons').fadeIn(300);
  } else {
    $('#floatingIcons').fadeOut(300);
  }
});
/*Call Us side menu*/
/*function openMenu() {
    document.getElementById("sideMenu").classList.add("open");
}
function closeMenu() {
    document.getElementById("sideMenu").classList.remove("open");
}*/
$('.mega-vertical-tabs li a').hover(function () {
  $(this).tab('show');
});
//wow js
var wow = new WOW({
  animateClass: 'animated',
  offset: 100,
  mobile: false,
  duration: 1000,
});
wow.init();

function openImage(imgSrc) {
  $('#fullImage').attr('src', imgSrc);
  $('#imageModal').modal('show');
}

/*counter*/
var a = 0;

          $(window).scroll(function () {

              var counter = $('#counter');

              // Check if counter exists
              if (!counter.length) {
                  return;
              }

              var oTop = counter.offset().top - window.innerHeight;

              if (a === 0 && $(window).scrollTop() > oTop) {

                  $('.counter-value').each(function () {

                      var $this = $(this);
                      var countTo = parseInt($this.attr('data-count'));
                      var $number = $this.find('.count-number'); // Animate only this span

                      $({ countNum: 0 }).animate(
                          { countNum: countTo },
                          {
                              duration: 2000,
                              easing: 'swing',
                              step: function () {
                                  $number.text(Math.floor(this.countNum));
                              },
                              complete: function () {
                                  $number.text(this.countNum);
                              }
                          }
                      );

                  });

                  a = 1;  // Run only once
              }

          }); 


/*Sidebar Sticky*/
document.addEventListener("DOMContentLoaded", function () {

  var sidebar = document.querySelector(".sidebar_filter");
  var section = document.querySelector(".health_package_wrap, .find_doctor_wrap");
  var parentCol = document.querySelector(".health_package_wrap .col-md-3, .find_doctor_wrap .doctor-card");
  var header = document.querySelector("header");

  // Run script only if all required elements exist
  if (!sidebar || !section || !parentCol || !header) {
    return;
  }

  var headerHeight = header.offsetHeight || 100;

  window.addEventListener("scroll", function () {

    var scrollTop = window.pageYOffset;
    var sidebarHeight = sidebar.offsetHeight;

    // Safe bounding rectangle calculation
    var rect = section.getBoundingClientRect();
    var sectionTop = rect.top + window.pageYOffset;
    var sectionBottom = sectionTop + section.offsetHeight;

    // Adjust width dynamically
    var colWidth = parentCol.offsetWidth;
    sidebar.style.width = colWidth + "px";

    if (scrollTop > sectionTop - headerHeight &&
       (scrollTop + sidebarHeight + headerHeight) < sectionBottom) {

      sidebar.style.position = "fixed";
      sidebar.style.top = headerHeight + "px";

    } else if ((scrollTop + sidebarHeight + headerHeight) >= sectionBottom) {

      sidebar.style.position = "absolute";
      sidebar.style.bottom = "0";
      sidebar.style.top = "auto";

    } else {

      sidebar.style.position = "static";

    }

  });

});

/*Pagination*/
$(document).ready(function () {

  var itemsPerPage = 6; // Change this to show more items per page
  var items = $('#content .item-box');
  var currentPage = 1;
  var numPages = Math.ceil(items.length / itemsPerPage);

  function buildPagination() {
    var html = '';

    // Previous button
    html += '<li class="prev disabled"><a href="#">« Prev</a></li>';

    // Numbered pages
    for (var i = 1; i <= numPages; i++) {
      html += '<li class="page-num" data-page="' + i + '"><a href="#">' + i + '</a></li>';
    }

    // Next button
    html += '<li class="next"><a href="#">Next »</a></li>';

    $('#pagination').html(html);
  }

  function showPage(page) {
    items.hide();

    var start = (page - 1) * itemsPerPage;
    var end = start + itemsPerPage;

    items.slice(start, end).show();

    currentPage = page;

    // Update active class
    $('#pagination li').removeClass('active');
    $('#pagination li.page-num[data-page="' + page + '"]').addClass('active');

    // Enable / disable Prev button
    if (currentPage == 1) {
      $('#pagination li.prev').addClass('disabled');
    } else {
      $('#pagination li.prev').removeClass('disabled');
    }

    // Enable / disable Next button
    if (currentPage == numPages) {
      $('#pagination li.next').addClass('disabled');
    } else {
      $('#pagination li.next').removeClass('disabled');
    }
  }

  // Build and initialize
  buildPagination();
  showPage(1);

  // Click on page numbers
  $(document).on('click', '#pagination li.page-num a', function (e) {
    e.preventDefault();
    e.stopPropagation();

    var page = $(this).parent().data('page');
    showPage(page);

    $('html, body').animate({
      scrollTop: $("#content").offset().top - 100
    }, 400);

    return false;
  });


  // Previous button click
  $(document).on('click', '#pagination li.prev a', function (e) {
    e.preventDefault();
    e.stopPropagation();

    if (currentPage > 1) {
      showPage(currentPage - 1);

      $('html, body').animate({
        scrollTop: $("#content").offset().top - 100
      }, 400);
    }

    return false;
  });

  // Next button click
  $(document).on('click', '#pagination li.next a', function (e) {
    e.preventDefault();
    e.stopPropagation();

    if (currentPage < numPages) {
      showPage(currentPage + 1);

      $('html, body').animate({
        scrollTop: $("#content").offset().top - 100
      }, 400);
    }

    return false;
  });


});
document.addEventListener("DOMContentLoaded", function () {

  function fixOwlDots() {
    var dots = document.querySelectorAll(".owl-dot");

    dots.forEach(function(dot, index) {
      dot.setAttribute("aria-label", "Go to slide " + (index + 1));
    });
  }

  // Run once
  fixOwlDots();

  // Run again after carousel updates (important)
  document.querySelectorAll('.owl-carousel').forEach(function(carousel) {
    carousel.addEventListener('changed.owl.carousel', fixOwlDots);
  });

});


  // gallery start
     $(window).on('load', function () {
        $('#masonry-gallery').masonry({
          itemSelector: '.grid-item',
          percentPosition: true,
          columnWidth: '.grid-item'
        });
      });

     Fancybox.bind("[data-fancybox='gallery']", {
        // Optional settings
        Thumbs: false,
        Toolbar: true,
        closeButton: "top",
      });
      Fancybox.bind("[data-fancybox='gallery1']", {
        // Optional settings
        Thumbs: false,
        Toolbar: true,
        closeButton: "top",
      });
    // gallery end
  