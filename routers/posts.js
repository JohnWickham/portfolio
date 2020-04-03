var express = require('express');
var router = express.Router();
let path = require('path');

let responseOptions = {
  root: path.join(__dirname, '../static'),
  dotfiles: 'deny',
  headers: {
    'x-timestamp': Date.now(),
    'x-sent': true
  }
};

router.get('/:name', function(request, response) {
  response.send("Will load post named: " + request.params.name);
});

module.exports = router;