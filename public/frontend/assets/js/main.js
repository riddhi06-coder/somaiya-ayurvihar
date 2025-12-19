$('#specialities').owlCarousel({
  loop: true,
  margin:10,
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
  margin:20,
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
      items: 2
    }
  }
});
$('#testimonial').owlCarousel({
  loop: true,
  margin: 10,
  /*stagePadding: 20,*/
  dots: false,
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
/*counter*/
var a = 0;
$(window).scroll(function() {

  var oTop = $('#counter').offset().top - window.innerHeight;
  if (a == 0 && $(window).scrollTop() > oTop) {
    $('.counter-value').each(function() {
      var $this = $(this),
        countTo = $this.attr('data-count');
      $({
        countNum: $this.text()
      }).animate({
          countNum: countTo
        },

        {

          duration: 2000,
          easing: 'swing',
          step: function() {
            $this.text(Math.floor(this.countNum));
          },
          complete: function() {
            $this.text(this.countNum);
            //alert('finished');
          }

        });
    });
    a = 1;
  }

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
    $('.panel-heading').on('click', function() {
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
    let url = $('body').find($(this).attr('href')).offset().top - 160;
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
    $(window).scroll(function() {
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

