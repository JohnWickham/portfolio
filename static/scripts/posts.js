window.onload = function() {

	function handleError(error) {
		//TODO: Fallback for browsers unable to make requests
	}
	
	if (fetch == undefined) {
		handleError();
		return;
	}

	const loadingElement = document.querySelector('.posts-list-container .loading');

	const postListElement = document.querySelector('.posts-list');
	function makeListeItemElement(post) {
		let element = `<li><a href="/posts/${post.slug}"><h3>${post.title}</h3><time datetime="${post.date}">${post.formattedDate}</time>`;
		// if (post.formattedUpdatedDate) {
		// 	element += `<time class="updated">Updated ${post.formattedUpdatedDate}</time>`;
		// }
		element += `<p>${post.excerpt}</p></a></li>`;
		return element;
	}

	const tagSelectionControl = document.querySelector('.posts-list-container select');
	function makeTagOptionElement(tag) {
		return `<option value=${tag._id}>${tag.name}</option>`
	}

	if (postListElement) fetchPosts();

	function fetchPosts(tag = '') {

		let requestURL = '/posts/api/';
		if (tag.length > 0) requestURL += `tags/${tag}/posts`
		this.fetch(requestURL).then((response) => {
			response.json().then(payload => {
				if (loadingElement) loadingElement.remove();
				let listItems = payload.posts.map(post => makeListeItemElement(post));
				postListElement.innerHTML = listItems.join('');
	
				if (tagSelectionControl != undefined) {
					let options = payload.tags.map(tag => makeTagOptionElement(tag));
					tagSelectionControl.innerHTML = '<option value="">All Posts' + options.join('')
				}
			});
		}).catch(error => {
			handleError();
		});

	}

	if (tagSelectionControl) {
		tagSelectionControl.addEventListener('change', event => {
			let tagName = tagSelectionControl.options[tagSelectionControl.selectedIndex].value;
			fetchPosts(tagName);
		});
	}
}