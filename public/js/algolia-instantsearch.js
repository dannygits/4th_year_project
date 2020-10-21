(function () {
  var client = algoliasearch("GQASDB3GO2", "fde0a0066979d2ccdc35a167119b7a37");
  var index = client.initIndex("products");

  const search = instantsearch({
    appId: "GQASDB3GO2",
    apiKey: "fde0a0066979d2ccdc35a167119b7a37",
    indexName: "products",
    urlSync: true,
  });

  search.addWidget(
    instantsearch.widgets.hits({
      container: "#hits",
      templates: {
        empty: "No results",
        item: function (item) {
          return `
          <a href="${window.location.origin}/shop/${item.slug}">
          <div class="instantsearch-result">
              <div>
              <img src="${window.location.origin}/storage/${
            item.image
          }" alt="img" class="algolia-thumb-result">
              </div>
              <div>
                  <div class="result-title">
                      ${item._highlightResult.name.value}
                  </div>
                  <div class="result-details">
                      ${item._highlightResult.details.value}
                  </div>
                  <div class="result-price">
                      $${(item.price / 100).toFixed(2)}
                  </div>
              </div>
          </div>
      </a>
      <hr>
          `;
        },
        //item: "<em> Hit {{objectID}} </em>:{{{_highlightResult.name.value}}}"
      },
    })
  );

  // initialize SearchBox
  search.addWidget(
    instantsearch.widgets.searchBox({
      container: "#search-box",
      placeholder: "Search for products",
    })
  );

  search.addWidget(
    instantsearch.widgets.pagination({
      container: "#pagination",
      maxPages: 20,
      // default is to scroll to 'body', here we disable this behavior
      scrollTo: false,
    })
  );

  search.addWidget(
    instantsearch.widgets.stats({
      container: "#stats-container",
    })
  );

  search.addWidget(
    instantsearch.widgets.refinementList({
      container: "#refinement-list",
      attributeName: "categories",
    })
  );

  search.start();
})();
