let shell = require('shelljs');

exports.deploy = function(request, response) {
    
  if (shell.exec('git pull').code != 0) {
    response.status(500).send('Deployment failed: git could not pull source from origin.').end();
    return;
  }
  
  if (shell.exec('npm install').code != 0) {
    response.status(500).send('Deployment failed: NPM could not install packages.').end();
  }
  
  if (shell.exec('service sitehost restart').code != 0) {
    response.status(500).send('Deployment failed: Sitehost service could not be restarted.').end();
  }
  
  response.status(200).end();
  
}

exports.testDeploy = function(request, response) {
  
  if (shell.exec('git fetch').code != 0) {
    response.status(500).end();
    return;
  }
  
  response.status(200).end();
  
}