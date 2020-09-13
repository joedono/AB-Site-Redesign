<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/cosplay/">Cosplay</a></li>
  <li><a href="/cosplayhq/">Cosplay HQ</a></li>
  <li>Photoshoots</li>
</ul>

<?php include(APPPATH.'views/includes/scripts_fullcalendar.php'); ?>

<?php
$optional_label = ab_optional_label();
$required_label = ab_required_label();
?>

<style type="text/css">
  .closeon {
    float: right;
    margin: 3px;
  }
</style>

<script type="text/javascript">
var photoshootDialog;
var photoshootForm;

function onDateClick(start_time, resourceObj) {
  $("#title").val("");
  $("#website").val("");

  photoshootDialog.dialog("open");
  photoshootForm.unbind("submit");

  photoshootForm.submit(function() {
    var title = $("#title").val();
    var website = $("#website").val();
    var end_time = start_time.clone().add(60, 'minutes');

    $.post("/cosplayhq/photoshoot_create", {
      photoshoot_id: null,
      photoshoot_location_id: resourceObj.id,
      title: title,
      website: website,
      start_time: start_time.format('YYYY-MM-DD HH:mm:ss'),
      end_time: end_time.format('YYYY-MM-DD HH:mm:ss')
    })
    .done(function(data) {
      console.log(data);

      $("#scheduler").fullCalendar('renderEvent', {
        id: data.photoshoot_id,
        title: title,
        website: website,
        start: start_time,
        end: end_time,
        resourceId: resourceObj.id,
        editable: true
      }, true);

      photoshootDialog.dialog("close");
    })
    .fail(function(jqXHR, textStatus, errorThrown) {
      console.log(textStatus);
      console.log(errorThrown);
      photoshootDialog.dialog("close");
      showError(jqXHR.responseText);
    });

    return false;
  });
}

function onEventClick(event) {
  if(event.editable) {
    $("#title").val(event.title);
    $("#website").val(event.website);

    photoshootDialog.dialog("open");
    photoshootForm.unbind("submit");

    photoshootForm.submit(function() {
      event.title = $("#title").val();
      event.website = $("#website").val();
      updatePhotoshoot(event, null);

      return false;
    });
  } else if(event.website != "") {
    window.open(event.website);
  }
}

function updatePhotoshoot(event, revertFunc) {
  $.post("/cosplayhq/photoshoot_update", {
    photoshoot_id: event.id,
    photoshoot_location_id: event.resourceId,
    title: event.title,
    website: event.website,
    start_time: event.start.format('YYYY-MM-DD HH:mm:ss'),
    end_time: event.end.format('YYYY-MM-DD HH:mm:ss')
  })
  .done(function(data) {
    $("#scheduler").fullCalendar("updateEvent", event);
    photoshootDialog.dialog("close");
    console.log(data);
  })
  .fail(function(jqXHR, textStatus, errorThrown) {
    console.log(textStatus);
    console.log(errorThrown);
    photoshootDialog.dialog("close");
    if(revertFunc) {
      revertFunc();
    }

    showError(jqXHR.responseText);
  });
}

function deletePhotoshoot(event, element) {
  $.post("/cosplayhq/photoshoot_delete", {
    photoshoot_id: event.id
  })
  .done(function(data) {
    console.log(data);
    $("#scheduler").fullCalendar("removeEvents", event._id);
  })
  .fail(function(jqXHR, textStatus, errorThrown) {
    console.log(textStatus);
    console.log(errorThrown);
    showError(jqXHR.responseText);
  });
}

function showError(errorString) {
  var errorObj = JSON.parse(errorString);
  var alertString = "";
  for(var key in errorObj) {
    alertString += errorObj[key] + "\n";
  }

  alert(alertString);
}

