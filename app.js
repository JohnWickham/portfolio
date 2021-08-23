const express = require('express'),
path = require('path'),
helmet = require("helmet");
const app = express();
const port = process.env.PORT || 1314;

if (process.env.NODE_ENV !== "development") app.use(helmet());

app.use(express.static('./static'));

// Minisite Routes
let minisiteRoutes = require('./routers/minisites');
app.use('/', minisiteRoutes);

// Post Routes
let postsRoutes = require('./routers/posts');
app.use('/posts/api', postsRoutes);

// Library Routes
let libraryRoutes = require('./routers/library');
app.use('/library', libraryRoutes);

let deploymentController = require('./controllers/deploymentController');
app.post('/deploy/test', deploymentController.testDeploy);
app.post('/deploy',  deploymentController.deploy);

// Catch any unhandled request and serve 404
app.use(function(request, response) {
  response.status(404).sendFile(path.join(__dirname + '/static/404.html'));
});

app.listen(port, function() {
  console.log(`Server started on port ${port}`);
});

module.exports = app;