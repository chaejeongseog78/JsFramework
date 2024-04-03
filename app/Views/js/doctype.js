//## [s] Init Var
var Frm = document.Frm;
var currPage = 1;
var currPerPage = 10;
//## [e] Init Var


(function($){$(document).ready(function(){
var listener = function(){

	//$(document).on('click', '.launch_append', function(e){e.preventDefault();e.stopPropagation();e.returnValue=false;
		//var idx = $(e.currentTarget).val();
		//var idx = $(e.currentTarget).data('idx');
	//});


	$(document).on('click', '.btn_cal_today, .btn_cal_yesterday, .btn_cal_week, .btn_cal_month, .btn_cal_month1, .btn_cal_month2, .btn_cal_month3, .btn_cal_total', function(e){
		setTimeout(function(){
			getList(1);
		}, 500);
	});

	$(document).on('submit','#form_reg',function(e){e.preventDefault();e.stopPropagation();e.returnValue=false;
		if(chkForm()){// Form Check
			$.confirm({ keyboardEnabled: true,
				content: '<p>등록 하시겠습니까? <span class="txtBold">[Enter:Save / ESC:Cancel]</span></p>',
				confirmKeys: [13],//Enter
				confirm: function(){
					chkWrite();
				},cancel:function(){}
			});
		}
	});

	$(document).on('click', '#prtPDF', function(e){e.preventDefault();e.stopPropagation();e.returnValue=false;
		var chkLength = $('input:checkbox[name="check[]"]:checked').length;
		if(chkLength > 0){
			var chkdats = $("input[name='check[]']:checked").serialize();
			//iframe이 height 0px;를 갖고 display:none이 되어있지않아야 됨
			document.getElementById('TmpFrame').src = '/gJSboardExec.php?action=prtPDF&chkdats='+encodeURIComponent(chkdats);
		}else $.alert('<p>먼저 선택하여 주세요.!</p>');
	});

	$(document).on('click', '#check_all', function(e){
		//e.preventDefault();e.stopPropagation();e.returnValue=false; //check_all 사용금지
		if($(this).is(":checked") === true) {
			$('input:checkbox[name="check[]"]:not(checked)').prop('checked', true);
		} else {
			$('input:checkbox[name="check[]"]:checked').prop('checked', false);
		}
	});

	$('#limit_select').change(function(e){
		$('#page_select').empty();
		getList(1);
	});


	listenerAdd();
};

var listenerAdd = function(){
	$('#myMnuList li:not(:has(ul))').off().on('click', function(e){e.preventDefault();e.stopPropagation();e.returnValue=false;
		var frmObj = document.Frm;//saveJSModal로 생성경우 매번 객체생성후 사용
	});
};

var chkForm = function(){
	if(empty(Frm.pg_id.value)) {
		$("input[name='pg_id']").parent().addClass('error');
		Frm.pg_id.focus();
		alertMSGbyTime('PG ID를 선택하세요!',4000);
		return false;
	}else{
		$("input[name='pg_id']").parent().addClass('success');
	}
	if (!form_check('#form_reg')){
		return false;
	}
	return true;
};

var chkWrite = function(){
	gShowLoadingBar();
	$.ajax({ url:'/ajax/proc/doctypeProc.php',
		cache:true, type:'post', dataType:'jsonp', crossDomain:true,
		data :{action:'gAppend',
			param:encodeURIComponent(JSON.stringify( $("#form_reg").serializeJSON() ))
		},success:function(result){
			gHideLoadingBar();
			if(isset(result) && result['MSG'] == 'OK'){
				if(goUrl !== null)
					goTo(goUrl);

				parent.GFgetList();
				parent.GFclearJSModal();
			}else trace(result);
		},error:function(request,status,error){
			gHideLoadingBar();
			trace('chkWrite : ' + error);
		}
	});
};

var getList = function(page){
	if(empty(page)) page = 1;
	currPage = page;
	$.ajax({ url: window.$_DBCONN_HTTP_URL+'/ajax/exec/gJSboardExec.php',
		cache:true, type:'post', dataType:'jsonp', crossDomain:true,
		data :{ action:'gGetList',
			page :page, numperpage:$('#limit_select option:selected').val(),
			param:encodeURIComponent($("#form_search").serialize())
		},success:function(result){
			if(isset(result)){
				if(result['MSG'] == 'OK'){
					var data = result['DAT'];
					listUpDisplay(data,page);
					disPageing(page,data['res_page']);
				}else{
					dialogMSG('Notice',result['MSG']);
				}
			}else trace(result);
		},error:function(request,status,error){trace('getList : '+error); }
	});
};


var listUpDisplay = function(data,page){
	var obj = data['res_result'];

	currPerPage = $('#limit_select option:selected').val();
	var divData = '';
	var loop = 0;
	var len = obj.length;
	for (; loop < len; loop++){
		divData += '<tr>'
		+'<td class="tdlC"><input type="checkbox" name="check[]" class="idx" value="'+obj[loop]['idx']+'"><br>'+(currPage*currPerPage+loop+1-currPerPage)+'</td>'
		+'<td class="tdlC">'+obj[loop]['subject']+'</td>'
		+'<td class="tdlC">'+obj[loop]['name']+'</td>'
		+'<td class="tdlC">'+obj[loop]['signdate']+'</td>'
		+'<td class="tdlC"><button type="button" data-idx='+obj[loop]['idx']+' class="btn btn-primary btn-xs gModify">수정</button></td>'
		+'</tr>';
	}
	document.getElementById('list1').innerHTML = divData;

	$('#check_all').prop('checked', false);

	//## [s] 권한별 보안필터 적용
	//setViewBtnByFilter();
	//## [e] 권한별 보안필터 적용
};

var disPageing = function(page,data){
	var divData  = '';
	var total_page = data['total_page'];
	var prevPage = Math.floor(page / 10) * 10;//소숫점 이하 숫자는 무조건 버림
	if(prevPage==page) prevPage -= 9;
	else prevPage += 1;
	var nextPage = Math.ceil(page / 10) * 10;//소숫점 이하 숫자는 무조건 올림
	if(total_page < nextPage) nextPage = total_page;
	if(prevPage!=1)
		divData += '<a class="launch_page_select" pageno="'+(prevPage-1)+'" style="cursor:pointer"> Prev </a>';
	for (var i=prevPage;i<=nextPage;i++) {
		if(i==page) divData += '<a class="current launch_page_select" pageno="'+i+'"><strong>'+i+'</strong></a>';
		else divData += '<a class="launch_page_select" pageno="'+i+'" style="cursor:pointer">'+i+'</a>';
	}
	if(nextPage != total_page)
		divData += '<a class="launch_page_select" pageno="'+(nextPage+1)+'" style="cursor:pointer"> Next </a>';
	document.getElementById('page_select').innerHTML = divData;

	$('.launch_page_select').click(click_content_pagemove_submit);//Page Move
};
var click_content_pagemove_submit = function(){
	if(isset(window.urlParams['idx'])){
		window.urlParams['idx'] = null;
	}
	getList($(this).attr('pageno'));
};


//## [s] Common Function
var unzip = function(b64Data,idx){
	var strData     = atob(b64Data);
	// Convert binary string to character-number array
	var charData    = strData.split('').map(function(x){return x.charCodeAt(0);});
	// Turn number array into byte-array
	var binData     = new Uint8Array(charData);
	// // unzip
	var data        = pako.inflate(binData);
	// Convert gunzipped byteArray back to ascii string:
	try {
		strData     = String.fromCharCode.apply(null, new Uint16Array(data));
	} catch (e) {
		trace('idx = '+idx);
		trace(e);
	}
	return strData;
}
var zip = function(str){
	var binaryString = pako.gzip(str, { to: 'string' });
	return btoa(binaryString);
}
var getUnZipDat = function(data){
	//trace(data);
	for (var i=0;i<data['res_result'].length;i++) {
		var idx = data['res_result'][i]['idx'];

		if(!empty(data['res_result'][i]['MEM']['MBI_9001'])){
			//trace(data['res_result'][i]['MEM']['MBI_9001']);
			data['res_result'][i]['MEM']['MBI_9001'] = unzip(data['res_result'][i]['MEM']['MBI_9001'],idx);
			//trace(JSON.parse(data['res_result'][i]['MEM']['MBI_9001']));
		}
		if(!empty(data['res_result'][i]['MEM']['MBI_9010'])){
			data['res_result'][i]['MEM']['MBI_9010'] = unzip(data['res_result'][i]['MEM']['MBI_9010'],idx);
		}
		if(!empty(data['res_result'][i]['MEM']['MBI_9020'])){
			data['res_result'][i]['MEM']['MBI_9020'] = unzip(data['res_result'][i]['MEM']['MBI_9020'],idx);
		}
		if(!empty(data['res_result'][i]['MEM']['MBI_9030'])){
			data['res_result'][i]['MEM']['MBI_9030'] = unzip(data['res_result'][i]['MEM']['MBI_9030'],idx);
		}

		if(!empty(data['res_result'][i]['Youl'])){
			data['res_result'][i]['Youl'] = unzip(data['res_result'][i]['Youl'],idx);
		}
		if(!empty(data['res_result'][i]['BXI_0030'])){
			data['res_result'][i]['BXI_0030'] = unzip(data['res_result'][i]['BXI_0030'],idx);
		}
		if(!empty(data['res_result'][i]['BXI_0031'])){
			data['res_result'][i]['BXI_0031'] = unzip(data['res_result'][i]['BXI_0031'],idx);
		}
		if(!empty(data['res_result'][i]['BXI_0032'])){
			data['res_result'][i]['BXI_0032'] = unzip(data['res_result'][i]['BXI_0032'],idx);
		}
		if(!empty(data['res_result'][i]['BXI_0033'])){
			data['res_result'][i]['BXI_0033'] = unzip(data['res_result'][i]['BXI_0033'],idx);
		}
		if(!empty(data['res_result'][i]['BXI_0034'])){
			data['res_result'][i]['BXI_0034'] = unzip(data['res_result'][i]['BXI_0034'],idx);
		}
	}
	return data;
};
//var Frm = document.Frm;//saveJSModal로 생성경우 매번 객체생성후 참조해야 사용가능(Dom객체가 새로생성 되었기때문)
var saveJSModal = function(html,w,h,uid,inputname){
	window.saveJSModal = html;
	window.saveJSModalUid = uid;
	$(uid).children().remove();

	document.getElementById('savemodal_contents').innerHTML = html;
	$('.savemodal .bg_fixed .sectionview').css({width:w,height:h});
	$('.savemodal').show();

	setCssBeforPopUp();

	//## [s] Init
	$('.savemodal .bg_fixed .sectionview').draggable();
	$('.date_pic').datepicker();
	$('.onlyNumber').numeric();
	$('.onlyNumber').css({'ime-mode':'disabled'});
	$('[placeholder]').placeholder();
	//## [e] Init

	$('.close_box07').off().click(function(e){
		setCssAfterPopUp();
		document.getElementById('savemodal_contents').innerHTML = '';
		$('.savemodal').hide();
		if(window.saveJSModalUid && window.saveJSModal){
			$(window.saveJSModalUid)[0].innerHTML = window.saveJSModal;
		}
		if (typeof inputname !== 'undefined' && inputname !== null) {
			$(inputname).focus().select();
		}
	});
};
var saveJSModalNotDrag = function(html,w,h,uid,inputname){
	window.saveJSModal = html;
	window.saveJSModalUid = uid;
	$(uid).children().remove();

	document.getElementById('savemodalnotdragContents').innerHTML = html;
	$('.savemodalnotdrag .bg_fixed .sectionview').css({width:w,height:h});
	$('.savemodalnotdrag').show();

	setCssBeforPopUp();

	//## [s] Init
	$('.date_pic').datepicker();
	$('.onlyNumber').numeric();
	$('.onlyNumber').css({'ime-mode':'disabled'});
	$('[placeholder]').placeholder();
	//## [e] Init

	$('.close_box08').off().click(function(e){
		setCssAfterPopUp();
		document.getElementById('savemodalnotdragContents').innerHTML = '';
		$('.savemodalnotdrag').hide();
		if(window.saveJSModalUid && window.saveJSModal){
			$(window.saveJSModalUid)[0].innerHTML = window.saveJSModal;
		}
		if (typeof inputname !== 'undefined' && inputname !== null) {
			$(inputname).focus().select();
		}
	});
};
var saveJSModal_2 = function(html,w,h,uid,inputname){
	window.saveJSModal_2 = html;
	window.saveJSModalUid_2 = uid;
	$(uid).children().remove();

	document.getElementById('savemodal_contents_2').innerHTML = html;
	$('.savemodal_2 .bg_fixed .sectionview').css({width:w,height:h});
	$('.savemodal_2').show();

	setCssBeforPopUp();

	//## [s] Init
	$('.savemodal_2 .bg_fixed .sectionview').draggable();
	$('.date_pic').datepicker();
	$('.onlyNumber').numeric();
	$('.onlyNumber').css({"ime-mode":"disabled"});
	$('[placeholder]').placeholder();
	//## [e] Init

	$('.close_box02').off().click(function(e){
		setCssAfterPopUp();
		document.getElementById('savemodal_contents_2').innerHTML = '';
		$('.savemodal_2').hide();
		if(window.saveJSModalUid_2 && window.saveJSModal_2){
			$(window.saveJSModalUid_2)[0].innerHTML = window.saveJSModal_2;
		}
		if (typeof inputname !== 'undefined' && inputname !== null) {
			$(inputname).focus().select();
		}
	});
};
var saveJSModal_3 = function(html,w,h,uid,inputname){
	window.saveJSModal_3 = html;
	window.saveJSModalUid_3 = uid;
	$(uid).children().remove();

	document.getElementById('savemodal_contents_3').innerHTML = html;
	$('.savemodal_3 .bg_fixed .sectionview').css({width:w,height:h});
	$('.savemodal_3').show();

	setCssBeforPopUp();

	//## [s] Init
	$('.savemodal_3 .bg_fixed .sectionview').draggable();
	$('.date_pic').datepicker();
	$('.onlyNumber').numeric();
	$('.onlyNumber').css({'ime-mode':'disabled'});
	$('[placeholder]').placeholder();
	//## [e] Init

	$('.close_box03').off().click(function(e){
		setCssAfterPopUp();
		document.getElementById('savemodal_contents_3').innerHTML = '';
		$('.savemodal_3').hide();
		if(window.saveJSModalUid_3 && window.saveJSModal_3){
			$(window.saveJSModalUid_3)[0].innerHTML = window.saveJSModal_3;
		}
		if (typeof inputname !== 'undefined' && inputname !== null) {
			$(inputname).focus().select();
		}
	});
};
var clearJSModal = function(){
	$('.close_box07').trigger('click');//Close
	$('.close_box08').trigger('click');//Close
};
var clearJSModalAll = function(){
	$('.close_box07').trigger('click');//Close
	$('.close_box08').trigger('click');//Close
	$('.close_box02').trigger('click');//Close
	$('.close_box03').trigger('click');//Close
};
var resizeJSModal = function(){
	$('.savemodal .bg_fixed .sectionview').css({height:$('#savemodal_contents').height()+60});
	$('.savemodalnotdrag .bg_fixed .sectionview').css({height:$('#savemodalnotdragContents').height()+60});
	$('.savemodal_2 .bg_fixed .sectionview').css({height:$('#savemodal_contents_2').height()+60});
	$('.savemodal_3 .bg_fixed .sectionview').css({height:$('#savemodal_contents_3').height()+60});
};
var setCssBeforPopUp = function(){
	if(window.$_Firefox){
		$('body').addClass('popup_Chrome');
	}else if(window.$_Chrome){
		if(parseInt(window.$_Chrome) > 46) $('body').addClass('popup_Chrome');
		else $('body').addClass('popup');//Edge
	} else $('body').addClass('popup');
};
var setCssAfterPopUp = function(){
	$('body').removeClass('popup');
	$('body').removeClass('popup_Chrome');
};
var alertMSG = function(msg){
	$.alert(msg);
};
var alertMSGbyTime = function(msg,time){
	var autoClose = 'cancel|'+time;
	$.confirm({ title: 'Notice',
		content: msg,
		autoClose: autoClose,
		confirm: function(){
		},cancel:function(){}
	});
};
var dialogMSG = function(title, msg){
	$.dialog({ title: title, content: msg });
};
//## [e] Common Function


var onLoad = function(){
	$.ajax({ url:window.$_DBCONN_HTTP_URL+'/ajax/exec/gBoardExec.php',
		cache:true, type :'post', dataType:'jsonp', crossDomain:true,
		data :{ action:'getList',
			page:1, numperpage:20,
			data:encodeURIComponent('data')
		},beforeSend:function(){
			return true;
		},success:function(result){
			if(isset(result) && result['MSG']=='OK'){
				onLoad();
			}else trace(result);
		},error:function(request,status,error){trace('onLoad : '+error);}
	});

	$('.btn_cal_month3').trigger('click');//지난3달(Default Click Set)
	//$('.btn_cal_week').trigger('click');//이번주(Default Click Set)
	//$('.btn_cal_month').trigger('click');//이번달(Default Click Set)
};

var setGrobalFunction = function(){
	GFclearJSModalAll = clearJSModalAll;
	GFclearJSModal = clearJSModal;
	GFonLoad = onLoad;
	GFgetList = getList;
	GFalertMSG = alertMSG;
	GFalertMSGbyTime = alertMSGbyTime;
	GFdialogMSG = dialogMSG;
};

var init = function(){
	//onLoad();
	//getList(1);
	listener();
	setGrobalFunction();
};


init();

})})(jQuery);


//## [s] Global Function Var
var GFclearJSModalAll = null;
var GFclearJSModal = null;
var GFonLoad = null;
var GFgetList = null;
var GFalertMSG = null;
var GFalertMSGbyTime = null;
var GFdialogMSG = null;
//## [e] Global Function Var
