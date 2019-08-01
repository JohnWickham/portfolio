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

router.get('/death-in-teheran', function(request, response) {
  response.sendFile('./death-in-teheran.html', responseOptions);
});

router.get('/if-rudyard-kipling', function(request, response) {
  response.sendFile('./if-rudyard-kipling.html', responseOptions);
});

module.exports = router;