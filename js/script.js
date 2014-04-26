$(function() {
  $.ajax({cache: false});

  $("form").submit(function() {
    var form = this;
    var name = form.name.value;
    var message = form.message.value;
    var param = {"name": name, "message": message};
    $.post("post.php", param, function(data) {
      console.log("sending...");
      console.log(data);
    }).done(function() {
      form.message.value = "";
    }).fail(function() {
      alert("failed");
    });
    return false;
  });

  poll();
  setInterval("poll()", 1000);
});

function poll() {
  $.get("fetch.php", function(data) {
    var lines = data["line"];
    var tgt = $("div#messages");
    tgt.html("");
    lines.reverse();
    for(var i = 0; i < (lines.length<10?lines.length:10); i++) {
      var line = lines[i];
      var node = $("<div>", {class: "message"});
      var date = $("<span>", {class: "date"});
      date.text(line["date"]);
      var name = $("<span>", {class: "name"});
      name.text(line["name"]);
      var message = $("<span>", {class: "message"});
      message.text(line["message"]);
      node.append(date);
      node.append(name);
      node.append(message);
      tgt.append(node);
    }
  });
}
