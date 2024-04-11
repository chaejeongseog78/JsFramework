// 콘솔 메세지 (콘솔 없을시 무시)
function trace(s) {
	if (this.console && typeof console.trace != "undefined") {
		console.log(s);
	} else if (this.console && typeof console.log != "undefined") {
		console.log(s);
	}
}

function goTo(url) {
	if (url.stripspace() != "") {
		self.location = url;
	}
}

// 콘솔 메세지 (콘솔 없을시 무시)
function trace(s) {
	if (this.console && typeof console.trace != "undefined") {
		console.log(s);
	} else if (this.console && typeof console.log != "undefined") {
		console.log(s);
	}
}

function goTo(url) {
	if (url.stripspace() != "") {
		self.location = url;
	}
}

function FocusOn(field) {
	field.select();
	field.value = field.defaultValue ? "" : field.value;
}
function FocusOff(field) {
	field.value = "" ? (field.value = field.defaultValue) : field.value;
}
