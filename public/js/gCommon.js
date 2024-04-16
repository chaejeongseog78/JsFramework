//## [s] Init Var
window.localCacheTimeLife = 6000000;
window.ObjInitMnu = null;
//## [e] Init Var

window.localCache = {
	timeout: window.localCacheTimeLife,
	time: {},
	data: {},
	remove: function (url) {
		delete this.data[url];
		delete this.time[url];
	},
	exist: function (url) {
		if (
			this.data.hasOwnProperty(url) &&
			typeof this.data[url] !== "undefined"
		) {
			var buf = new Date().getTime() - this.time[url];
			//trace(Number(buf) + ' > ' + Number(this.timeout));
			if (Number(buf) > Number(this.timeout)) {
				this.remove(url);
				return false;
			} else return true;
		} else {
			return false;
		}
	},
	get: function (url) {
		return this.data[url];
	},
	set: function (url, cachedData) {
		this.remove(url);
		this.data[url] = cachedData;
		this.time[url] = new Date().getTime();
	},
};

if (window.localStorage) {
	if (window.localStorage["localCacheData"]) {
		window.localCache.data = JSON.parse(window.localStorage["localCacheData"]);
		window.localCache.time = JSON.parse(window.localStorage["localCacheTime"]);
	}
}
function setLocalStorage() {
	if (window.localStorage) {
		if (window.localCache.data !== null) {
			try {
				window.localStorage["localCacheData"] = JSON.stringify(
					window.localCache.data
				);
				window.localStorage["localCacheTime"] = JSON.stringify(
					window.localCache.time
				);
			} catch (e) {}
		}
	}
}

const urlParamsChk = () => {
	window.urlParams = {};
	let e,
		a = /\+/g,
		r = /([^&=]+)=?([^&]*)/g,
		d = function (s) {
			return decodeURIComponent(s.replace(a, " "));
		},
		q = window.location.search.substring(1);
	while ((e = r.exec(q))) window.urlParams[d(e[1])] = d(e[2]);
};
urlParamsChk();

(function ($) {
	"use strict";

	$(document).ready(function () {
		const gRootOnLoad = () => {};

		const gRootListener = () => {};

		const gRootInit = () => {
			gRootOnLoad();
			gRootListener();
		};

		gRootInit();
	});
})(jQuery);

window.onbeforeunload = function (e) {
	setLocalStorage();
};
