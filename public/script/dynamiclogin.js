document.addEventListener("DOMContentLoaded", function(event) {

    window.parent.postMessage(
        {
            isloggedin: userisloggedin
        } , 
    '*');

    if (!userisloggedin) {
        const openLoginFrames = document.querySelectorAll(".js-openLoginFrame");
        openLoginFrames.forEach(function(element) {
            element.classList.add('js-allowed');
        });
    }

});

window.addEventListener('message', function(event) {

	const loginframe = document.querySelector(".js-loginframe");
    const loginredirect = document.querySelector('.js-loginframe .lgnframe');

	if (loginframe) {
	
		if (event.data.isloggedin == true) {
		
			loginframe.style.display = "none";
			loginframe.remove();
			window.location.href = loginredirect.getAttribute('data-loginredirect');
	
		}  else {
            const openLoginFrames = document.querySelectorAll(".js-openLoginFrame");
			openLoginFrames.forEach(function(element) {
                element.classList.add('js-allowed'); // js-allowed von jedem Element entfernen
            });

		}
	
	}
});

document.addEventListener("click", (event) => {

	if (event.target.matches(".js-openLoginFrame.js-allowed")) {

		event.preventDefault();

		fetch('/' + document.documentElement.getAttribute('lang') + '/loadiframe/'+lgnRoot, {headers: {'X-Requested-With': 'XMLHttpRequest'}})
		.then(response => response.text())
		.then(datastring => {
			
			const iframe = document.querySelector(".js-loginframe");
			if (iframe) {
			    iframe.remove();
			}
		
			const wrapper = document.querySelector('#wrapper');
			wrapper.insertAdjacentHTML('afterend', datastring);
		
		});
		
	}

	if (event.target.matches(".js-closeLoginFrame")) {
		const cliframe = document.querySelector(".js-loginframe");
		if (cliframe) {
		    cliframe.remove();
		}
	}

});


