window.addEventListener('load', () => {
	if (!('serviceWorker' in navigator)) {
		// service workers not supported 😣
		return
	}

	navigator.serviceWorker.register('./serviceWorker.js', { scope: './'}).then(
		(registration) => {
			console.log('Service Worker Registration Successful with scope: ', registration.scope)
		},
		err => {
			console.error('Service Worker registration failed: ', err)
		}
	)
})
