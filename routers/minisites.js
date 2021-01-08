var express = require('express');
var router = express.Router();
let path = require('path');

router.get('/uv-forecast', function(request, response) {
  response.sendFile('./uv-forecast.html', {
    root: path.join(__dirname, '../static/uv-forecast'),
    dotfiles: 'deny',
    headers: {
      'x-timestamp': Date.now(),
      'x-sent': true
    }
  });
});
router.get('/uv-index', function(request, response) {
  response.redirect(301, '/uv-forecast');
});

module.exports = router;