const express = require('express');
const serverless = require('serverless-http')
const app = express();
const port = 1314;

app.use(express.static('static'));
app.get('/posts/:name', function(request, response) {
  response.send("Will load post named: " + request.params.name);
});

app.listen(port, function() {
  console.log(`Server started on port ${port}`);
});

module.exports = app;
module.exports.handler = serverless(app);