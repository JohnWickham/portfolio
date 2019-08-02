const express = require('express');
const path = require('path');
const app = express();
const port = 1314;

app.use(express.static('./static'));

// Post Routes
let postsRoutes = require('./routers/posts');
app.use('/posts', postsRoutes);

// Library Routes
let libraryRoutes = require('./routers/library');
app.use('/library', libraryRoutes);

// Catch any unhandled request and serve 404
app.use(function(request, response) {
  response.status(404).sendFile(path.join(__dirname + '/static/404.html'));
});

app.listen(port, function() {
  console.log(`Server started on port ${port}`);
});

module.exports = app;