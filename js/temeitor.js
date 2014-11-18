jQuery(document).ready(function() {
  var container = document.querySelector('#main.pinteresco');
  imagesLoaded(container, function() {
    var msnry = new Masonry( container, {
      // options
      // columnWidth: 200, no lo usamos porque bootstrap configura el tamano
      itemSelector: '.hentry'
    });
  });
});

