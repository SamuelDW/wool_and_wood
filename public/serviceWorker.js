self.addEventListener('activate', (event) => {
	var cacheWhitelist = ['wool_and_wood_v1']
	event.waitUntil(
		caches.keys().then((cacheNames) => {
			return Promise.all(
				cacheNames.map((cacheName) => {
					if (cacheWhitelist.indexOf(cacheName) === -1) {
						return caches.delete(cacheName)
					}
				})
			)
		})
	)
})

let coreAssets = [
	'/css/app.css',
	'/js/main.js',
	'/img/logo.svg',
	'/img/favicon.ico',
]

let cacheName = 'wool_and_wood_v1'

self.addEventListener('install', event => {
	event.waitUntil(caches.open(cacheName).then(cache => {
		for (let asset of coreAssets) {
			cache.add(new Request(asset))
		}
		cache.add(new Request('offline.html'))

		return cache
	}))
})

self.addEventListener('fetch', event => {
	let request = event.request

	// Bug fix
	// https://stackoverflow.com/a/49719964
	if (event.request.cache === 'only-if-cached' && event.request.mode !== 'same-origin') return

	// HTML files
	// Network-first
	if (request.headers.get('Accept').includes('text/html')) {
		event.respondWith(
			fetch(request).then(function (response) {

				// Create a copy of the response and save it to the cache
				let copy = response.clone()
				event.waitUntil(caches.open(cacheName).then(function (cache) {
					return cache.put(request, copy)
				}))

				// Return the response
				return response

			// eslint-disable-next-line no-unused-vars
			}).catch((error) => {

				// If there's no item in cache, respond with a fallback
				return caches.match(request).then(function (response) {
					return response || caches.match('/offline.html')
				})

			})
		)
	}

	// CSS & JavaScript
	// Offline-first
	if (request.headers.get('Accept').includes('text/css') || request.headers.get('Accept').includes('text/javascript')) {
		event.respondWith(
			caches.match(request).then(function (response) {
				return response || fetch(request).then(function (response) {

					// Return the response
					return response

				})
			})
		)
		return
	}

	// Images
	// Offline-first
	if (request.headers.get('Accept').includes('image')) {
		event.respondWith(
			caches.match(request).then(function (response) {
				return response || fetch(request).then(function (response) {

					// Save a copy of it in cache
					let copy = response.clone()
					event.waitUntil(caches.open(cacheName).then(function (cache) {
						return cache.put(request, copy)
					}))

					// Return the response
					return response
				})
			})
		)
	}
})
