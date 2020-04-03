const express = require('express');
const router = express.Router();
const fileSystem = require('fs');
const path = require('path');
const markdown = require( "marked" );

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

    renderPost(filePath, response, next);

  });

});

function renderPost(filePath, response, next) {

  fileSystem.readFile(filePath, function read(error, content) {
   
    if (error) {
      next();
    }
    
    let asString = content.toString();
    let asHTML = markdown(asString);
    
    response.header("Content-Type", "text/html");
    response.send(asHTML);
  
  });

}

module.exports = router;