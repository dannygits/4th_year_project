(function() {
  var client = algoliasearch("GQASDB3GO2", "fde0a0066979d2ccdc35a167119b7a37");
  var index = client.initIndex("products");
  var enterPressed = false;
  //initialize autocomplete on search input (ID selector must match)
  autocomplete(
    "#aa-search-input",
    { hint: false },
    {
      source: autocomplete.sources.hits(index, { hitsPerPage: 10 }),
      //value to be displayed in input control after user's suggestion selection
      displayKey: "name",
      //hash of templates used when rendering dataset
      templates: {
        //'suggestion' templating function used to render a single suggestion
        suggestion: function(suggestion) {
          const markup = `
        <div class="algolia-result">
            <span>
                <img src="${window.location.origin}/storage/${suggestion.image}" alt="img" class="algolia-thumb">
                ${suggestion._highlightResult.name.value}
            </span>
            <span>Ksh${suggestion.price}</span>
        </div>
        <div class="algolia-details">
            <span>${suggestion._highlightResult.details.value}</span>
        </div>
                    `;

          return markup;
        },
        empty: function(result) {
          return (
            'Sorry, we did not find any results for "' + result.query + '"'
          );
        }
      }
    }
  )
    .on("autocomplete:selected", function(event, suggestion, dataset) {
      window.location.href =
        window.location.origin + "/shop/" + suggestion.slug;
      enterPressed = true;
    })
    .on("keyup", function(event) {
      if (event.keyCode == 13 && !enterPressed) {
        window.location.href =
          window.location.origin +
          "/search-algolia?q=" +
          document.getElementById("aa-search-input").value;
      }
    });
})();
