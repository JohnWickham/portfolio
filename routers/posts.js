const express = require('express');
const router = express.Router();
const fileSystem = require('fs');
const path = require('path');

const databaseFile = 'static/posts/db.json';
function getDatabase() {
  let promise = new Promise((resolve, reject) => {

    fileSystem.readFile(databaseFile, 'utf-8', (error, data) => {
      if (error) reject(error);
      let database = JSON.parse(data);
      resolve(database);
    });

  });

  return promise;
}

router.get('/', (request, response, next) => {
  getDatabase().then((database) => {
    response.json(database.models.Post).end();
  }).catch((error) => {
    response.status(500).end();
  });
});

router.get('/:name', function(request, response, next) {

    getDatabase().then((database) => {
      
      database.models.Post.forEach(post => {
        if (post.slug == request.params.name) response.json(post).end();
      });

      response.status(404).end();

    }).catch((error) => {
      response.json(error).end();
    });

});

module.exports = router;