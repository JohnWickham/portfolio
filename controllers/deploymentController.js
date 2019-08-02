let shell = require('shelljs');

exports.deploy = function() {
  shell.exec('../deploy.sh');
}