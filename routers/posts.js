const express = require('express');
const router = express.Router();
const fileSystem = require('fs');
const path = require('path');
const markdown = require( "markdown" ).markdown;

router.get('/:name', function(request, response, next) {
  
  let fileName = request.params.name + ".md"
  let relativeFilePath = "./static/posts/" + fileName;
  let filePath = path.resolve(relativeFilePath);
  fileSystem.access(filePath, error => {
    
    if (error) {
      console.log(error);
      next();
      return;
    }

    getPostContent(filePath, response, next);

  });

});

function getPostContent(filePath, response, next) {

  fileSystem.readFile(filePath, function read(error, content) {
   
    if (error) {
      next();
    }
    
    let asString = content.toString();
    let asHTML = markdown.toHTML(asString);

    let post = {
      title: 
    }
    renderPost(asHTML);
  
  });

}

function renderPost(post, response, next) {

  let fileName = "post.html"
  let relativeFilePath = "./static/posts/" + fileName;
  let filePath = path.resolve(relativeFilePath);
  fileSystem.readFile(filePath, function read(error, content) {
   
    if (error) {
      next();
    }
    
    let asString = content.toString();
    let asHTML = markdown.toHTML(asString);
    renderPost(asHTML);
  
  });

  response.header("Content-Type", "text/html");
  response.send(asHTML);

}

module.exports = router;