$(function() {
  photoshootForm = $("#photoshoot-form");
  photoshootDialog = $("#photoshoot-dialog").dialog({
    autoOpen: false,
    height: 270,
    width: 400,
    modal: true,
    buttons: {
      Submit: function() {
        photoshootForm.submit();
      },
      Cancel: function() {
        photoshootDialog.dialog("close");
      }
    }
  });

  $("#scheduler").fullCalendar({
    schedulerLicenseKey: '0177372636-fcs-1533899416',
    defaultView: 'agendaDay',
    defaultDate: '<?=$con_dates[1]["con_date"]?>',
    validRange: {
      start: '<?=$con_dates[1]["con_date"]?>',
      end: moment('<?=$con_dates[3]["con_date"]?>').add(1, 'days')
    },
    defaultTimedEventDuration: '00:60:00',
    slotDuration: '00:30:00',
    slotLabelFormat: 'h:mma',
    minTime: '09:00:00',
    maxTime: '24:00:00',
    header: {
      left: 'prev,next',
      center: 'title',
      right: ''
    },
    titleFormat: 'dddd, MMMM D, YYYY',
    forceEventDuration: true,
    allDaySlot: false,
    slotEventOverlap: false,
    eventOverlap: false,
    groupByDateAndResource: true,
    businessHours: [
      {
        dow: [5, 6],
        start: '09:00',
        end: '24:00'
      },
      {
        dow: [0],
        start: '09:00',
        end: '15:00'
      },
    ],
    eventConstraint: 'businessHours',
    selectConstraint: 'businessHours',
    resources: [
      <?php
      $resources = "";
      foreach($locations as $location) {
        $id = $location["photoshoot_location_id"];
        $title = $location["name"] . ' - ' . $location["location"];
        $resources .= "{ id: $id, title: '$title' },";
      }

      $resources = rtrim($resources, ',');
      echo $resources;
      ?>
    ],
    views: {
      agendaConWeekend: {
        type: 'agenda',
        duration: { days: 1 }
      }
    },
    dayClick: function(date, jsEvent, view, resourceId) {
      if (jsEvent.target.className == ("fc-nonbusiness fc-bgevent")) {
        return false;
      } else {
        onDateClick(date, resourceId);
      }
    },
    eventClick: function(event, jsEvent, view) {
      onEventClick(event);
    },
    eventDrop: function(event, delta, revertFunc, jsEvent, ui, view) {
      if(event.editable) {
        updatePhotoshoot(event, revertFunc);
      }
    },
    eventResize: function(event, delta, revertFunc, jsEvent, ui, view) {
      if(event.editable) {
        updatePhotoshoot(event, revertFunc);
      }
    },
    eventRender: function(event, element) {
      if(!event.editable) {
        if(event.website == "" ) {
          element.css("cursor", "not-allowed");
        } else {
          element.css("cursor", "pointer");
        }
      } else {
        element.find(".fc-content").prepend("<div class='closeon badge align-center'>X</div>");
        element.find(".closeon").click(function(e) {
          deletePhotoshoot(event, element);
          e.preventDefault();
          return false;
        });
      }
    },
    events: [
      <?php
      $events = '';
      foreach($photoshoots as $photoshoot) {
        $id = $photoshoot["photoshoot_id"];
        $title = str_replace("'", "\\'", $photoshoot["title"]);
        $website = str_replace("'", "\\'", $photoshoot["website"]);
        $start = $photoshoot["start_time"];
        $end = $photoshoot["end_time"];
        $resourceId = $photoshoot["photoshoot_location_id"];
        $editable = $photoshoot["is_mine"];
        $color = "#000";
        $backgroundColor = "#a5c4d3";
        if($editable)
        {
          $color = "";
          $backgroundColor = "";
        }

        $events .= "{id: '$id', title: '$title', website: '$website', start: '$start', end: '$end', resourceId: $resourceId, editable: $editable, textColor: '$color', backgroundColor: '$backgroundColor'},";
      }

      $events = rtrim($events, ',');
      echo $events;
      ?>
    ]
  });
});
</script>

<div class="page-body clearfix">
  <h1>Cosplay Photoshoots</h1>

  <div class="cosplayhq">
    <div class="cosplayhq-menu col-lg-3 col-md-4 col-sm-4">
      <?php include('cosplayhq_menu.php'); ?>
    </div>
    <div class="cosplayhq-content col-lg-9 col-md-8 col-sm-8">
      <p>Have an idea for a cool cosplay photoshoot or gathering? Apply here to add your own gathering to the schedule.</p>
      <p>Click on an empty space on the schedule, type in your title, and hit Ok to add your gathering to the official schedule.</p>
      <p>To move a photoshoot to a different day, click the small X to delete the shoot and recreate it on the proper date.</p>
      <div id="scheduler"></div>
    </div>
  </div>
</div>

<div id="photoshoot-dialog" title="Photoshoot">
  <form id="photoshoot-form">
    <div class="row form-group">
      <?=form_label('Title *', 'title', $required_label)?>
      <div class="col-lg-9 col-md-8">
        <input type="text" name="title" id="title" class="form-control" maxlength="100">
      </div>
    </div>
    <div class="row form-group">
      <?=form_label('Website/Social *', 'website', $required_label)?>
      <div class="col-lg-9 col-md-8">
        <input type="text" name="website" id="website" class="form-control" maxlength="255">
      </div>
    </div>
    <input type="submit" value="Submit" style="display: none">
  </form>
</div>
