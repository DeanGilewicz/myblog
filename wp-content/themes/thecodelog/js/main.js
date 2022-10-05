const domReady = (callback) => {
	"use strict";
	if (
		document.readyState === "interactive" ||
		document.readyState === "complete"
	) {
		callback();
	} else {
		document.addEventListener("DOMContentLoaded", callback);
	}
};

domReady(() => {
	"use strict";
	// console.log('ready to go');

	let menuTriggerEl = document.querySelector(".js-trigger-menu");
	let site = document.querySelector(".site");

	menuTriggerEl.addEventListener("click", (e) => {
		site.classList.toggle("active");
	});
});
