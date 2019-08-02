let shell = require('shelljs');

exports.deploy = function(request, response) {
    
  if (shell.exec('git pull').code != 0) {
    response.status(500).end();
    return;
  }
  
  shell.exec('service sitehost restart');
  
  response.status(200).end();
  
}

exports.testDeploy = function(request, response) {
  
  if (shell.exec('git fetch').code != 0) {
    response.status(500).end();
    return;
  }
  
  response.status(200).end();
  
}