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

router.get('/', (request, response) => {
  
  getDatabase().then((database) => {

    let posts = database.models.Post;
    let tags = database.models.Tag;
    posts.forEach(post => {
      post.formattedDate = formattedDate(post);
    });

    posts.sort((a, b) => new Date(b.date) - new Date(a.date));

    let payload = {
      posts: posts,
      tags: tags
    }
    response.json(payload).end();

  }).catch((error) => {
    response.status(500).end();
  });

});

router.get('/tags', (request, response) => {

  getDatabase().then(database => {
    let tags = database.models.Tag;
    response.json(tags).end();
  }).catch((error) => {
    response.json(error).end();
  });

});

router.get('/tags/:id/posts', (request, response) => {

  getDatabase().then(database => {

    let posts = [];

    database.models.PostTag.forEach(postTag => {
      if (postTag.tag_id == request.params.id) {
        posts.push(postTag.post_id)
      }
      // TODO: Get posts with tag
    });

  });

});

router.get('/:name', (request, response) => {

    getDatabase().then((database) => {
      
      database.models.Post.forEach(post => {
        if (post.slug == request.params.name) response.json(post).end();
      });

      response.status(404).end();

    }).catch((error) => {
      response.json(error).end();
    });

});

function formattedDate(post) {
  return new Date(post.date).toLocaleDateString("en-US", { year: 'numeric', month: 'long', day: 'numeric' });
}

module.exports = router;