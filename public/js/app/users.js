function createUser(element) {
	return document.createElement(element);
}

function append(parent, element) {
	return parent.appendChild(element);
}

fetch('https://randomuser.me/api/?results=3')

	.then((resp) => resp.json())

	.then(function (data) {
		let users = data.results;
		return users.map(function (user) {
			let div  = createUser('div');
				img = createUser('img');
				p 	= createUser('p');
			img.src = user.picture.large;
			p.innerHTML = `${user.name.first} ${user.name.last}`;
			append(div, img);
			append(div, p);
			append(document.getElementById('users'), div);
		})
	})
	.catch(function (error) {
		/*console.log(error);*/
	});