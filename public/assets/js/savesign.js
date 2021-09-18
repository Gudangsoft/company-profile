function ttdpetugas() {
	var canvas = document.getElementById("ttdpetugas");
	var context = canvas.getContext("2d");

	if (!context) {
		throw new Error("Failed to get canvas' 2d context");
	}

	canvas.width = 300 ;
	canvas.height = 120 ;
	
	context.fillStyle = "#fff";
	context.strokeStyle = "#444";
	context.lineWidth = 1.2;
	context.lineCap = "round";

	context.fillRect(0, 0, canvas.width, canvas.height);

	context.fillStyle = "#3a87ad";
	context.strokeStyle = "#3a87ad";
	context.lineWidth = 3;
	context.moveTo(20,220);
	context.lineTo(454,220);
	context.stroke();

	context.fillStyle = "#fff";
	context.strokeStyle = "#444";
	
	
	var disableSave = true;
	var pixels = [];
	var cpixels = [];
	var xyLast = {};
	var xyAddLast = {};
	var calculate = false;
	//functions
	{
		function remove_event_listeners() {
			canvas.removeEventListener('mousemove', on_mousemove, false);
			canvas.removeEventListener('mouseup', on_mouseup, false);
			canvas.removeEventListener('touchmove', on_mousemove, false);
			canvas.removeEventListener('touchend', on_mouseup, false);

			document.body.removeEventListener('mouseup', on_mouseup, false);
			document.body.removeEventListener('touchend', on_mouseup, false);
		}

		function get_board_coords(e) {
			var x, y;

			if (e.changedTouches && e.changedTouches[0]) {
				var offsety = canvas.offsetTop || 0;
				var offsetx = canvas.offsetLeft || 0;

				x = e.changedTouches[0].pageX - offsetx;
				y = e.changedTouches[0].pageY - offsety;
			} else if (e.layerX || 0 == e.layerX) {
				x = e.layerX;
				y = e.layerY;
			} else if (e.offsetX || 0 == e.offsetX) {
				x = e.offsetX;
				y = e.offsetY;
			}

			return {
				x : x,
				y : y
			};
		};

		function on_mousedown(e) {
			e.preventDefault();
			e.stopPropagation();

			canvas.addEventListener('mousemove', on_mousemove, false);
			canvas.addEventListener('mouseup', on_mouseup, false);
			canvas.addEventListener('touchmove', on_mousemove, false);
			canvas.addEventListener('touchend', on_mouseup, false);

			document.body.addEventListener('mouseup', on_mouseup, false);
			document.body.addEventListener('touchend', on_mouseup, false);

			empty = false;
			var xy = get_board_coords(e);
			context.beginPath();
			pixels.push('moveStart');
			context.moveTo(xy.x, xy.y);
			pixels.push(xy.x, xy.y);
			xyLast = xy;
		};

		function on_mousemove(e, finish) {
			e.preventDefault();
			e.stopPropagation();

			var xy = get_board_coords(e);
			var xyAdd = {
				x : (xyLast.x + xy.x) / 2,
				y : (xyLast.y + xy.y) / 2
			};

			if (calculate) {
				var xLast = (xyAddLast.x + xyLast.x + xyAdd.x) / 3;
				var yLast = (xyAddLast.y + xyLast.y + xyAdd.y) / 3;
				pixels.push(xLast, yLast);
			} else {
				calculate = true;
			}

			context.quadraticCurveTo(xyLast.x, xyLast.y, xyAdd.x, xyAdd.y);
			pixels.push(xyAdd.x, xyAdd.y);
			context.stroke();
			context.beginPath();
			context.moveTo(xyAdd.x, xyAdd.y);
			xyAddLast = xyAdd;
			xyLast = xy;

		};

		function on_mouseup(e) {
			remove_event_listeners();
			disableSave = false;
			context.stroke();
			pixels.push('e');
			calculate = false;
		};

	}//end

	canvas.addEventListener('mousedown', on_mousedown, false);
	canvas.addEventListener('touchstart', on_mousedown, false);
}
function ttdklien() {
	var canvas = document.getElementById("ttdklien");
	var context = canvas.getContext("2d");

	if (!context) {
		throw new Error("Failed to get canvas' 2d context");
	}

	canvas.width = 300 ;
	canvas.height = 120 ;
	
	context.fillStyle = "#fff";
	context.strokeStyle = "#444";
	context.lineWidth = 1.2;
	context.lineCap = "round";

	context.fillRect(0, 0, canvas.width, canvas.height);

	context.fillStyle = "#3a87ad";
	context.strokeStyle = "#3a87ad";
	context.lineWidth = 3;
	context.moveTo(20,220);
	context.lineTo(454,220);
	context.stroke();

	context.fillStyle = "#fff";
	context.strokeStyle = "#444";
	
	
	var disableSave = true;
	var pixels = [];
	var cpixels = [];
	var xyLast = {};
	var xyAddLast = {};
	var calculate = false;
	//functions
	{
		function remove_event_listeners() {
			canvas.removeEventListener('mousemove', on_mousemove, false);
			canvas.removeEventListener('mouseup', on_mouseup, false);
			canvas.removeEventListener('touchmove', on_mousemove, false);
			canvas.removeEventListener('touchend', on_mouseup, false);

			document.body.removeEventListener('mouseup', on_mouseup, false);
			document.body.removeEventListener('touchend', on_mouseup, false);
		}

		function get_board_coords(e) {
			var x, y;

			if (e.changedTouches && e.changedTouches[0]) {
				var offsety = canvas.offsetTop || 0;
				var offsetx = canvas.offsetLeft || 0;

				x = e.changedTouches[0].pageX - offsetx;
				y = e.changedTouches[0].pageY - offsety;
			} else if (e.layerX || 0 == e.layerX) {
				x = e.layerX;
				y = e.layerY;
			} else if (e.offsetX || 0 == e.offsetX) {
				x = e.offsetX;
				y = e.offsetY;
			}

			return {
				x : x,
				y : y
			};
		};

		function on_mousedown(e) {
			e.preventDefault();
			e.stopPropagation();

			canvas.addEventListener('mousemove', on_mousemove, false);
			canvas.addEventListener('mouseup', on_mouseup, false);
			canvas.addEventListener('touchmove', on_mousemove, false);
			canvas.addEventListener('touchend', on_mouseup, false);

			document.body.addEventListener('mouseup', on_mouseup, false);
			document.body.addEventListener('touchend', on_mouseup, false);

			empty = false;
			var xy = get_board_coords(e);
			context.beginPath();
			pixels.push('moveStart');
			context.moveTo(xy.x, xy.y);
			pixels.push(xy.x, xy.y);
			xyLast = xy;
		};

		function on_mousemove(e, finish) {
			e.preventDefault();
			e.stopPropagation();

			var xy = get_board_coords(e);
			var xyAdd = {
				x : (xyLast.x + xy.x) / 2,
				y : (xyLast.y + xy.y) / 2
			};

			if (calculate) {
				var xLast = (xyAddLast.x + xyLast.x + xyAdd.x) / 3;
				var yLast = (xyAddLast.y + xyLast.y + xyAdd.y) / 3;
				pixels.push(xLast, yLast);
			} else {
				calculate = true;
			}

			context.quadraticCurveTo(xyLast.x, xyLast.y, xyAdd.x, xyAdd.y);
			pixels.push(xyAdd.x, xyAdd.y);
			context.stroke();
			context.beginPath();
			context.moveTo(xyAdd.x, xyAdd.y);
			xyAddLast = xyAdd;
			xyLast = xy;

		};

		function on_mouseup(e) {
			remove_event_listeners();
			disableSave = false;
			context.stroke();
			pixels.push('e');
			calculate = false;
		};

	}//end

	canvas.addEventListener('mousedown', on_mousedown, false);
	canvas.addEventListener('touchstart', on_mousedown, false);
}

