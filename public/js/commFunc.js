// 콘솔 메세지 (콘솔 없을시 무시)
function trace(s) {
	if (this.console && typeof console.trace != "undefined") {
		console.log(s);
	} else if (this.console && typeof console.log != "undefined") {
		console.log(s);
	}
}

function goToUrl(url) {
	if (trim(url) != "") {
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

function trim(str) {
	return str.replace(/(^\s*)|(\s*$)/g, "");
}

function isset(val) {
	if (
		typeof val === "undefined" ||
		val === undefined ||
		val === "" ||
		val === null
	)
		return false;
	else return true;
}

function empty(val) {
	var flag = false;
	if (
		typeof val === "undefined" ||
		val === undefined ||
		val === "" ||
		val === null
	) {
		flag = true;
	} else {
		switch (typeof val) {
			case "object":
				{
					if (!Object.keys(val).length) flag = true;
				}
				break;
			case "string":
				{
					val = val.replace(/(^\s*)|(\s*$)/g, "");
					if (val === "") flag = true;
				}
				break;
			case "number":
				{
					if (val == 0) {
						flag = true;
					}
				}
				break;
		}
	}
	return flag;
}

// 타임스탬프생성
function unix_timestamp() {
	var date = moment(_tt).toDate();
	//return parseInt(new Date().getTime().toString())
	return parseInt(date.getTime().toString());
}

function setCookieDay(name, value, expiredays) {
	var todayDate = new Date();
	todayDate.setDate(todayDate.getDate() + expiredays);
	document.cookie =
		name +
		"=" +
		escape(value) +
		"; path=/; expires=" +
		todayDate.toGMTString() +
		";";
}

function getCookie(name) {
	var nameOfCookie = name + "=";
	var x = 0;
	while (x <= document.cookie.length) {
		var y = x + nameOfCookie.length;
		if (document.cookie.substring(x, y) == nameOfCookie) {
			if ((endOfCookie = document.cookie.indexOf(";", y)) == -1)
				endOfCookie = document.cookie.length;
			return unescape(document.cookie.substring(y, endOfCookie));
		}
		x = document.cookie.indexOf(" ", x) + 1;
		if (x === 0) break;
	}
	return "";
}

//##onkeyup="onlyNumber(this)"
function onlyNumber(me) {
	// 0~9 만인정
	var chkValue = me.value;
	var chkName = me.name;
	var c;
	var focus = "input[name='" + chkName + "']";
	for (i = 0; i < chkValue.length; i++) {
		c = chkValue.charAt(i);
		if (!(c >= "0" && c <= "9")) {
			$(focus).attr("placeholder", "숫자입력");
			$(focus).val("");
			return false;
		}
	}
	return true;
}
function onlyNumber_(me) {
	// 마이너스기호, 0~9
	var chkValue = me.value;
	var chkName = me.name;
	var c;
	var focus = "input[name='" + chkName + "']";
	for (i = 0; i < chkValue.length; i++) {
		c = chkValue.charAt(i);
		if (!((c >= "0" && c <= "9") || c == "-")) {
			$(focus).attr("placeholder", "숫자,- 입력");
			$(focus).val("");
			return false;
		}
	}
	return true;
}

function removeTag(str) {
	var pos1 = str.indexOf("<");
	if (pos1 == -1) return str;
	else {
		var pos2 = str.indexOf(">", pos1);
		if (pos2 == -1) return str;
		return removeTag(str.substr(0, pos1) + str.substr(pos2 + 1));
	}
}

function roundInt(val) {
	//반올림
	return Math.round(val / 100) * 100;
}
function floorInt(val) {
	//반내림
	return Math.floor(val / 100) * 100;
}

// 콤마(,) 제거 ##################################################
function stripComma(str) {
	str = trim(str);
	var re = /,/g;
	return str.replace(re, "");
}

// 숫자 3자리수마다 콤마(,) 찍기 ##################################################
function formatComma(num, pos) {
	if (!pos) pos = 0; //소숫점 이하 자리수
	var re = /(-?\d+)(\d{3}[,.])/;

	var strNum = stripComma(num.toString());
	var arrNum = strNum.split(".");

	arrNum[0] += ".";

	while (re.test(arrNum[0])) {
		arrNum[0] = arrNum[0].replace(re, "$1,$2");
	}

	if (arrNum.length > 1) {
		if (arrNum[1].length > pos) {
			arrNum[1] = arrNum[1].substr(0, pos);
		}
		return arrNum.join("");
	} else {
		return arrNum[0].split(".")[0];
	}
}
