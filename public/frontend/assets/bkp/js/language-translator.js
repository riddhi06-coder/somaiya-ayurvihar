/***********************
   * HELPERS
   ***********************/
  function setCookie(name, value, days) {
    var expires = "";
    if (days) {
      var d = new Date();
      d.setTime(d.getTime() + (days*24*60*60*1000));
      expires = "; expires=" + d.toUTCString();
    }
    var domain = getRootDomainForCookie();
    try {
      document.cookie = name + "=" + value + expires + "; path=/" + (domain ? "; domain=" + domain : "");
      console.log("Cookie set:", name, value, "domain:", domain);
    } catch (e) {
      console.warn("Cookie write failed:", e);
    }
  }

  function getRootDomainForCookie() {
    // prefer to set cookie for second-level domain (e.g. .example.com)
    // fall back to hostname if unable (useful for localhost)
    try {
      var host = window.location.hostname;
      if (/^\d+\.\d+\.\d+\.\d+$/.test(host) || host === 'localhost') return null;
      var parts = host.split('.');
      if (parts.length > 2) parts = parts.slice(parts.length - 2);
      return '.' + parts.join('.');
    } catch (e) {
      return null;
    }
  }

  function forceGoogleCookieAndReload(targetLang) {
    // googtrans format: /SOURCE/TARGET  (use 'en' source here)
    var cookieVal = '/en/' + targetLang;
    setCookie('googtrans', cookieVal, 7);
    setCookie('googtrans', cookieVal, 7); // try twice (common snippet uses both)
    // small pause to ensure cookie is written then reload
    setTimeout(function(){ 
      console.log('Reloading to apply googtrans cookie for', targetLang);
      window.location.reload();
    }, 250);
  }

  function redirectToGoogleTranslate(targetLang) {
    var currentUrl = encodeURIComponent(window.location.href);
    var url = 'https://translate.google.com/translate?sl=auto&tl=' + encodeURIComponent(targetLang) + '&u=' + currentUrl;
    console.log('Redirecting to:', url);
    window.location.href = url;
  }

  /***********************
   * Main flow
   ***********************/
  // 1) Initialize Google Translate element (callback from script)
  function googleTranslateElementInit() {
    new google.translate.TranslateElement({ pageLanguage: 'en' }, 'google_translate_element');
    console.log('googleTranslateElementInit() — widget initialized (callback).');
  }
  window.googleTranslateElementInit = googleTranslateElementInit;

  // 2) Listen to dropdown change and attempt steps in order
  (function(){
    var custom = document.getElementById('customTranslate');
    if (!custom) return;

    custom.addEventListener('change', function() {
      var lang = this.value;
      if (!lang) return;

      console.log('User selected language:', lang);

      // Attempt A: Try to find internal select (.goog-te-combo)
      try {
        var combo = document.querySelector('.goog-te-combo');
        if (combo && typeof combo.value !== 'undefined') {
          console.log('Found .goog-te-combo on page — using it.');
          combo.value = lang;
          var ev;
          if (typeof(Event) === 'function') ev = new Event('change', { bubbles: true });
          else { ev = document.createEvent('HTMLEvents'); ev.initEvent('change', true, true); }
          combo.dispatchEvent(ev);
          return;
        } else {
          console.log('.goog-te-combo not present in top DOM; will try cookie fallback.');
        }
      } catch (e) {
        console.warn('Error trying .goog-te-combo:', e);
      }

      // Attempt B: Set cookie and reload (most reliable when widget is blocked/iframe'd)
      try {
        forceGoogleCookieAndReload(lang);
        return;
      } catch (e) {
        console.warn('Cookie reload attempt failed:', e);
      }

      // Attempt C: Final fallback — redirect to Google Translate
      redirectToGoogleTranslate(lang);
    });
  })();