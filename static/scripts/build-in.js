const buildInTargets = document.querySelectorAll('.build-in');

if (typeof window.IntersectionObserver == 'undefined') {
  buildInTargets.forEach(element => element.classList.remove('build-in'));
}

let buildInObserverOptions = {
  root: null,
  threshold: 0.75
};

let buildInIntersectionHandler = (entries => {
  
  entries.forEach(entry => {
    
    if (entry.isIntersecting) {
      entry.target.classList.add('start');
    }
    
  });
  
});

let buildInObserver = new IntersectionObserver(buildInIntersectionHandler, buildInObserverOptions);
buildInTargets.forEach(element => buildInObserver.observe(element));