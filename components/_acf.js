function initTextPlus() {
	document.querySelectorAll(".textplus_acf").forEach((el) => {
		buildRTE(el);
	});
}
initTextPlus();

if (wp.media) {
	wp.media.featuredImage.frame().on("selection:toggle", function () {
		initTextPlus();
	});

	wp.media.frame.on("open", function () {
		setTimeout(() => {
			// console.log("open");
			initTextPlus();
		}, 1000);
		setTimeout(() => {
			initTextPlus();
		}, 2000);
	});

	wp.media.frame.on("select", function () {
		// console.log("select");
		initTextPlus();
		setTimeout(() => {
			initTextPlus();
		}, 1000);
	});

	// wp.media.frame.on("")
}
let adminInterval = setInterval(function () {
	if (document.querySelector(".textplus_acf")) {
		initTextPlus();
	}
}, 3000);

function buildRTE(el) {
	if (el.classList.contains("textplus-init")) return;
	el.classList.add("textplus-init");
	const id = Math.random().toString(36).substring(7);
	el.setAttribute("id", id);

	// options: https://github.com/JiHong88/SunEditor/blob/master/README.md
	window[id] = SUNEDITOR.create(document.getElementById(id), {
		lang: SUNEDITOR_LANG.en,
		mode: "classic",
		// mode: "inline",
		// mode: "balloon",
		// mode: "balloon-always",
		buttonList: [["bold", "italic", "removeFormat", "link", "codeView"]],
		resizeEnable: true,
	});
	window[id].onload = () => {
		window[id].setContents(el.value);
		// TODO fix bug that this doesn't seem to work in code mode
	};
}
