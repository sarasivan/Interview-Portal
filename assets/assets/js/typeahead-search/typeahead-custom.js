// typeahead custom js
$(document).on("ready", function () {
  var engine = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.obj.whitespace("name"),
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    local: "path/to/data.json",
    identify: function (obj) {
      return obj.id;
    },
  });
});
