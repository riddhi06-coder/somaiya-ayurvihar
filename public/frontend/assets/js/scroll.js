$(document).ready(function () {

  var tabs = $('.apollo-tabs');
  var tabList = $('.tab-scroll');
  var headerHeight = $('#header-sticky').outerHeight() || 90;
  var tabOffset = $('.apollo-tabs-wrapper').offset().top;
  var isSticky = false;

  function checkTabOverflow() {
    if (tabList[0].scrollWidth > tabList[0].clientWidth + 5) {
      tabs.addClass('enable-scroll');
    } else {
      tabs.removeClass('enable-scroll');
      tabList.scrollLeft(0);
    }
  }

  function prepareStickyPosition() {
    var container = $('.speciality-tabs .container');
    var containerWidth = container.outerWidth();
    var containerLeft = container.offset().left;

    tabs.css({
      width: containerWidth + 'px',
      left: containerLeft + 'px',
      transform: 'none'
    });
  }

  function enableSticky() {
    if (isSticky) return;

    prepareStickyPosition();

    $('.apollo-tabs-placeholder')
      .height(tabs.outerHeight())
      .show();

    tabs.addClass('is-sticky');
    isSticky = true;
  }

  function disableSticky() {
    if (!isSticky) return;

    tabs.removeClass('is-sticky').removeAttr('style');
    $('.apollo-tabs-placeholder').hide();
    isSticky = false;
  }

  checkTabOverflow();

  $(window).on('resize', function () {
    checkTabOverflow();
    if (isSticky) prepareStickyPosition();
  });

  $(window).on('scroll', function () {
    if ($(window).scrollTop() >= tabOffset - headerHeight) {
      enableSticky();
    } else {
      disableSticky();
    }
  });

  $('.apollo-tabs a').on('click', function () {
    var target = $('#' + $(this).data('target'));
    if (!target.length) return;

    $('html, body').animate({
      scrollTop: target.offset().top - headerHeight - tabs.outerHeight()
    }, 600);

    $('.apollo-tabs li').removeClass('active');
    $(this).parent().addClass('active');
  });

  $(window).on('scroll', function () {
    var scrollPos = $(window).scrollTop();

    $('section[id]').each(function () {
      var top = $(this).offset().top - headerHeight - tabs.outerHeight() - 20;
      var bottom = top + $(this).outerHeight();
      var id = $(this).attr('id');

      if (scrollPos >= top && scrollPos < bottom) {
        $('.apollo-tabs li').removeClass('active');
        var activeTab = $('.apollo-tabs a[data-target="' + id + '"]')
          .parent().addClass('active');

        if (tabs.hasClass('enable-scroll')) {
          tabList.stop().animate({
            scrollLeft: activeTab.position().left + tabList.scrollLeft() - 50
          }, 200);
        }
      }
    });
  });

  $('.tab-arrow.left').click(function () {
    tabList.animate({ scrollLeft: '-=200' }, 300);
  });

  $('.tab-arrow.right').click(function () {
    tabList.animate({ scrollLeft: '+=200' }, 300);
  });

});