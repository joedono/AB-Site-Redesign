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

function changeImgSrc(file_path, alt_text) {
  var img = eval((navigator.appName.indexOf('Netscape', 0) != -1) ? 'document.main_pic' : 'document.all.main_pic');
  if(img) {
    img.alt = alt_text;
    img.src = file_path;
  }
}

var categories = {
  1: "#FFCC66",
  2: "#FFCC99",
  3: "#F7921B",
  4: "#FF9966",
  5: "#00FF00",
  6: "#00FF99",
  7: "#3399FF",
  8: "#00FFFF",
  9: "#E8D37E",
  10: "#669900",
  11: "#9900FF",
  13: "#FF00FF",
  17: "#669999",
  18: "#436EEE",
  19: "#CCCCCC",
  21: "#FFFF00",
  22: "#0099CC",
  23: "#CC6699",
  24: "#3366CC",
  25: "#9933FF",
  27: "#FF0000",
  28: "#CCFFCC",
  29: "#CCFF00",
  30: "#996633",
  31: "#CCCCCC",
  32: "#CCFF66",
  33: "#669966",
  34: "#CC0066",
  35: "#AA99FF",
  36: "#EEAEEE",
  37: "#FF6699",
  38: "#CC99FF",
  39: "#CCCCFF",
  40: "#CC9900"
};

function refreshCategoryHighlight() {
  var checkedCategoryIds = [];
  var checkedCategories = $(".category-check:checked");
  checkedCategories.each(function(index, item) {
    checkedCategoryIds.push($(item).data("value"));
  });

  $(".schedule-event").each(function(index, item) {
    setEventColor(this, checkedCategoryIds);
  });
}

function setEventColor(element, checkedCategoryIds) {
  element = $(element);
  var style = "";
  var colors = Array();
  var classes = element.attr("class").split(" ");

  if (checkedCategoryIds.length == 0) {
    checkedCategoryIds = Object.keys(categories);
  }

  checkedCategoryIds.forEach(function(checkedCategoryId, index) {
    if (classes.includes("fn-event-category-" + checkedCategoryId)) {
      colors.push(categories[checkedCategoryId]);
    }
  });

  if (colors.length == 1) {
    style += colors[0];
  } else if (colors.length > 1) {
    style += "linear-gradient(to bottom, ";
    style += colors.join(",");
    style += ")";
  }

  element.css("background", style);
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

  refreshCategoryHighlight();
});
