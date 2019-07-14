const express = require('express');
const app = express();
const port = 1314;

app.use(express.static('static'));
app.get('/posts/:name', function(request, response) {
  resposne.send("Will load post named: " + request.params.name);
});

app.listen(port, function() {
  console.log(`Server started on port ${port}`);
});