function initDataTable(id) {
  var pageLength = loadPageLength();
  $(id).DataTable({
    columnDefs: [
      { orderable: false, targets: 0 }
    ],
    order: [],
    lengthMenu: [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
    pageLength: pageLength,
    responsive: true
  });

  $(id).on('length.dt', function(e, settings, len) {
    savePageLength(len);
  });
}

function loadPageLength() {
  var length = localStorage.getItem("page_length");
  if(length) {
    return parseInt(length);
  }

  return 50;
}

function savePageLength(len) {
  localStorage.setItem("page_length", len);
}

function navForget() {
  localStorage.setItem("menu_open", "");
}

function navMemorize(id) {
  localStorage.setItem("menu_open", encodeURIComponent(id));
}

function navRemember() {
  var id = localStorage.getItem("menu_open");
  if(id) {
    $("#" + id).collapse("show");
  }
}

function confirmLeavingSite() {
  return confirm('You are now leaving the Anime Boston website. Anime Boston is not responsible for the content of external websites. It is possible that some sites may feature adult (18+) content. View at your own risk.\r\n\nClick OK to continue, or Cancel to remain on Anime Boston.');
}

function confirmDelete() {
  return confirm('Are you sure you want to delete this?');
}

function scrollToTop() {
  window.scrollTo(0, 0);
}

$(function() {
  $("input").change(function() {
    $(this).parents(".has-error").removeClass("has-error").removeClass("has-feedback");
    $(this).siblings(".ab-error").hide();
  });

  $("select").change(function() {
    $(this).parents(".has-error").removeClass("has-error").removeClass("has-feedback");
    $(this).siblings(".ab-error").hide();
  });

  $("textarea").change(function() {
    $(this).parents(".has-error").removeClass("has-error").removeClass("has-feedback");
    $(this).siblings(".ab-error").hide();
  });

  $(".datepicker" ).datepicker();

  $(".nav-header").click(function() {
    var target = $($(this).attr("data-target"));
    if(target.hasClass("in")) {
      navForget();
    } else {
      navMemorize(target.attr("id"));
    }
  });

  $(document).euCookieLawPopup().init({
    cookiePolicyUrl : '/coninfo/privacy_policy/',
    popupPosition : 'bottomleft',
    colorStyle : 'inverse',
    compactStyle : false,
    popupTitle : 'This website uses cookies',
    popupText : 'This website uses cookies to ensure you have the best experience on our website.',
    buttonContinueTitle : 'Continue',
    buttonLearnmoreTitle : 'Learn more',
    buttonLearnmoreOpenInNewWindow : false,
    agreementExpiresInDays : 30,
    autoAcceptCookiePolicy : false,
    htmlMarkup : null
  });

  navRemember();
});
