const express = require('express');
const path = require('path');
const app = express();
const port = 1314;

app.use(express.static('./static'));

let postsRoutes = require('./routers/posts');
app.use('/posts', postsRoutes);

let libraryRoutes = require('./routers/library');
app.use('/library', libraryRoutes);

app.use(function(request, response) {
  response.sendFile(path.join(__dirname + '/static/404.html'));
});

app.listen(port, function() {
  console.log(`Server started on port ${port}`);
});

module.exports = app;