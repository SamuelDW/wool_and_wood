const cacheName = 'wool_and_wood'
const runtime = 'runtime'

const assetsToCache = [
	'./css/app.css'
]

self.addEventListener('install', event => {
	event.waitUntil(
		caches.open(cacheName)
			.then(cache => cache.addAll(assetsToCache))
			.then(self.skipWaiting())
	)
})

self.addEventListener('install', event => {
	event.waitUntil(
		caches.open(cacheName)
			.then(cache => cache.addAll(assetsToCache))
			.then(self.skipWaiting())
	)
})

self.addEventListener('fetch', event => {
	// Skip cross-origin requests, like those for Google Analytics.
	if (event.request.url.startsWith(self.location.origin)) {
		event.respondWith(
			caches.match(event.request).then(cachedResponse => {
				if (cachedResponse) {
					return cachedResponse
				}

				return caches.open(runtime).then(cache => {
					return fetch(event.request).then(response => {
						// Put a copy of the response in the runtime cache.
						return cache.put(event.request, response.clone()).then(() => {
							return response
						})
					})
				})
			})
		)
	}
})