function savepetugas() {

	var canvas = document.getElementById("ttdpetugas");
	// save canvas image as data url (png format by default)
	var dataURL = canvas.toDataURL("image/png");
	document.getElementById("inputttdpetugas").value = dataURL;
};
function saveklien() {

	var canvas = document.getElementById("ttdklien");
	// save canvas image as data url (png format by default)
	var dataURL = canvas.toDataURL("image/png");
	document.getElementById("inputttdklien").value = dataURL;
};

function clearpetugas() {
	var canvas = document.getElementById("ttdpetugas");
	var context = canvas.getContext("2d");
	context.clearRect(0, 0, canvas.width, canvas.height);
}
function clearklien() {
	var canvas = document.getElementById("ttdklien");
	var context = canvas.getContext("2d");
	context.clearRect(0, 0, canvas.width, canvas.height);
}


// http://stackoverflow.com/questions/11385471/save-canvas-image-post-the-data-string-to-php


function signatureSend() {
	var canvas = document.getElementById("newSignature");
	var dataURL = canvas.toDataURL("image/png");
	document.getElementById("saveSignature").src = dataURL;
	var sendemail = document.getElementById('sendemail').value;
	var replyemail = document.getElementById('replyemail').value;

var form = document.createElement("form");
form.setAttribute("action","upload_file.php");
form.setAttribute("enctype","multipart/form-data");
form.setAttribute("method","POST");
form.setAttribute("target","_self");
// form.action = location.href.replace(/^http:/, 'https:');
form.innerHTML = '<input type="text" name="image" value="'+dataURL+'"/>'+'<input type="email" name="email" value="'+sendemail+'"/>'+'<input type="email" name="replyemail" value="'+replyemail+'"/>';
form.submit();


}
