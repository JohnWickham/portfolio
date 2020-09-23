function enforceSecureConnection(req, res, next) {

  if (!req.secure && req.get('x-forwarded-proto') !== 'https' && process.env.NODE_ENV !== "development" && process.env.ENFORCE_HTTPS != "no") {
    return res.redirect('https://' + req.get('host') + req.url);
  }
  
  next();
  
}

module.exports = enforceSecureConnection;