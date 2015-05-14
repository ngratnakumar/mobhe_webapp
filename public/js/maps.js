 var customIcons = {
      lab: {
        icon: 'http://labs.google.com/ridefinder/images/mm_20_green.png'
      }
    };

    function load() {
      var map = new google.maps.Map(document.getElementById("map"), {
        center: new google.maps.LatLng(12.979599, 77.600000),
        zoom: 12,
        mapTypeId: 'roadmap'
      });
      var infoWindow = new google.maps.InfoWindow;

      // Change this depending on the name of your PHP file
      downloadUrl("../map/viewData", function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        for (var i = 0; i < markers.length; i++) {
          var name = markers[i].getAttribute("name");
          var phone = markers[i].getAttribute("phone");
          var addressLine1 = markers[i].getAttribute("addressLine1");
          var addressLine2 = markers[i].getAttribute("addressLine2");
          var addressLine3 = markers[i].getAttribute("addressLine3");
          var facilities = markers[i].getAttribute("facilities");
          var openTimings = markers[i].getAttribute("openTimings");
          var type = markers[i].getAttribute("type");
          var typeName = markers[i].getAttribute("type");
          var point = new google.maps.LatLng(
              parseFloat(markers[i].getAttribute("lat")),
              parseFloat(markers[i].getAttribute("lng")));
          var html = "<b>" + name + "</b> <br/>" + phone + "-" + typeName + "<br/>" + addressLine1 + "<br/>" + addressLine2 + "<br/>" + addressLine3 + "<br/>" + facilities + "<br/>" + openTimings;
          var icon = customIcons[type] || {};
          var marker = new google.maps.Marker({
            map: map,
            position: point,
            icon: icon.icon
          });
          bindInfoWindow(marker, map, infoWindow, html);
        }
      });
    }

    function bindInfoWindow(marker, map, infoWindow, html) {
      google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
      });
    }

    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
          new ActiveXObject('Microsoft.XMLHTTP') :
          new XMLHttpRequest;

      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request, request.status);
        }
      };

      request.open('GET', url, true);
      request.send(null);
    }

    function doNothing() {}
